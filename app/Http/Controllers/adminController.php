<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Tutor;
use App\Models\Service;
use App\Models\Category;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\adminController;
use Illuminate\Validation\Rules\Password;

class adminController extends Controller
{
    // dashboard page
    public function adminDashboard(){
        $user_count = User::where('role', 'user')->count();

        $student_count = Appointment::where('status', 'booked')->whereNotNull('user_id')->distinct()->count('user_id');

        $expert_count = Tutor::count();

        $category_count = Category::count();

        $service_count = Service::count();

        $booked_apt_count = Appointment::where('status', 'booked')->count();

        $pending_apt_count = Appointment::where('status', 'pending')->count();

        $avl_apt_count = Appointment::where('status', 'available')->count();

        return view('admin.dashboard', compact('user_count', 'student_count', 'expert_count', 'category_count', 'service_count', 'booked_apt_count', 'pending_apt_count', 'avl_apt_count'));
    }





    // create service
    public function createService(){
        $category = Category::select('id', 'name')->get();

        return view('admin.createService', compact('category'));
    }




    // create cateogry
    public function createCategory(){
        return view('admin.createCategory');
    }



    // create cateogry DB
    public function createCategoryDB(Request $request){

        $validation = $request->validate([
            'categoryName' => 'required'
        ]);

        $data = [
            'name'=> $request->categoryName
        ];

        Category::create($data);

        return to_Route('categoryList')->with('Success Message', 'The category is created successfully.');
    }




    // categoryList admin
    public function categoryList(){
        $category = Category::select('id', 'name')->get();

        return view('admin.categoryList', compact('category'));
    }




    // categoryUpdatePage admin
    public function updateCategoryPage($category_id){

        $category_name = Category::where('id', $category_id)->select('name')->first();

        return view('admin.updateCategory', compact('category_id','category_name'));
    }

    // categoryUpdateDB admin
    public function updateCategory(Request $request){

        Category::where('id', $request->categoryId)->update([
            'name' => $request->categoryName
        ]);

        return to_Route('categoryList')->with('Success Message', 'The category is updated successfully.');
    }

    // categoryDelete admin
    public function categoryDelete($category_id){
        Category::where('id', $category_id)->delete();
        return back()->with('Success Message', 'The category is deleted successfully.');
    }




    public function createAdmin(){
        return view('admin.createAdmin');
    }



    //crate admin acc by admin
    public function createAdminDB(Request $request){

        $request->validate([
            'name' => ['required'],
            'email' => 'required|email|unique:users,email',
            'role' => 'required',
            'password' => ['required', Password::defaults()],
            'confirmPassword' => 'required|same:password'
        ]);

        // admin or Expert
        $data = [
            'image' => '',
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'address' => $request->address,
        ];
        $fileName = 'roar'.uniqid() . $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path().'/admin/adminAndExpertProfileImg/',$fileName);
        $data['image'] = $fileName;

        User::create($data);



        if($request->role == 'admin'){
            return to_route('adminList')->with('Success Message', 'The admin account is created successfully.');
        }else{
            return to_route('expertList')->with('Success Message', 'The expert account is created successfully.');
        }

    }

    public function adminList(){
        $adminList = User::where('role', 'superAdmin')->orWhere('role', 'admin')->get();
        return view('admin.adminList', compact('adminList'));
    }

    public function userList(){
        $userList = User::where('role', 'user')->get();
        return view('admin.userList', compact('userList'));
    }

    public function aptToCheck(){
        $pending_appointment = Appointment::where('status', 'pending')->get();

        return view('admin.aptToCheck', compact('pending_appointment'));
    }

    public function approveAptAdmin($aptId){
        Appointment::where('id', $aptId)->update([
            'status' => 'booked'
        ]);

        return to_route('aptToCheck');
    }

    public function profile()
    {
        return view('admin.adminProfile');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function profileUpdate(Request $request)
    {

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
