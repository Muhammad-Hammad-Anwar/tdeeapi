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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('page_id')->references('id')->on('pages')->onDelete('cascade');
            $table->foreignId('parent_id')->nullable('id');
            $table->string('name');
            $table->string('email');
            $table->string('message');
            $table->timestamp('read_at')->nullable();
            $table->string('status')->default('UnPublish');
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
        Schema::dropIfExists('comments');
    }
};
