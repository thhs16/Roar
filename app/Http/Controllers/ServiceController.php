<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use App\Models\Comment;
use App\Models\Service;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function createServiceDB(Request $request)
    {
        $validation = $request->validate([
            'serviceImage' => 'required',
            'serviceTitle' => 'required',
            'serviceType' => 'required',
            'serviceCategoryId' => 'required',
            'serviceFees' => 'required',
            'serviceDescription' => 'required'
        ]);

        $data = [
            'title' => $request->serviceTitle,
            'category_id' => $request->serviceCategoryId,
            'image' => '',
            'description' => $request->serviceDescription,
            'type' => $request->serviceType,
            'fees' => $request->serviceFees,
        ];

        $fileName = 'roar' . uniqid() . $request->file('serviceImage')->getClientOriginalName();
        $request->file('serviceImage')->move(public_path() . '/serviceImages/', $fileName);
        $data['image'] = $fileName;

        Service::create($data);

        return to_route('serviceList')->with('Success Message', 'The data is updated successfully.');
    }

    public function serviceList()
    {
        $service = Service::paginate(2);

        return view('admin.serviceList', compact('service'));
    }

    public function serviceDetail($service_id)
    {
        $service = Service::select('services.*', 'categories.name as category_name')
            ->where('services.id', $service_id)
            ->leftJoin('categories', 'services.category_id', 'categories.id')
            ->first();


        return view('admin.serviceDetail', compact('service'));
    }

    public function serviceUpdate($service_id)
    {
        $service = Service::where('services.id', $service_id)->first();

        $category = Category::select('id', 'name')->get();

        return view('admin.serviceUpdate', compact('service', 'category'));
    }

    public function serviceUpdateDB(Request $request)
    {
        // Note | serviceImage does not appear when the value is null
        $validation = $request->validate([
            'serviceTitle' => 'required',
            'serviceType' => 'required',
            'serviceCategoryId' => 'required',
            'serviceFees' => 'required',
            'serviceDescription' => 'required'
        ]);

        $service = Service::where('id', $request->serviceId)->first();

        // condition
        $imageChange = $request->serviceImage != null ? 1 : 0;     // 0
        $titleChange = $request->serviceTitle != $service->title ? 1 : 0;      // 0
        $typeChange = $request->serviceType != $service->type ? 1 : 0;       //0
        $feesChange = $request->serviceFees != $service->fees ? 1 : 0;     //0
        $categoryIdChange = $request->serviceCategoryId != $service->category_id ? 1 : 0;  //0
        $descriptionChange = $request->serviceDescription != $service->description ? 1 : 0;        //0

        $changeCondition = $imageChange | $titleChange | $typeChange | $feesChange | $categoryIdChange | $descriptionChange;

        $data = [];


        if ($changeCondition) {

            if ($titleChange) {

                $data = array_merge($data, ['title' => $request->serviceTitle]);
            }
            if ($typeChange) {
                $data = array_merge($data, ['type' => $request->serviceType]);
            }

            if ($feesChange) {
                $data = array_merge($data, ['fees' => $request->serviceFees]);
            }

            if ($categoryIdChange) {
                $data = array_merge($data, ['category_id' => $request->serviceCategoryId]);
            }

            if ($descriptionChange) {
                $data = array_merge($data, ['description' => $request->serviceDescription]);
            }

            if ($imageChange) {

                $fileName = 'roar' . uniqid() . $request->file('serviceImage')->getClientOriginalName();

                $request->file('serviceImage')->move(public_path() . '/serviceImages/', $fileName);

                unlink(public_path('serviceImages/' . $service->image));



                $data = array_merge($data, ['image' => $fileName]);
            }

            Service::where('id', $request->serviceId)->update($data);

            return to_route('serviceList')->with('Success Message', 'The service is updated successfully.');
        } else {
            return back()->with('Success Message', 'No Data Changes. You need to edit data to update');
        }
    }

    public function serviceDelete($service_id)
    {
        Service::where('id', $service_id)->delete();

        return back()->with('Success Message', 'The service is deleted successfully.');
    }

    public function serviceUserDetail($serviceId)
    {
        $service_detail = Service::where('id', $serviceId)->first();

        $user_rating = Rating::where('ratings.user_id', auth()->user()->id)->where('ratings.service_id', $serviceId)->first();

        $user_comment = Comment::where('user_id', auth()->user()->id)->where('service_id', $serviceId)->first();

        $service_rating_count = Rating::where('service_id', $serviceId)->count();
        $total_service_rating_value = Rating::where('service_id', $serviceId)->sum('rating');;
        $overall_rating = $total_service_rating_value / $service_rating_count;

        return view('user.serviceUserDetail', compact('service_detail', 'user_rating', 'user_comment', 'overall_rating'));
    }

    public function serviceUserRatingComment(Request $request)
    {
        // two condition, has to update or create (db data)

        $rating = Rating::where('user_id', $request->userId)
            ->where('service_id', $request->serviceId)
            ->first();

        $comment = Comment::where('user_id', $request->userId)
            ->where('service_id', $request->serviceId)
            ->first();

        $data = [
            'user_id' => $request->userId,
            'service_id' => $request->serviceId,
            'rating' => $request->serviceRating
        ];

        $cmtData = [
            'user_id' => $request->userId,
            'service_id' => $request->serviceId,
            'comment' => $request->serviceUserComment
        ];

        if ($rating) { // if rating exists, comment exists even in null

            $ratingChange = $request->serviceRating != $rating->rating;
            $commentChange = $request->serviceUserComment != $comment->comment;
            $condition = $ratingChange | $commentChange;

            if ($condition) {
                if ($ratingChange) {

                    Rating::where('user_id', $request->userId)
                        ->where('service_id', $request->serviceId)
                        ->update($data);
                }

                if ($commentChange) {

                    Comment::where('user_id', $request->userId)
                        ->where('service_id', $request->serviceId)
                        ->update($cmtData);
                }

                return back()->with('Success Message', 'Your rating section has updated successfully.');
            } else {
                return back()->with('Alert Message', 'No Rating Data Changes.');
            }
        }

        if ($request->serviceUserComment == null) {
            $cmtData['comment'] = null;
        }

        Rating::create($data);
        Comment::create($cmtData);

        return back()->with('Success Message', 'Thank you for your rating.');
    }

    public function serviceCategory($categoryId)
    {

        $keyword = request('searchKey');

        $service_category = Service::where('category_id', $categoryId) // Filter by category
            ->where(function ($query) use ($keyword) {
                $query->where('title', 'LIKE', "%{$keyword}%") // Search in service name
                    ->orWhere('description', 'LIKE', "%{$keyword}%"); // Search in description
            })
            ->paginate(1);

        $category_name = Category::select('name')->where('id', $categoryId)->first();

        $category_name = $category_name->name;


        return view('user.serviceCategoryDetail', compact('service_category', 'categoryId', 'category_name'));
    }

    public function allServicesPg()
    {

        $keyword = request('searchKey');

        $service = Service::select('services.*', 'categories.*')
            ->leftJoin('categories', 'categories.id', 'services.category_id')
            ->where(function ($query) use ($keyword) {
                $query->where('services.title', 'LIKE', "%{$keyword}%") // Search in service name
                    ->orWhere('services.description', 'LIKE', "%{$keyword}%"); // Search in description
            })
            ->paginate(6);



        return view('user.allService', compact('service'));
    }
}
