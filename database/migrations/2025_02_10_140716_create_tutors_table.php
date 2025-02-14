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
        Schema::create('tutors', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('display_name');
            $table->text('about');
            $table->string('trained_student');
            $table->string('facebook_acc')->nullable();
            $table->string('instagram_acc')->nullable();
            $table->string('twitter_acc')->nullable();
            $table->string('linkedin_acc')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tutors');
    }
};
