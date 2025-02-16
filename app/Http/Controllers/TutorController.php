<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Tutor;
use Illuminate\Http\Request;

class TutorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.createExperts');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            "userId" => 'required',
            "displayName" => 'required',
            "about" => 'required'
     ]);

        // admin or Expert
        $data = [
            "user_id" => $request->userId,
            "display_name" => $request->displayName,
            "about" => $request->about,
            "trained_student" => $request->trainedStudent,
            "facebook_acc" => $request->facebookAcc,
            "instagram_acc" => $request->instagramAcc,
            "twitter_acc" => $request->twitterAcc,
            "linkedin_acc" => $request->linkedinAcc,

        ];

        Tutor::create($data);

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $expertList = User::where('role', 'expert')->get();
        return view('admin.expertList', compact('expertList'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function updateDB(Request $request)
    {
        dd($request->all());
        // id should not be null

        // Note | serviceImage does not appear when the value is null
        $validation = $request->validate([
            'name' => 'required',
            'about' => 'required',
        ]);

        $expert = User::select('users.*', 'tutors.*')
        ->where('users.id', $request->id)
        ->leftJoin('tutors', 'tutors.user_id', 'users.id')
        ->first();

        // condition
        $imageChange = $request->serviceImage != null ? 1 : 0 ;     // 0
        $nameChange = $request->serviceTitle != $expert->title ? 1 : 0 ;      // 0
        $displayNameChange = $request->serviceType != $expert->type ? 1 : 0 ;       //0
        $aboutChange = $request->serviceFees != $expert->fees ? 1 : 0 ;     //0
        $categoryIdChange = $request->serviceCategoryId != $expert->category_id ? 1 : 0 ;  //0
        $descriptionChange = $request->serviceDescription != $expert->description ? 1 : 0 ;        //0

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

    /**
     * Update the specified resource in storage.
     */
    public function update($expertId)
    {
        $expert = User::select('users.*', 'tutors.*')
        ->where('users.id', $expertId)
        ->leftJoin('tutors', 'tutors.user_id', 'users.id')
        ->first();

        return view('admin.updateExpert', compact('expert'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tutor $tutor)
    {
        //
    }
}
