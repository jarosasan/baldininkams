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
            $table->smallInteger('type')->index();
            $table->text('description')->nullable();
            $table->text('short_description')->nullable();
            $table->boolean('img')->default(false);
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('city_id');
            $table->integer('price')->nullable();
            $table->string('currency')->default('EUR');
            $table->string('phone');
            $table->string('email')->nullable();
            $table->string('web_page')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('city_id')->references('id')->on('cities')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamp('active_to')->nullable();
            $table->softDeletes();
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
//        Schema::table('adverts', function (Blueprint $table) {
//            $table->dropForeign(['user_id', 'category_id', 'city_id']);
//        });

        Schema::dropIfExists('adverts');
    }
}
