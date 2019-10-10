<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->string('phone')->nullable();
            $table->unsignedInteger('city_id')->nullable();
            $table->string('web_page')->nullable();
            $table->string('company_name')->nullable();
            $table->string('company_code')->nullable();
            $table->string('vat_number')->nullable();
            $table->integer('address')->nullable();
            $table->string('bill_email')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('city_id')->references('id')->on('cities')->onUpdate('cascade')->onDelete('cascade');
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
//        Schema::table('customer_contacts', function (Blueprint $table) {
//            $table->dropForeign(['user_id', 'city_id']);
//        });
        Schema::dropIfExists('customer_contacts');
    }
}
