<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('webinars', function (Blueprint $table) {

            $table->id();

            $table->string('title');

            $table->text('description')->nullable();

            $table->date('webinar_date');

            $table->date('completion_date');

            $table->integer('access_duration_days')
                ->default(30);

            $table->boolean('is_active')
                ->default(true);

            $table->timestamps();

            $table->index('webinar_date');
            $table->index('is_active');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('webinars');
    }
};
