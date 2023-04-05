<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    //create a return view for route all category
    public function AllCat()
    {
        return view('admin.category.index');
    }
    public function AddCat(Request $request)
    {
        /*
        $validatedData = $request->validate([
            'category_name' => 'required|unique:categories|max:10',
        ]);
        */
        //customized validation
        $validatedData = $request->validate(
            [
                'category_name' => 'required|unique:categories|max:10',
            ],
            [
                'category_name.required' => 'Please enter a category name',
                'category_name.max' => 'Maximum character is 10!',
            ]
        );
        //insert data using Query builder
        Category::insert([
            'category_name' => $request->category_name,
            'user_id' => Auth::user()->id,
            'created_at' => Carbon::now(),
        ]);
        //adds redirect or go back to page
        //return Redirect('/category/all');
        return Redirect()->back()->with('success', 'Category Inserted Successful');
    }
}