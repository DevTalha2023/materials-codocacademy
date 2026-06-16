<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('materials', function (Blueprint $table) {

            $table->id();

            $table->foreignId('webinar_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('title');

            $table->string('original_filename');

            $table->string('stored_filename');

            $table->string('file_path');

            $table->unsignedBigInteger('file_size');

            $table->string('mime_type');

            $table->unsignedInteger('version')
                ->default(1);

            $table->boolean('is_active')
                ->default(true);

            $table->timestamps();

            $table->index('webinar_id');
            $table->index('is_active');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('materials');
    }
};
