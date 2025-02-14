<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\adminController;

class adminController extends Controller
{
    // dashboard page
    public function adminDashboard(){
        return view('admin.dashboard');
    }

    // create service
    public function createService(){
        return view('admin.createService');
    }

    // create service DB
    public function createServiceDB(Request $request){
        dd($request->all());
    }

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





}
