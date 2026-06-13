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
        Schema::create('posts', function (Blueprint $table) {
            $table->id('post_id');
            $table->string('post_title');
            $table->string('post_slug')->unique();
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')
                    ->references('category_id')
                    ->on('categories');
            $table->string('short_description');
            $table->text('description');
            $table->string('featured_image');
            $table->enum('status', ['draft', 'published'])
              ->default('draft');
            $table->timestamps();
            $table->index('status');
            $table->index('post_title');
            $table->index('post_slug');
            $table->index('category_id');
            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
