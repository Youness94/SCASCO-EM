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
        Schema::create('billexchanges', function (Blueprint $table) {
            $table->id();
            
            $table->date('reception_date');
            $table->string('series');
            $table->integer('start_number');
            $table->integer('quantity');
            

            $table->foreignId('user_id')->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('billexchanges');
    }
};
