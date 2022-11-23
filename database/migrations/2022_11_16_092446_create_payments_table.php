<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string("month");
            $table->string("salary");
            $table->string("incentive_pay")->nullable();
            $table->foreignId("user_id")->constrained();
            $table->string("tax");
            $table->string("deduction_title");
            $table->string("deduction_amount");
            $table->string("net_pay");
            $table->string("payment_date");
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
        Schema::dropIfExists('payments');
    }
};
