<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adverts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->smallInteger('type');
            $table->smallInteger('active');
            $table->text('description')->nullable();
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('city_id');
            $table->float('price', 8, 2)->nullable();
            $table->integer('quantity')->nullable();
            $table->integer('width')->nullable();
            $table->integer('height')->nullable();
            $table->integer('thickness')->nullable();
            $table->string('brand')->nullable();
            $table->string('code')->nullable();
            $table->string('name')->nullable();
            $table->string('vage')->nullable();
            $table->string('company_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('web_page')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('city_id')->references('id')->on('cities');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('adverts', function (Blueprint $table) {
            $table->dropForeign(['user_id', 'city_id', 'category_id']);
        });
        Schema::dropIfExists('adverts');
    }
}
