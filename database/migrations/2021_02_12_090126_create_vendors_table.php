<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            $table->integer('role_id')->default(3);
            $table->string('name');
            $table->string('address');
            $table->string('phone_number');
            $table->text('mobile_number');
            $table->string('fax');
            $table->string('gst_certificate');
            $table->string('company_certificate');
            $table->string('pan');
            $table->string('adhaar');
            $table->string('email');
            $table->string('contact_person');
            $table->string('contact_person_mobile');
            $table->string('contact_person_email');
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
        Schema::dropIfExists('vendors');
    }
}
