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

        Schema::create('products', function (Blueprint $table) {

            $table->id();
            $table->integer('brand_id');
            $table->foreign('brand_id')->references('id')->on('brands');
            $table->string('name',100);
            $table->string('description',100);
            $table->double('price');
            $table->integer('quantity');
            $table->string('table',10);
            $table->integer('table_id');
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
        Schema::dropIfExists('products');
    }
};
