<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listings', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('name');
            $table->text('description');
            $table->json('photos');
            $table->string('video_url');
            $table->string('video_provider');
            $table->string('tag');
            $table->string('adress');
            $table->string('email');
            $table->string('phone');
            $table->string('website');
            $table->json('social');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('status');
            $table->string('listing_type');
            $table->string('listing_thumbnail');
            $table->string('listing_cover');
            $table->string('seo_meta_tags');
            $table->foreignId('city_id');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
            $table->foreignId('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('listings');
    }
}
