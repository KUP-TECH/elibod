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

        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->enum('type', ['client', 'admin'])->default('client');
            $table->string('password');
        });

        Schema::create('municipality', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('icon');
            $table->string('img');
            $table->string('bg_img');
            $table->string('map_img');
            $table->string('description');
        });


        Schema::create( 'festival', function (Blueprint $table) {
            $table->id();
            $table->string('fest_name');
            $table->string('description');
            $table->foreignId('municipality_id')->constrained('municipality')->onDelete('cascade');
        });

        Schema::create('attractions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('municipality_id')->constrained('municipality')->onDelete('cascade');
            $table->string('attraction_name');
            $table->string('location');
            $table->string('about');
            $table->string('img');
            $table->string('bg_img');
            $table->string('map_img');
        });


        Schema::create('attraction_img', function (Blueprint $table) {
            $table->id();
            $table->foreignId('attractions_id')->constrained('attractions')->onDelete('cascade');
            $table->string('img');
        });
        
        
        
        
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('sessions');
    }
};
