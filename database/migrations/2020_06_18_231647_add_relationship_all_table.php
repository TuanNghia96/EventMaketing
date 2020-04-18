<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelationshipAllTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->foreign('voucher_id')->references('id')->on('vouchers');
        });
        Schema::table('admins', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });
        Schema::table('enterprises', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });
        Schema::table('buyers', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });
        Schema::table('tickets', function (Blueprint $table) {
            $table->foreign('buyer_id')->references('id')->on('buyers');
            $table->foreign('event_id')->references('id')->on('events');
        });
        Schema::table('enterprise_events', function (Blueprint $table) {
            $table->foreign('enterprise_id')->references('id')->on('enterprises');
            $table->foreign('event_id')->references('id')->on('events');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dropForeign(['voucher_id']);
        });
        Schema::table('admins', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });
        Schema::table('enterprises', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });
        Schema::table('buyers', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });
        Schema::table('enterprise_staffs', function (Blueprint $table) {
            $table->dropForeign(['enterprise_id']);
        });
        Schema::table('tickets', function (Blueprint $table) {
            $table->dropForeign(['buyer_id']);
            $table->dropForeign(['voucher_id']);
        });
        Schema::table('enterprise_events', function (Blueprint $table) {
            $table->dropForeign(['enterprise_id']);
            $table->dropForeign(['event_id']);
        });
    }
}