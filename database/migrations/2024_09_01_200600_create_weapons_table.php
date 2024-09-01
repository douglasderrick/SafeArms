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
        Schema::create('weapons', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type');
            $table->string('caliber');
            $table->string('serial_no')->unique();
            $table->string('img_path')->nullable();
            $table->boolean('is_serviceable')->default(true);
            $table->smallInteger('deleted')->default(0);
            $table->integer('total_stock')->nullable();
            $table->integer('issued_stock')->nullable();
            $table->integer('available_stock')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('weapons');
    }
};
