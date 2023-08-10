<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('image');
            $table->longText('content');
            $table->unsignedBigInteger('location_id');
            $table->unsignedBigInteger('account_id');
            $table->timestamp('published_at');
            $table->timestamps();
        });

        Schema::table('posts', function (Blueprint $table) {
            $table->foreign('location_id')->references('id')->on('locations');
            $table->foreign('account_id')->references('id')->on('accounts');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
