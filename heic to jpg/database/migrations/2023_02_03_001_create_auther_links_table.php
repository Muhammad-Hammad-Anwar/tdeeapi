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
        Schema::create('auther_links', function (Blueprint $table) {
            $table->id();
            $table->foreignId('auther_id')->references('id')->on('authers')->onDelete('cascade');
            $table->string('type');
            $table->string('link');
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
        Schema::dropIfExists('auther_links');
    }
};
