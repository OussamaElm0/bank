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
        Schema::create('client_don', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Client::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\Don::class)->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_don');
    }
};