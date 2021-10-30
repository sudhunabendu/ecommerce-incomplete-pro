<?php

namespace App\Http\Controllers;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use File;
class ProductController extends Controller
{
    public function index()
    {
       $data = Product::paginate(8);
       return view('admin.product', ['product' => $data]);
    }

   
    public function addproduct()
    {
        return view('admin.addproduct');
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
        $cate = new Product;
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
  
        //  $file= new File();
        $cate->filenames = $files;
        $cate->save();
        $request->session()->flash('message','product Inserted');
        return redirect('admin/product');

    }

    public function status(Request $request,$status,$id)
    {
        $data = Product::find($id);
        $data->status = $status;
        $data->save();
        $request->session()->flash('message','Status Updated');
        return redirect('admin/product');
        // echo $status;
        // echo $id;
    }

   
    public function edit(Request $request, $id='')
    {
        $data = Product::find($id);
        // $data['category'] = DB::table('categories')->get();
        // echo '<pre>';
        // print_r($data['category']);
        // die();
        return view('admin.editproduct')->with('product', $data);
    }

   
    public function update(Request $request, $id)
    {
        $cate =Product::find($id);
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
        $data = Product::find($id);
        $data->delete();
        $request->session()->flash('message','product deleted');
        return redirect('admin/product');
    }
}
