<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('uni_classes', function (Blueprint $table) {
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
        Schema::table('grades', function (Blueprint $table) {
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('uni_class_id')->unsigned()->index();
            $table->foreign('uni_class_id')->references('id')->on('uni_classes')->onDelete('cascade');
        });
        Schema::table('users', function (Blueprint $table) {
            $table->integer('role_id')->unsigned()->index();
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['role_id']);
        });
        Schema::table('grades', function (Blueprint $table) {
            $table->dropColumn(['user_id','uni_class_id']);
        });
        Schema::table('uni_classes', function (Blueprint $table) {
            $table->dropColumn(['user_id']);
        });
    }
}
