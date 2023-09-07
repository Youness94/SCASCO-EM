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
        Schema::create('comptes', function (Blueprint $table) {
            $table->id();
            $table->string('compte')->unique();
            $table->string('description');
            //  $table->foreignId('')->constrained(''); compagnie
            //  $table->foreignId('')->constrained(''); services
            //  $table->foreignId('')->constrained(''); sous compte
            //  $table->foreignId('')->constrained(''); maison
            $table->timestamps();
        });
    }

    /**
    * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comptes');
    }
};
