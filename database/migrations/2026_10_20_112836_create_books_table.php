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
    Schema::create('books', function (Blueprint $table) {
        $table->id();

        $table->string('book_title');

        $table->foreignId('book_type_id')
              ->constrained('book_types')
              ->onDelete('cascade');

        $table->date('publish_date')->nullable();
        $table->integer('num_of_pages')->nullable();
        $table->integer('num_of_copies')->nullable();
        $table->string('edition')->nullable();
        $table->string('publisher')->nullable();
        $table->string('book_source')->nullable();
        $table->text('remark')->nullable();

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
