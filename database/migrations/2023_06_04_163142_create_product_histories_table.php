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
        Schema::create('product_histories', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id');
            $table->foreign('product_id')->references('id')->on('products');
            $table->integer('admin_id');
            $table->foreign('admin_id')->references('id')->on('company_admins');
            $table->integer('brand_id');
            $table->foreign('brand_id')->references('id')->on('brands');
            $table->string('name',100);
            $table->string('description',100);
            $table->double('price');
            $table->double('weight');
            $table->text('dimensions');
            $table->string('event',20);
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
        Schema::dropIfExists('product_histories');
    }
};
