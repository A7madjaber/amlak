<?php
function settings(){
    return \App\Setting::all()->first();
}


function buildings(){
    return \App\Building::whereStatus(1)->orderBy('created_at','desc')->get();
}

function types(){
    return \App\Type::all();
}


function searchFiled(){
   return[
    'rent'=> 'نوع العرض',
    'roms'=>'الغرف',
    'type_id'=>'نوع العقار',
    'square'=>'المساحة',
    'address'=>'العنوان',
    'min'=>'السعر من',
    'max'=>'السعر الى',
    'price'=>'السعر ',

   ];
}

function type($id){
    return \App\Type::select('name')->where('id',$id)->first();
}


?>
