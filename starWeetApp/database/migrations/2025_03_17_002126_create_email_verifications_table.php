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
        Schema::create('email_verifications', function (Blueprint $table) {
            $table->id();  // Chave primária
            $table->string('email')->index(); // Email a ser verificado
            $table->string('verification_code', 6); // Código numérico de verificação
            $table->timestamp('expires_at'); // Data de expiração do código
            $table->timestamps(); // Campos created_at e updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('email_verifications');
    }
};
