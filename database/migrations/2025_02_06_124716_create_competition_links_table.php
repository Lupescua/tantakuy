<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('competition_links', function (Blueprint $table) {
            $table->id();
            $table->foreignId('competition_id')->constrained()->onDelete('cascade');
            $table->string('url');
            $table->text('description')->nullable();
            $table->string('meta_description')->nullable();
            $table->enum('display_type', ['description', 'meta_description'])->default('description');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('competition_links');
    }
};
