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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->foreignId("client_id")->constrained();
            $table->date("date");
            $table->time("time");
            $table->string("ticket_no");
            $table->foreignId("airline_id")->constrained();
            $table->string("airline_type");
            $table->string("airline_pnr");
            $table->string("departure");
            $table->string("destination");
            $table->string("description");
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
        Schema::dropIfExists('tickets');
    }
};
