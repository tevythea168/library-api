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
    Schema::create('book_authors', function (Blueprint $table) {
        $table->id();

        $table->foreignId('book_id')
              ->constrained('books')
              ->onDelete('cascade');

        $table->foreignId('author_id')
              ->constrained('authors')
              ->onDelete('cascade');

        $table->date('author_date')->nullable();
        $table->text('remark')->nullable();

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_authors');
    }
};
