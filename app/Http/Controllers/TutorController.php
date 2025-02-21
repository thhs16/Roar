<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Tutor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Appointment;

class TutorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function expertDashboard()
    {
        $booked_apt_count = Appointment::where('status', 'booked')
                            ->where('expert_id', auth()->user()->id)
                            ->count();

        $pending_apt_count = Appointment::where('status', 'pending')
                            ->where('expert_id', auth()->user()->id)
                            ->count();

        $avl_apt_count = Appointment::where('status', 'available')
                            ->where('expert_id', auth()->user()->id)
                            ->count();

        return view('expert.expertDashboard', compact('booked_apt_count', 'pending_apt_count', 'avl_apt_count'));
    }

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
        $imageChange = $request->image != null ? 1 : 0 ;     // 0
        $nameChange = $request->name != $expert->name ? 1 : 0 ;      // 0
        $displayNameChange = $request->displayName != $expert->display_name ? 1 : 0 ;       //0
        $aboutChange = $request->about != $expert->about ? 1 : 0 ;     //0
        $trainedStudentChange = $request->trainedStudent != $expert->trained_student ? 1 : 0 ;  //0
        $facebookAccChange = $request->facebookAcc != $expert->facebook_acc ? 1 : 0 ;        //0
        $instagramAccChange = $request->instagramAcc != $expert->instagram_acc ? 1 : 0 ;        //0
        $twitterAccChange = $request->twitterAcc != $expert->twitter_acc ? 1 : 0 ;        //0
        $linkedinAccChange = $request->linkedinAcc != $expert->linkedin_acc ? 1 : 0 ;        //0

        $changeCondition = $imageChange | $nameChange | $displayNameChange | $aboutChange | $trainedStudentChange | $facebookAccChange | $instagramAccChange | $twitterAccChange| $linkedinAccChange;

        $dataUser = [];
        $dataExpert = [];

        if($changeCondition){

            if($nameChange){
                // array_push($data, [
                //     'title' => $request->serviceTitle
                // ]);

                $dataUser = array_merge($dataUser , ['name' => $request->name]);

            }
            if ($displayNameChange) {
                $dataExpert = array_merge($dataExpert, ['display_name' => $request->displayName]);

                // dd($dataExpert);
            }

            if ($aboutChange) {
                $dataExpert = array_merge($dataExpert, ['about' => $request->about]);
            }

            if ($trainedStudentChange) {
                $dataExpert = array_merge($dataExpert, ['trained_student' => $request->trainedStudent]);
            }

            if ($facebookAccChange) {
                $dataExpert = array_merge($dataExpert, ['facebook_acc' => $request->facebookAcc]);
            }

            if ($instagramAccChange) {
                $dataExpert = array_merge($dataExpert, ['instagram_acc' => $request->instagramAcc]);
            }

            if ($twitterAccChange) {
                $dataExpert = array_merge($dataExpert, ['twitter_acc' => $request->twitterAcc]);
            }

            if ($linkedinAccChange) {
                $dataExpert = array_merge($dataExpert, ['linkedin_acc' => $request->linkedinAcc]);
            }

            if ($imageChange) {

                $fileName = 'roar'.uniqid() . $request->file('image')->getClientOriginalName();

                $request->file('image')->move(public_path().'/admin/adminAndExpertProfileImg/', $fileName);

                unlink( public_path("admin/adminAndExpertProfileImg/".$expert->image) );

                $data = array_merge($dataUser, ['image' => $fileName]);
            }

            // dd($dataUser);
            // dd($dataExpert);

            if($dataUser != []){
                User::where('id', $request->id)->update($dataUser);
            }

            if($dataExpert != []){
                $exists = Tutor::where('user_id', $request->id)->exists();

                if($exists){
                    Tutor::where('id', $request->id)->update($dataExpert);
                }else{
                    $dataExpert = array_merge($dataExpert, ['user_id' => $request->id]);
                    Tutor::create($dataExpert);
                }
            }

            return to_route('expertList')->with('Success Message', 'The expert info is updated successfully.');

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

        return view('admin.updateExpert', compact('expert', 'expertId'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($expertId)
    {
        User::where('id', $expertId)->delete();
        return to_route('expertList')->with('Success Message', 'The expert is deleted successfully.');
    }


    public function addAptTime()
    {
        return view('expert.addAptTime');
    }

    public function profile()
    {
        return view('expert.expertProfile');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function profileUpdate(Request $request)
    {
        // dd($request->all());

        $validation = $request->validate([
            'name' => 'required',
            'image' => 'mimes:jpeg,png,jpg,gif'
        ]);

        $user = User::where('users.id', auth()->user()->id)->first();


        // condition
        $imageChange = $request->image != null ? 1 : 0 ;     // 0
        $nameChange = $request->name != $user->name ? 1 : 0 ;      // 0
        $phoneChange = $request->phone != $user->phone ? 1 : 0 ;       //0
        $addressChange = $request->address != $user->address ? 1 : 0 ;     //0

        $changeCondition = $imageChange | $nameChange | $phoneChange | $addressChange ;

        $data = [];

        if($changeCondition){

            if($nameChange){

                $data = array_merge($data , ['name' => $request->name]);

            }
            if ($phoneChange) {
                $data = array_merge($data, ['phone' => $request->phone]);

            }

            if ($addressChange) {
                $data = array_merge($data, ['address' => $request->address]);
            }


            if ($imageChange) {

                $fileName = 'roar'.uniqid() . $request->file('image')->getClientOriginalName();

                $request->file('image')->move(public_path().'/admin/adminAndExpertProfileImg/', $fileName);


                if ($user->image != null) {
                    if (file_exists(public_path('admin/adminAndExpertProfileImg/' .$user->image))) {
                        unlink( public_path("admin/adminAndExpertProfileImg/".$user->image) );
                    }
                }

                $data = array_merge($data, ['image' => $fileName]);
            }

            // dd($data);

            if($data != []){
                User::where('id', auth()->user()->id)->update($data);
            }

            return back()->with('Success Message', 'The admin info is updated successfully.');

         }else{
            return back()->with('Success Message', 'No Data Changes. You need to edit data to update');
         }
    }

    public function updateProfilePassword(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'oldPassword' => 'required',
            'newPassword' => 'required|min:6|confirmed',
        ]);

        if (!Hash::check($request->oldPassword, auth()->user()->password)) {
            return back()->withErrors(['old_password' => 'Old password is incorrect']);
        }

        Auth::user()->update([
            'password' => Hash::make($request->newPassword),
        ]);

        return redirect()->back()->with('Success Message', 'Password changed successfully!');
    }
}
