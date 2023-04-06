<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    //create a return view for route all category
    public function AllCat()
    {
        //return view('admin.category.index');
        //modify to read data
        //$categories = Category::all();
        //get the latest
        //$categories = Category::latest()->get();
        $categories = Category::latest()->paginate(5);
        //Query builder
        //$categories = DB::table('categories')->latest()->get();
        //use compact() to send the result to page or view
        return view('admin.category.index', compact('categories'));
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
        //insert data using Using Eloquent
        /*Category::insert([
            'category_name' => $request->category_name,
            'user_id' => Auth::user()->id,
            'created_at' => Carbon::now(),
        ]); */
        /*
        $category = new Category;
        $category->category_name = $request->category_name;
        $category->user_id = Auth::user()->id;
        $category->save();
        */
        //insert data using Query builder
        $data = array();
        $data['category_name'] = $request->category_name;
        $data['user_id'] = Auth::user()->id;
        $data['created_at'] = Carbon::now();
        DB::table('categories')->insert($data);

        //adds redirect or go back to page
        //return Redirect('/category/all');
        return Redirect()->back()->with('success', 'Category Inserted Successful');
    }
}