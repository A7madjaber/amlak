<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuildingsTable extends Migration {

	public function up()
	{
		Schema::create('buildings', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name', 100);
			$table->string('price', 20);
			$table->string('roms', 20);
			$table->string('rent');
			$table->string('address');
			$table->string('month')->default((date('M')));
			$table->string('year')->default((date('Y')));
			$table->string('image_one');
			$table->string('image_two')->nullable();
			$table->string('image_three')->nullable();
			$table->string('square', 10);
			$table->unsignedBigInteger('type_id');
			$table->text('description');
			$table->string('tags', 200);
			$table->string('sm_description', 160);
			$table->string('Length', 50);
			$table->string('width', 50);
			$table->tinyInteger('status')->default(1);
			$table->unsignedBigInteger('user_id');
            $table->timestamps();


            $table->foreign('type_id')->references('id')->on('types')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');


        });
	}

	public function down()
	{
		Schema::drop('building');
	}
}



