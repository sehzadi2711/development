<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function data(){
        $data = [
                    ['company'=> 'Rinvin tech','name'=>'Rinku'],
                    ['name' => 'Rinkal jain','company'=>'tech web'],
                    ['photo']
                ];
        return $data;
    }
    public function store(){
        $store = ['std'=>12,'study'=>'science'];
        return $store;
        
    }
    
}
