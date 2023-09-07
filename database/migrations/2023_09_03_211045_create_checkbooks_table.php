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
        Schema::create('checkbooks', function (Blueprint $table) {
            $table->id();
            $table->date('reception_date');
            $table->string('series');
            $table->integer('start_number');
            $table->integer('quantity');
            $table->enum('status', ['Consomé', 'No Consomé'])->default('No Consomé');
            

            $table->foreignId('user_id')->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('checkbooks');
    }
};
