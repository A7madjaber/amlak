<?php

namespace App\Http\Controllers\Admin;

use App\Building;
use App\Http\Controllers\Controller;
use App\Http\Requests\BuldingRequest;
use App\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class BuildingController extends Controller{
    public function index(Request $request)
    {

        if ($request->keys(0)) {
            $buildings = Building::whereUser_id($request->keys(0))->get();
            return view('admin.building.index',compact('buildings'));
        }else {
            $buildings = Building::all();
            return view('admin.building.index',compact('buildings'));
        }


    }


    public function create()
    {
        $types=Type::all();
        return view('admin.building.create',compact('types'));
    }


    public function store(BuldingRequest $request){

        Building::saveImages($request);
        $image_two= $request->image_two ?
          '2' . $request->file('image_two')->getClientOriginalName() : null;

        $image_three= $request->image_three ?
            '3' . $request->file('image_three')->getClientOriginalName() : null;

           $one='1'.$request->file('image_one')->getClientOriginalName();

        Building::create([
                'image_one' =>$one ,
                'status'=>1,
                'user_id'=>auth()->user()->id,
                'image_two'=>$image_two,
               'image_three'=>$image_three,

            ]+$request->all());

        return redirect()->route('admin.building.index')
            ->with(['message' => 'تم الاضافة  بنجاح', 'alert-type' => 'success']);



    }



    public function edit($id)

    {
        $types=Type::all();
        $building=Building::find($id);
        return view('admin.building.edit', compact('building','types'));
    }



    public function update(BuldingRequest $request, $id)
    {
        $building=Building::find($id);

        if($request->file('image_one')){
            if (file_exists(public_path('media/buildings/'.$building->name.'/'.$building->image_one))){
                unlink((public_path('media/buildings/'.$building->name.'/'.$building->image_one)));
            }

            $ImageOne = Image::make($request->image_one)->resize(750,550);
            $ImageOne->save('media/buildings/'.$request->name.'/1'.
                $request->file('image_one')->getClientOriginalName());

            $image_one_database='1'.$request->file('image_one')->getClientOriginalName();

        }else{
            $image_one_database=$request->old_image_one;
        }

        if($request->file('image_two')){

            if (file_exists(public_path('media/buildings/'.$building->name.'/'.$building->image_two))){
                unlink((public_path('media/buildings/'.$building->name.'/'.$building->image_two)));
            }

            $ImageTwo = Image::make($request->image_two)->resize(750,550);
            $ImageTwo->save('media/buildings/'.$request->name.'/2'.
                $request->file('image_two')->getClientOriginalName());

            $image_two_database='2'.$request->file('image_two')->getClientOriginalName();
        }else{
            $image_two_database=$request->old_image_two;
        }


        if($request->file('image_three')){

            if (file_exists(public_path('media/buildings/'.$building->name.'/'.$building->image_three))){
                unlink((public_path('media/buildings/'.$building->name.'/'.$building->image_three)));
            }


            $ImageTwo = Image::make($request->image_three)->resize(750,550);
            $ImageTwo->save('media/buildings/'.$request->name.'/3'.
                $request->file('image_three')->getClientOriginalName());

            $image_three_database='3'.$request->file('image_three')->getClientOriginalName();
        }else{
            $image_three_database=$request->old_image_three;
        }


        $building->update([
                'image_one' =>  $image_one_database,
                'image_two' =>  $image_two_database,
                'image_three' =>$image_three_database,
            ]+$request->except('old_image_one','old_image_two','old_image_three'));


        return redirect()->route('admin.building.index')
            ->with(['message' => 'تم تعديل العقار بنجاح', 'alert-type' => 'success']);
    }



    public function destroy(Request $request )
    {

        $building= Building::findOrFail($request->id);

        if (file_exists(public_path('media/buildings/'.$building->name))){
            File::deleteDirectory(public_path('media/buildings/'.$building->name));
        }

        $building->delete();
        return response()->json(['message'=>'تم حذف العقار بنجاح','status'=>true],200);
    }


    public function status($id)
    {
        $building= Building::findOrFail($id);

        if ($building->status==1){
            $building->update(['status'=>0]);
            return redirect()->back()    ->with(['message' => 'تم  الغاء  العقار من المعروضات', 'alert-type' => 'warning']);


        }else{

            $building->update(['status'=>1]);
            return redirect()->back() ->with(['message' => 'تم اضافة العقار الى المعروضات', 'alert-type' => 'success']);


        }

    }

    public function MarkReadAll(){

        $userUnreadNotification= auth()->user()->unreadNotifications;
        if(count($userUnreadNotification)!=0) {
            $userUnreadNotification->markAsRead();
            return response()->json(['message'=>'تم تعيين جميع الاشعارات كمقروء','status'=>true],200);

        }else{
            return response()->json(['message'=>'لايوجد اشعارات','status'=>true],404);

        }
    }
}
