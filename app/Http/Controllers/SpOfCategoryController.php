<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SpOfCategory;

class SpOfCategoryController extends Controller
{
    public function index(){

        return view('admin.add_spl_off_category');
    }

    public function insert(Request $request){

        $data = new SpOfCategory;
        $data->category_name = $request->category_name;
        $data->category_slug = $request->category_slug;
        $data->save();
        $request->session()->flash('message','category Inserted');
        return redirect('admin/spl_category');

    }

    public function show_spl_category(){

        $data = SpOfCategory::all();
        return view('admin/view_spl_category', ['category' => $data]);
    }

    public function edit(Request $request, $id='')
    {
        $data = SpOfCategory::find($id);
        return view('admin.editSplCategory')->with('category', $data);
    }
    
    public function update(Request $request, $id)
    {
         $request->validate([
            'category_name' => 'required',
            'category_slug' => 'required|unique:categories',
        ]);
        $cate =SpOfCategory::find($id);
        $cate->category_name = $request->category_name;
        $cate->category_slug = $request->category_slug;
        $cate->save();
        $request->session()->flash('message','category Updated');
        return redirect('admin/showCategory');
       
    }

    
    public function delete(Request $request, $id)
    {
        $data = SpOfCategory::find($id);
        $data->delete();
        $request->session()->flash('message','special category deleted');
        return redirect('admin/showCategory');
    }

    public function status(Request $request,$status,$id)
    {
        $data = SpOfCategory::find($id);
        $data->status = $status;
        $data->save();
        $request->session()->flash('message','Status Updated');
        return redirect('admin/showCategory');
    }
}
