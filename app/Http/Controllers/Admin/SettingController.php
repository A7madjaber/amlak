<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Setting;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class SettingController extends Controller
{
    public function index(){
        $setting=Setting::all()->first();
        return view('admin.setting.index',compact('setting'));
    }



    public function update(Request $request ,$id){
       $setting= Setting::find($id);

        if($request->file('image')){

            if($request->file('image')){
                if (file_exists(public_path('media/settings/'.$setting->image))){
                    unlink((public_path('media/settings/'.$setting->image)));
                }
            }

                $Image = Image::make($request->image)->resize(1200,500);
            $Image->save('media/settings/'.
                $request->file('image')->getClientOriginalName());

            $image_database= $request->file('image')->getClientOriginalName();
        }else{
            $image_database=$request->old_image;
        }



        $setting->update([
                'image' => $image_database,
            ]+$request->except('old_image'));



        return redirect()->route('admin.home')
            ->with(['message' => 'تم تعديل الاعدادات بنجاح', 'alert-type' => 'success']);
    }


}
