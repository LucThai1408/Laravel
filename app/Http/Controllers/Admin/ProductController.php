<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\ProductCreateRequest;
use App\Http\Requests\ProductUpdateRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $product = Product::paginate(3);
        return view('admin.product.index',compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {       
        $categories = Category::all();
        return view('admin.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductCreateRequest $request)
    {
        //upload file
        $file = $request->photo;
        $file_name = $file ->getClientOriginalName();
        $file->storeAs('public/images',$file_name);

        //thêm mới

        $request->merge(['image'=>$file_name]);
        Product::create($request->all());
        return redirect()->route('product.index')->with('success' , 'Thêm mới thành công');
        }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.product.edit',compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductUpdateRequest $request, Product $product)
    {
        if($request->hasFile('photo')){
            $file = $request->photo;
            $file_name = $file->getClientOriginalName();
            $file ->storeAs('public/images',$file_name);
        }else{
            $file_name = $product->image;
        }
        $request->merge(['image'=>$file_name]);
        $product->update($request->all());
        return redirect()->route('product.index')->with('success' , 'Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( Product $product)
    {
        $product->delete();
        return redirect()->route('product.index')->with('success','Đã xóa thành công');
    }
}
