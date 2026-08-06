<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('news_posts', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('category')->index();
            $table->text('excerpt');
            $table->longText('content');
            $table->string('image_path')->nullable();
            $table->json('gallery')->nullable();
            $table->string('status')->default('draft')->index();
            $table->boolean('is_pinned')->default(false)->index();
            $table->string('seo_title')->nullable();
            $table->text('seo_description')->nullable();
            $table->timestamp('published_at')->nullable()->index();
            $table->timestamps();
        });

        Schema::create('blog_posts', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('category')->index();
            $table->text('excerpt');
            $table->longText('content');
            $table->string('image_path')->nullable();
            $table->string('status')->default('draft')->index();
            $table->boolean('is_pinned')->default(false)->index();
            $table->string('seo_title')->nullable();
            $table->text('seo_description')->nullable();
            $table->timestamp('published_at')->nullable()->index();
            $table->timestamps();
        });

        Schema::create('appeals', function (Blueprint $table): void {
            $table->id();
            $table->string('registered_number')->unique();
            $table->string('name');
            $table->string('phone');
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->string('topic');
            $table->longText('message');
            $table->json('files')->nullable();
            $table->string('status')->default('new')->index();
            $table->json('status_history')->nullable();
            $table->timestamps();
        });

        Schema::create('gallery_images', function (Blueprint $table): void {
            $table->id();
            $table->string('album')->default('Округ')->index();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('image_path');
            $table->unsignedInteger('sort_order')->default(0)->index();
            $table->boolean('is_published')->default(true)->index();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('gallery_images');
        Schema::dropIfExists('appeals');
        Schema::dropIfExists('blog_posts');
        Schema::dropIfExists('news_posts');
    }
};
