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
            $table->string('code', 30)->unique();
            $table->string('location', 50)->nullable();
            $table->text('summary')->nullable();
            $table->string('avatar');
            $table->json('images')->nullable();;
            $table->tinyInteger('type');
            $table->tinyInteger('classify');
            $table->dateTime('public_date');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->unsignedInteger('voucher_id')->nullable();
            $table->unsignedInteger('point')->default(1000);
            $table->tinyInteger('status')->default(0);
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
