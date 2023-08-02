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
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('language_id')->references('id')->on('languages')->onDelete('cascade');
            $table->foreignId('parent_id')->nullable();
            $table->foreignId('tool_id')->nullable();
            $table->string('template');
            $table->string('category_type')->nullable();
            $table->text('title');
            $table->text('slug');
            $table->string('image')->nullable();
            $table->text('canonical')->nullable();
            $table->text('metaTitle')->nullable();
            $table->text('metaDescription')->nullable();
            $table->text('og_tags')->nullable();
            $table->text('schemas')->nullable();
            $table->text('description')->nullable();
            $table->longtext('content')->nullable();
            $table->enum('status',['Publish','UnPublish'])->default('UnPublish');
            $table->foreignId('auther_id')->nullable();
            $table->foreignId('published_by')->nullable();
            $table->foreignId('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->date('published_at')->nullable();
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
        Schema::dropIfExists('pages');
    }
};
