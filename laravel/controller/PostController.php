<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; // for handle request
use App\Post;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
//        return $request->method(); // method is get or post
    //     if($request->isMethod('POST')){
    //       echo "req accepted";
    //       dd();
          
    // } else {
    //     echo 'not done';
    //     dd();
    // }
        $data = new Post;
        $data = $data->data();
        return view('posts.index',compact('data'));//['data'=>$data]);
    }
//        {{$store['std']}}<br>
//                    {{$store['study']}}
                

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //coming data from create.blade file
//        return $request->input('content');
        $data = array(
            'title' => $request->input('title'),
            'content' => $request->input('content'), 
            'hobby' => $request->input('check'),
            'image' => $request->file('photo')->store('images','public')
            ); //access checkbox with array
         return view('posts.show', compact('data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
