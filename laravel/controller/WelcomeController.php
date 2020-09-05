<?php

namespace App\Http\Controllers;

class WelcomeController extends Controller{
    public function welcome(){
        $data = new \App\Post;
        $data = $data->data();
        return view('welcome', compact('data'));
    }
//    public function goodbye($name="Guest"){
//        return "hello {$name} goodbye";
//    }

    public function rinvin(){
        $store = new \App\Post;
        $store = $store->store();
        return view('rinvin', compact('store'));
        }
 }
