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
        Schema::create('company_admins', function (Blueprint $table) {
            $table->id();
            $table->integer('company_id');
            $table->foreign('company_id')->references('id')->on('companies');
            $table->string('user_name');
            $table->string('email')->unique();
            $table->text('password');
            $table->string('address',100);
            $table->string('phone',30);
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
        Schema::dropIfExists('company_admins');
    }
};
