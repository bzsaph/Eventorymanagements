<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellesdatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sellesdatas', function (Blueprint $table) {
            $table->id();
            $table->string('depo_id');
            $table->string('Totalnumberofsuck');
            $table->string('added_by')->nullable();
            $table->string('solled_by')->nullable();
            $table->string('Whobuyphone')->nullable();
            $table->string('Numberofsuckbuy')->nullable();
            $table->string('Company')->nullable();
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
        Schema::dropIfExists('sellesdatas');
    }
}
