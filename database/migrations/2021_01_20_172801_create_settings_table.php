<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration {

	public function up()
	{
		Schema::create('settings', function(Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('tags', 50);
            $table->string('name', 50);
            $table->text('description');
            $table->string('address', 100);
            $table->string('email', 50);
            $table->string('phone',50);
            $table->string('fb_url', 50);
            $table->string('tw_url', 50);
            $table->string('you_url', 50);
            $table->string('image');

        });
	}

	public function down()
	{
		Schema::drop('settings');
	}
}
