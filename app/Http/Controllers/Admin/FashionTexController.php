<?php

namespace App\Http\Controllers\Admin;

use App\Fashion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class FashionTexController extends Controller
{
    public function index()
    {
        $fashions = Fashion::orderBy('id','DESC')->paginate(24);
       return view('pages.all_fashion',compact('fashions'));
    }
//    frontend
//    public function fashionIndex(){
//        return view('dashboard');
//    }
//    public function fashionTexIndex(){
//        $fashions = Fashion::orderBy('id','DESC')->get();
//        return response()->json($fashions);
//    }
//    frontend
    public function create()
    {
        return view('pages.create_fashion');
    }
    public function store(Request $request)
    {
       $fashion_pic = $request->file('fashion_image');
       $fashion_video = $request->file('fashion_video');
       if(!empty($fashion_pic) || !empty($fashion_video)) {
           if (!empty($fashion_pic)) {
               $fashion_pic_name = time() . '.' . $fashion_pic->getClientOriginalExtension();
               $fashion_pic->move(public_path() . '/fashion_images/', $fashion_pic_name);
               Fashion::create([
                   'image' => $fashion_pic_name,
                   'type' => 'image',
               ]);
           }
           if (!empty($fashion_video)) {
               $fashion_video_name = time() . '.' . $fashion_video->getClientOriginalExtension();
               $fashion_video->move(public_path() . '/fashion_video/', $fashion_video_name);
               Fashion::create([
                   'image' => $fashion_video_name,
                   'type' => 'video',
               ]);
           }
           Session::flash('success', 'Your File Has Been Uploaded Successfully');
           return redirect('fashion');
       }
        Session::flash('success', 'Nothing Is Uploaded');
        return redirect(route('fashion.create'));
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        //
    }
    public function update(Request $request, $id)
    {
        //
    }
    public function destroy($id)
    {
        $delete_fashion = Fashion::find($id);
        if($delete_fashion->type == 'image'){
            $delete_fashion->delete();
            unlink('fashion_images/'.$delete_fashion->image);
            Session::flash('success','Your File Has Been Deleted Successfully');
            return redirect('fashion');
        }
        $delete_fashion->delete();
        unlink('fashion_video/'.$delete_fashion->image);
        Session::flash('success','Your File Has Been Deleted Successfully');
        return redirect('fashion');
    }
}
