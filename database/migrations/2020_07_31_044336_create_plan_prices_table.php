<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan_prices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('plan_id');
            $table->tinyInteger('charge_id')->comment('課金プラン(日額:0、月額:1)。いったん仮');
            $table->integer('price');
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
        Schema::dropIfExists('plan_prices');
    }
}
