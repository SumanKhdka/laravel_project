<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Http\Requests\BannerRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
//use Symfony\Component\HttpFoundation\Request;

class AdminBannerController extends Controller
{
    var $current='banners';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $banners=null;
        if($request->has('q')){
            $params='%'.$request->input('q').'%';
            $banners=Banner::where('name','like',$params)->get();
        }else{
            $banners=Banner::all();
        }
        return view('admin.banners.index',[
            'banners'=>$banners,
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
        return view('admin.banners.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BannerRequest $request)
    {
        $this->_save(new banner(),$request);
        return redirect('admin/banners');
       
   }

    /**
     * Display the specified resource.
     *
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $id)
    {
        return view('admin.banners.edit',[
            'banner'=>Banner::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(BannerRequest $request, Banner $banner)
    {
        $this->_save($banner,$request);
        return redirect('admin/banners');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        $banner->delete();
        return redirect('admin/banners');
    }

    private function _save(Banner $banner,Request $request){
        $banner->title=$request->input('title');
        $banner->description=$request->input('description');
        $banner->status=$request->has('status');
        
        if($request->hasFile('image')){
            $request->file('image');
            $banner->image=Storage::putFile('public',$request->image);
        }
        $banner->save();

    }
}
