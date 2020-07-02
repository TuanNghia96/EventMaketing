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
            $table->unsignedInteger('code');
            $table->string('location', 100)->nullable();
            $table->text('summary')->nullable();
            $table->string('avatar');
            $table->json('images')->nullable();;
            $table->unsignedInteger('type_id');
            $table->unsignedInteger('category_id');
            $table->dateTime('public_date');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->unsignedInteger('ticket_number');
            $table->unsignedInteger('coupon_id')->nullable();
            $table->unsignedInteger('point')->default(1000);
            $table->string('note', 255)->nullable();
            $table->tinyInteger('status')->default(0);
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
        Schema::dropIfExists('events');
    }
}
