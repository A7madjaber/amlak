<?php

namespace App\Http\Controllers;

use App\Building;
use App\Http\Requests\BuldingRequest;
use App\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('welcome');
    }

    public function all()
    {
        $buildings= Building::whereStatus(1)->orderBy('created_at','desc')->simplePaginate(8);
        return view('front.all',compact('buildings'));
    }


    public function details ($id){
        $building=Building::findOrFail($id);
        if ($building->status==0) {
            $message='بانتظار موافقة الادراة على العقار';
            return view('front.status',compact('building','message'));

        }else {

            $buildings=Building::whereRent($building->rent)
                ->whereStatus(1)->where('id','!=',$building->id)->inRandomOrder()->take(3)
                ->get();

        }
        return view('front.details',compact('building','buildings'));
    }




 public function deep(Request $request)
    {

     $requestall=array_except($request->toArray(),['submit','_token','page']);
     $array=[];
     $query=DB::table('buildings')->select('*');
     $i=0;
     $count=count($requestall);
        foreach ($requestall as $key=>$item){
            $i++;
            if ($item!= '' ) {

                if ($key == 'min' && $request->max == '') {
                    $query->where('price', '>=', $item);
                    if ($key!='status') {
                        $array[$key]=$item;}

                } elseif ($key == 'max' && $request->min == '') {
                    $query->where('price', '<=', $item);
                    if ($key!='status') {
                        $array[$key] = $item;
                    }


            }elseif($count == $i && $request->max!='' && $request->min) {

                $query->whereBetween('price',[$request->min,$request->max]);
                if ($key!='status'){
                    $array[$key]=$item;
                }
                }

                else {
                    if ($key != 'max' && $key != 'min') {
                        $query->where($key, 'like', '%' . $item . '%');
                        if ($key!='status') {
                            $array[$key]=$item;
                        }
                    }
                }
            }
        }

        $buildings=$query->simplePaginate(4);
        return view('front.search-result',compact('buildings','array'));

    }


    public function getAjaxInfo(Request $request ,Building $building){
        return $building->find($request->id)->toJson();
    }


    public function contact(){
        return view('front.contact');

    }


}


