<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;


class CategoryController extends Controller
{
   
    public function index()
    {
        // $data = Category::orderBy('id','asc')->paginate(9);
       $data = Category::all();
       return view('admin.category', ['category' => $data]);
    }

    public function addcategory()
    {
        return view('admin.addcategory');
    }

  
    public function insert(Request $request)
    {
        $request->validate([
            'category_name' => 'required',
            'category_slug' => 'required|unique:categories',
        ]);
        $cate = new Category;
        $cate->category_name = $request->category_name;
        $cate->category_slug = $request->category_slug;
        $cate->status =1;
        $cate->save();
        $request->session()->flash('message','category Inserted');
        return redirect('admin/category');

    }

    public function edit(Request $request, $id='')
    {
        $data = Category::find($id);
        return view('admin.editcategory')->with('category', $data);
    }

    public function status(Request $request,$status,$id)
    {
        $data = Category::find($id);
        $data->status = $status;
        $data->save();
        $request->session()->flash('message','Status Updated');
        return redirect('admin/category');
        // echo $status;
        // echo $id;
    }

    
    public function update(Request $request, $id)
    {
         $request->validate([
            'category_name' => 'required',
            'category_slug' => 'required|unique:categories',
        ]);
        $cate =Category::find($id);
        $cate->category_name = $request->category_name;
        $cate->category_slug = $request->category_slug;
        $cate->save();
        $request->session()->flash('message','category Updated');
        return redirect('admin/category');
       
    }

    
    public function delete(Request $request, $id)
    {
        $data = Category::find($id);
        $data->delete();
        $request->session()->flash('message','category deleted');
        return redirect('admin/category');
    }
}
