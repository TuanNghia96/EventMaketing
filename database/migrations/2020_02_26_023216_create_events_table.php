<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 30);
            $table->string('title', 30);
            $table->string('code', 30);
            $table->string('location', 30)->nullable();
            $table->string('sumary')->nullable();
            $table->string('image')->nullable();
            $table->tinyInteger('type');
            $table->date('public_date');
            $table->date('start_date');
            $table->date('end_date');
            $table->boolean('has_voucher')->default(1);
            $table->unsignedInteger('voucher_id');
            $table->unsignedInteger('point')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
