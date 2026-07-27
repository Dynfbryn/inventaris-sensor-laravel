<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sensors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type')->nullable();
            $table->string('status')->default('active');
            $table->string('location')->nullable();
            $table->unsignedBigInteger('assigned_to')->nullable();
            $table->timestamps();
            
            // Foreign key ke tabel users (jika ada)
            // $table->foreign('assigned_to')->references('id')->on('users')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sensors');
    }
};