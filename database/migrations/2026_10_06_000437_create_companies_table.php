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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('full_name'); // Metin alanı (Ad Soyad / Firma Adı)
            $table->text('description')->nullable(); // Uzun açıklama alanı (boş bırakılabilir)
            $table->timestamps(); // created_at ve updated_at alanları
        }); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
