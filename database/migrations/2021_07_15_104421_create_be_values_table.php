<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('be_values', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('retailer_id')->unsigned();
            $table->bigInteger('order_id')->unsigned();
            $table->date('order_date');
            $table->float('Be_value');
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
        Schema::dropIfExists('be_values');
    }
}
