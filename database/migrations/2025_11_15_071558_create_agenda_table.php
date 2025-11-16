<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('agenda', function (Blueprint $table) {
            $table->id();
            $table->string('keterangan'); // data agenda
            $table->timestamps(); // otomatis membuat created_at & updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('agenda');
}
};