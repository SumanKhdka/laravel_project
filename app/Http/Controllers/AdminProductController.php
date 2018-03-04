<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\Brand;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class AdminProductController extends Controller
{
    var $current ='products';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.products.index',[
            'products'=>Product::paginate(5),
            'categories'=>$this->getCategoriesname(),
            'brands'=>$this->getBrands(),
            'current'=>$this->current
        ]);
    }
    private function getCategoriesname(){
        $categories=[];
        foreach(Category::all() as $c){
            $categories[$c->id]=$c->name;
        }
        return $categories;
    }
    private function getBrands(){
        $brands=[];
        foreach(Brand::all() as $b){
            $brands[$b->id]=$b->name;
        }
        return $brands;
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create',[
            'current'=>$this->current,
            'categories'=>$this->getCategories()
        ]);
        
    }

    private function getCategories(){
        $categories=[];
        foreach(Category::all() as $c){
            $categories[$c->id]=$c->name;
        }
        return $categories;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $this->_save(new product(),$request);
        return redirect('admin/products');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('admin.products.edit',[
            'current'=>$this->current,
            'categories'=>$this->getCategorie(),
            'product'=>Product::find($product->id)
        ]);
    }
    private function getCategorie(){
        $categories=[];
        foreach(Category::all() as $c){
            $categories[$c->id]=$c->name;
        }
        return $categories;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        $this->_save($product,$request);
        return redirect('admin/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect('admin/products');
    }
    private function _save(Product $product,Request $request){
        $product->name=$request->input('name');
        $product->description=$request->input('description');
        $product->quantity=$request->input('quantity');
        $product->price=$request->input('price');
        $product->category_id=$request->input('category_id');
        $product->display_order=$request->input('display_order');
        $product->status=$request->has('status');
        $product->meta_description=$request->input('meta_description');
        $product->meta_keywords=$request->input('meta_keywords');

        if($request->hasFile('image')){
            $request->file('image');
            $product->image=Storage::putFile('public',$request->image);
        }
        $product->save();
}
}
