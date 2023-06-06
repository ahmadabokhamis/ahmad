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
        Schema::create('category_histories', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->integer('admin_id');
            $table->foreign('admin_id')->references('id')->on('admins');
            $table->string('name',50);
            $table->string('description',150);
            $table->integer('parent_id');
            $table->foreign('parent_id')->references('id')->on('categories');
            $table->boolean('last_layar');
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
        Schema::dropIfExists('category_histories');
    }
};
