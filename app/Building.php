<?php

namespace App;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    protected $guarded=[];

    public function type(){
        return$this->belongsTo(Type::class);
    }
    public function user(){
        return$this->belongsTo(User::class);
    }

    public static function saveImages($request){

        if ($request->hasFile('image_one')){

            $path = public_path('media/buildings/'.$request->name);
            if(!File::isDirectory($path)){
                File::makeDirectory($path, 0777, true, true);
            }

            $ImageOne = Image::make($request->image_one)->resize(750,550);
            $ImageOne->save('media/buildings/'.$request->name.'/1'.
                $request->file('image_one')->getClientOriginalName());

        }

        if ($request->hasFile('image_two')){
            $ImageTwo = Image::make($request->image_two)->resize(750,550);
            $ImageTwo->save('media/buildings/'.$request->name.'/2'.
                $request->file('image_two')->getClientOriginalName());


        }

        if ($request->hasFile('image_three')){
            $ImageThree = Image::make($request->image_three)->resize(750,450);
            $ImageThree->save('media/buildings/'.$request->name.'/3'.
                $request->file('image_three')->getClientOriginalName());

        }


    }
}
