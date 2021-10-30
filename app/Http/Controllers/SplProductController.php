<?php

namespace App\Http\Controllers;
use App\Models\Image;
use Illuminate\Http\Request;
use App\Models\SpecialProduct;
use Illuminate\Support\Facades\DB;
use File;

class SplProductController extends Controller
{
    public function index()
    {
       $data = SpecialProduct::paginate(8);
       return view('admin.product', ['product' => $data]);
    }

   
    public function addproduct()
    {
        return view('admin.addSpecialProduct');
    }

    public function insert(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'name' => 'required',
            'slug' => 'required',
            'brand' => 'required',
            'short_description' => 'required',
            'desc' => 'required',
            'price'=>'required',
            'weight'=>'required',
            // 'quantity'=>'required',
            'offer_price'=>'required',
            'keywords' => 'required',
            'filenames' => 'required',
        ]);
        $cate = new SpecialProduct;
        $cate->category_id = $request->category_id;
        $cate->name = $request->name;
        $cate->slug = $request->slug;
        $cate->brand = $request->brand;
        $cate->short_description = $request->short_description;
        $cate->desc = $request->desc;
        $cate->price = $request->price;
        $cate->weight = $request->weight;
        $cate->quantity = $request->quantity;
        $cate->offer_price = $request->offer_price;
        $cate->keywords = $request->keywords;
        $cate->status =1;
        $files = [];
        if($request->hasfile('filenames'))
         {
            foreach($request->file('filenames') as $file)
            {
                $name = time().rand(1,100).'.'.$file->extension();
                $file->move(public_path('files'), $name);  
                $files[] = $name;  
            }
         }
  
        $cate->filenames = $files;
        $cate->save();
        $request->session()->flash('message','product Inserted');
        return redirect('admin/product');

    }

    public function status(Request $request,$status,$id)
    {
        $data = SpecialProduct::find($id);
        $data->status = $status;
        $data->save();
        $request->session()->flash('message','Status Updated');
        return redirect('admin/product');
        
    }

   
    public function edit(Request $request, $id='')
    {
        $data = SpecialProduct::find($id);
        return view('admin.editproduct')->with('product', $data);
    }

   
    public function update(Request $request, $id)
    {
        $cate =SpecialProduct::find($id);
        $cate->category_id = $request->category_id;
        $cate->name = $request->name;
        $cate->slug = $request->slug;
        $cate->brand = $request->brand;
        $cate->short_description = $request->short_description;
        $cate->desc = $request->desc;
        $cate->keywords = $request->keywords;
        $cate->weight = $request->weight;
        $cate->save();
        $request->session()->flash('message','product Updated');
        return redirect('admin/product');
    }

    
    public function delete(Request $request, $id)
    {
        $data = SpecialProduct::find($id);
        $data->delete();
        $request->session()->flash('message','product deleted');
        return redirect('admin/product');
    }
}
