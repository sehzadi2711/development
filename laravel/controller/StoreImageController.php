<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;
use Illuminate\Support\Facades\Response;
// use Image;	

class StoreImageController extends Controller
{
    public function index()
    {
        // echo 1;exit;
    	$data = Image::All();
    	return view('store_image',compact('data'));
    }
    public function store(Request $request)
    {
        $image = new Image();

        $image->user_name = $request->input('user_name');
        // $image->user_image = $request->input('user_image');
        
        if($request->hasfile('user_image')){
            $file = $request->file('user_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('rinkal/imgs/',$filename);
            $image->user_image = $filename;
        }else{
            return $request;
            $image->user_image = '';
        }
        $image->save();
        // return view('store_image')->with('store_image',$image);

         return redirect()->back()->with('success','Image store successfully.');
    }

    
}
