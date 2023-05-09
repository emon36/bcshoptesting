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
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            $table->string('nid');
            $table->string('trade_licence')->nullable();
            $table->string('owner_image');
            $table->string('shop_name');
            $table->string('shop_url');
            $table->string('shop_email')->nullable();
            $table->string('shop_phone');
            $table->string('shop_address');
            $table->string('shop_city');
            $table->string('shop_zip');
            $table->string('shop_logo');
            $table->string('shop_banner');
            $table->text('shop_description')->nullable();
            $table->string('shop_facebook')->nullable();
            $table->string('shop_instagram')->nullable();
            $table->string('shop_youtube')->nullable();
            $table->enum('status', ['Pending', 'Approved', 'Rejected'])->default('Pending');
            $table->unsignedBigInteger('owner_id');         //this is the user_id of the user who owns the vendor
            $table->unsignedBigInteger('created_by');       //this is the user_id of the user who created the vendor
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
        Schema::dropIfExists('vendors');
    }
};
