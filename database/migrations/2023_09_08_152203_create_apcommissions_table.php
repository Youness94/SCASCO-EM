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
        Schema::create('apcommissions', function (Blueprint $table) {
            $table->id();
            $table->string('ap_commission_name');
            $table->string('ap_commission_desc');
            $table->foreignId('user_id')->constrained('users'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apcommissions');
    }
};
