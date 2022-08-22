<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblPaypal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_paypal', function (Blueprint $table) {
            $table->bigIncrements('order_id');
             $table->integer('customer_id');
              $table->integer('payment_id');
              $table->string('card_name');
               $table->integer('card_number');
                $table->integer('exp_month');
                $table->integer('exp_year');
                $table->integer('cvv');
                $table->string('paypal_total');
                 $table->string('paypal_status');
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
        Schema::dropIfExists('tbl_paypal');
    }
}
