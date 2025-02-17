<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\adminController;
use Illuminate\Validation\Rules\Password;

class adminController extends Controller
{
    // dashboard page
    public function adminDashboard(){
        return view('admin.dashboard');
    }

    // create service
    public function createService(){
        $category = Category::select('id', 'name')->get();

        return view('admin.createService', compact('category'));
    }

    // // create service DB
    // public function createServiceDB(Request $request){
    //     dd($request->all());
    // }

    // create cateogry
    public function createCategory(){
        return view('admin.createCategory');
    }

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

    // categoryList
    public function categoryList(){
        $category = Category::select('id', 'name')->get();

        return view('admin.categoryList', compact('category'));
    }

    // categoryUpdatePage
    public function updateCategoryPage($category_id){

        $category_name = Category::where('id', $category_id)->select('name')->first();

        return view('admin.updateCategory', compact('category_id','category_name'));
    }

    // categoryUpdateDB
    public function updateCategory(Request $request){

        Category::where('id', $request->categoryId)->update([
            'name' => $request->categoryName
        ]);

        return to_Route('categoryList')->with('Success Message', 'The category is updated successfully.');
    }

    // categoryDelete
    public function categoryDelete($category_id){
        Category::where('id', $category_id)->delete();
        return back()->with('Success Message', 'The category is deleted successfully.');
    }

    public function createAdmin(){
        return view('admin.createAdmin');
    }

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




}
