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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->string('description')->nullable();
            $table->string('image')->nullable();
            $table->string('status')->default('pending');                       //pending, active, inactive, deleted. admin will do this
            $table->unsignedBigInteger('parent_id')->nullable();                //this is the category_id of the parent category
            $table->unsignedBigInteger('created_by');                           //this is the user_id of the user who created the category
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
        Schema::dropIfExists('categories');
    }
};
