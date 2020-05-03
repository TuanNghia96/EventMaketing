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
            $table->text('sumary')->nullable();
            $table->string('image')->nullable();
            $table->tinyInteger('type');
            $table->dateTime('public_date');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->unsignedInteger('voucher_id')->nullable();
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
