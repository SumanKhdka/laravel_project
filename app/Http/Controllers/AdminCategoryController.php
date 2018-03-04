<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class AdminCategoryController extends Controller
{
    var $current='categories';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories=DB::table('tbl_categories');
        //$categories=null;
        if($request->has('q')){
            $params='%'.$request->get('q').'%';
            $categories=Category::where('name','like',$params)
            ->orwhere('description','like',$params);     
        }
        $categories=$categories->paginate(5);
        return view('admin.categories.index',[
            'categories'=>$categories,
            'current'=>$this->current
        ]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create',[
            'current'=>$this->current
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $this->_save(new category(),$request);
        return redirect('admin/categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit',[
            'current'=>$this->current,
            'category'=>Category::find($category->id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $this->_save($category,$request);
        return redirect('admin/categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect('admin/categories');
    }
    private function _save(Category $category,Request $request){
        $category->name=$request->input('name');
        $category->description=$request->input('description');
        $category->display_order=$request->input('display_order');
        $category->status=$request->has('status');

        $category->meta_description=$request->input('meta_description');
        $category->meta_keywords=$request->input('meta_keywords');

        if($request->hasFile('image')){
            $request->file('image');
            $category->image=Storage::putFile('public',$request->image);
        }
        $category->save();

    }
}
