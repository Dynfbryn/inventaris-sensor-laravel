<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('log_maintenances', function (Blueprint $table) {
            $table->unsignedBigInteger('sensor_id')->nullable()->after('perangkat_id');
        });
    }

    public function down(): void
    {
        Schema::table('log_maintenances', function (Blueprint $table) {
            $table->dropColumn('sensor_id');
        });
    }
};