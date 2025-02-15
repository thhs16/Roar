<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function createServiceDB(Request $request){
        $validation = $request->validate([
            'serviceImage' => 'required',
            'serviceTitle' => 'required',
            'serviceType' => 'required',
            'serviceCategoryId' => 'required',
            'serviceFees' => 'required',
            'serviceDescription' => 'required'
        ]);

        $data = [
            'title'=> $request->serviceTitle,
            'category_id'=> $request->serviceCategoryId,
            'image'=> '',
            'description'=> $request->serviceDescription,
            'type'=> $request->serviceType,
            'fees'=> $request->serviceFees,
        ];

        $fileName = 'roar'.uniqid() . $request->file('serviceImage')->getClientOriginalName();
        $request->file('serviceImage')->move(public_path().'/serviceImages/',$fileName);
        $data['image'] = $fileName;

        Service::create($data);

        return to_route('serviceList')->with('Success Message', 'The data is updated successfully.');

    }

    public function serviceList(){
    $service = Service::get();

        return view('admin.serviceList', compact('service'));
    }

    public function serviceDetail($service_id){
        $service = Service::select('services.*', 'categories.name as category_name')
                    ->where('services.id', $service_id)
                    ->leftJoin('categories', 'services.category_id', 'categories.id')
                    ->first();


        return view('admin.serviceDetail', compact('service'));
    }

    public function serviceUpdate($service_id){
        $service = Service::where('services.id', $service_id)->first();

        $category = Category::select('id', 'name')->get();

        return view('admin.serviceUpdate', compact('service', 'category'));
    }

    public function serviceUpdateDB(Request $request){
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
        $imageChange = $request->serviceImage != null ? 1 : 0 ;     // 0
        $titleChange = $request->serviceTitle != $service->title ? 1 : 0 ;      // 0
        $typeChange = $request->serviceType != $service->type ? 1 : 0 ;       //0
        $feesChange = $request->serviceFees != $service->fees ? 1 : 0 ;     //0
        $categoryIdChange = $request->serviceCategoryId != $service->category_id ? 1 : 0 ;  //0
        $descriptionChange = $request->serviceDescription != $service->description ? 1 : 0 ;        //0

        $changeCondition = $imageChange | $titleChange | $typeChange | $feesChange | $categoryIdChange | $descriptionChange ;

        $data = [];


        if($changeCondition){

            if($titleChange){
                // array_push($data, [
                //     'title' => $request->serviceTitle
                // ]);

                $data = array_merge($data , ['title' => $request->serviceTitle]);

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

                $fileName = 'roar'.uniqid() . $request->file('serviceImage')->getClientOriginalName();

                $request->file('serviceImage')->move(public_path().'/serviceImages/', $fileName);

                unlink( public_path('serviceImages/'.$service->image) );



                $data = array_merge($data, ['image' => $fileName]);
            }

            Service::where('id', $request->serviceId)->update($data);

            return to_route('serviceList')->with('Success Message', 'The service is updated successfully.');

         }else{
            return back()->with('Success Message', 'No Data Changes. You need to edit data to update');
         }

    }

    public function serviceDelete($service_id){
        Service::where('id', $service_id)->delete();

        return back()->with('Success Message', 'The service is deleted successfully.');
    }
}
