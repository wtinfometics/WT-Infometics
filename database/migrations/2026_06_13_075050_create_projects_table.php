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
        Schema::create('projects', function (Blueprint $table) {
            $table->id('project_id');
            $table->string('project_name');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')
                    ->references('category_id')
                    ->on('categories');
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->text('description')->nullable();
            $table->string('contact_person');
            $table->enum('designation', [
                'Owner',
                'Media Manager',
                'Marketing Manager',
                'Co Founder'
            ]);
            $table->string('organization');
            $table->string('phone', 20);
            $table->string('email');
            $table->text('address');
            $table->enum('payment_type', [
                'Monthly',
                'One Time'
            ]);
            $table->decimal('amount', 12, 2);
            $table->enum('status', [
                'Initialized',
                'Processing',
                'Completed',
                'Canceled',
                'Restarted',
                'Paused'
            ])->default('Initialized');
            $table->timestamps();
            $table->index('status');
            $table->index('project_name');
            $table->index('start_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
