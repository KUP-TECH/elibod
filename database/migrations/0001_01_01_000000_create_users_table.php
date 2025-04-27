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

        Schema::create('municipalities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('iframe');
            $table->string('img');
        });

        Schema::create('attractions', function (Blueprint $table) {
            $table->id();
            $table->integer('m_id');
            $table->string('name');
            $table->string('iframe');
            $table->string('img_path');
            $table->string('img');
        });
        
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->integer('attr_id');
            $table->string('name');
            $table->string('address');
            $table->string('no');
            $table->date('arrival');
            $table->time('time');
            $table->time('t_checkout');
            $table->integer('kids');
            $table->integer('adults');
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
