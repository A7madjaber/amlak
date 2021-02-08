<?php

namespace App\Http\Controllers;

use App\Building;
use App\Http\Requests\BuldingRequest;
use App\Http\Requests\EditUsersRequest;
use App\Notifications\BuildingNotification;
use App\Type;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class BuildingController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function create(){
        $types =Type::all();
        return view('front.user-create',compact('types'));
    }

    public function store(BuldingRequest $request){
        Building::saveImages($request);
        $image_two= $request->image_two ?
            '2' . $request->file('image_two')->getClientOriginalName() : null;

        $image_three= $request->image_three ?
            '3' . $request->file('image_three')->getClientOriginalName() : null;

        $one='1'.$request->file('image_one')->getClientOriginalName();

        $building=Building::create([
                'status' =>0 ,
                'image_one' =>$one ,
                'user_id'=>auth()->user()->id,
                'image_two'=>$image_two,
                'image_three'=>$image_three,

            ]+$request->all());

        $users = User::where('admin',1)->get();
        foreach ($users as $user) {
            $user->notify(new BuildingNotification($building));
        }
        return redirect()->route('user.buildings')
            ->with(['message' => ' تم الاضافة  بنجاح , سيتم المراجعة وادراجها من قبل المديرين', 'alert-type' => 'success']);

    }

    public function index(){
        $buildings=Building::where('user_id',auth()->user()->id)->orderBy('created_at','desc')->get();
        return view('front.user_buildings',compact('buildings'));
    }

    public function edit($id){
        $building =Building::findOrFail($id);
        if ($building->user_id==\auth()->user()->id && $building->status==0 ) {

            $types=Type::all();
            return view('front.edit-building',compact('building','types'));

        }else {
            $message='ليست لديك صلاحيات لتعديل هذا العقار';
            return view('front.status',compact('building','message'));
        }


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


        return redirect()->route('user.buildings')
            ->with(['message' => 'تم تعديل العقار بنجاح', 'alert-type' => 'success']);
    }



    public function profile(){
        $user=Auth::user();
        return view('front.profile',compact('user'));
    }


public function profileUpdate(EditUsersRequest $request , $id){

        if ($request->password=='') {
            $User=User::find($id);
            $User->update($request->except('password'));

        }else{
            $password=Auth::user()->password;
            $oldpass=$request->old_password;
            $newpass=$request->password;
            $confirm=$request->password_confirmation;

            if (Hash::check($oldpass,$password)){

                if ($newpass === $confirm) {
                    $User=User::find($id);
                    $User->password=Hash::make($request->password);
                    $User->save();
                    Auth::logout();
                    return redirect()->route('home')
                        ->with(['message' => 'تم التعديل بنجاح, سجل دخولك بالمعلومات الجديدة', 'alert-type' => 'success']);
                }else{
                    return Redirect()->back()
                        ->with(['message'=>'كلمة المرور الجديدة غير متطابقة','alert-type'=>'error']);
                }

            }else{
                return Redirect()->back()
                    ->with(['message'=>'كلمة المرور القديمة غير متطابقة','alert-type'=>'error'
                    ]);
            }
        }
    }

}

