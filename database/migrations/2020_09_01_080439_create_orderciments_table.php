<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdercimentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     *  $userid=Auth::user()->id;//uwabyohereje kuri depo bivuye kurangurwa

     * @return void
     */
    public function up()
    {
        Schema::create('orderciments', function (Blueprint $table) {
            $table->id();
            $table->string('sacker');
            $table->string('Depo_id');
            $table->string('pricepersack');
            $table->string('accepted')->nullable();
            $table->string('accepted_by')->nullable();
            $table->string('totalprice');
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
        Schema::dropIfExists('orderciments');
    }
}
