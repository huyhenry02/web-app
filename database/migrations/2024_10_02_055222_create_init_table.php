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
        Schema::create('creators', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('social_media_link')->nullable();
            $table->string('address')->nullable();
            $table->integer('follower_count')->default(0);
            $table->string('platform');
            $table->enum('status', ['active', 'banned', 'blacklisted'])->default('active');
            $table->timestamps();
        });

        Schema::create('campaigns', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->date('start_date');
            $table->date('end_date');
            $table->enum('status', ['pending', 'active', 'completed'])->default('pending');
            $table->integer('follower_required')->default(0);
            $table->boolean('blacklist_excluded')->default(false);
            $table->unsignedBigInteger('created_by_id');
            $table->unsignedBigInteger('updated_by_id')->nullable();
            $table->timestamps();
        });

        Schema::create('campaign_registrations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('campaign_id');
            $table->unsignedBigInteger('creator_id');
            $table->enum('status', ['pending', 'approved', 'rejected', 'canceled'])->default('pending');
            $table->timestamps();
        });

        Schema::create('approval_histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('campaign_id');
            $table->unsignedBigInteger('creator_id');
            $table->unsignedBigInteger('admin_id');
            $table->enum('action', ['approved', 'rejected']);
            $table->timestamps();
        });

        Schema::create('blacklists', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('creator_id');
            $table->text('reason');
            $table->timestamps();
        });

        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->string('model_type');
            $table->unsignedBigInteger('model_id');
            $table->string('file_path');
            $table->string('file_name');
            $table->unsignedBigInteger('file_size');
            $table->string('mime_type');
            $table->unsignedBigInteger('uploaded_by_id');
            $table->timestamps();
        });

        Schema::table('creators', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
        Schema::table('campaigns', function (Blueprint $table) {
            $table->foreign('created_by_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('updated_by_id')->references('id')->on('users')->onDelete('set null');
        });
        Schema::table('campaign_registrations', function (Blueprint $table) {
            $table->foreign('campaign_id')->references('id')->on('campaigns')->onDelete('cascade');
            $table->foreign('creator_id')->references('id')->on('creators')->onDelete('cascade');
        });
        Schema::table('approval_histories', function (Blueprint $table) {
            $table->foreign('campaign_id')->references('id')->on('campaigns')->onDelete('cascade');
            $table->foreign('creator_id')->references('id')->on('creators')->onDelete('cascade');
            $table->foreign('admin_id')->references('id')->on('users')->onDelete('cascade');
        });
        Schema::table('blacklists', function (Blueprint $table) {
            $table->foreign('creator_id')->references('id')->on('creators')->onDelete('cascade');
        });
        Schema::table('files', function (Blueprint $table) {
            $table->foreign('uploaded_by_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('creators', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });
        Schema::table('campaigns', function (Blueprint $table) {
            $table->dropForeign(['created_by_id', 'updated_by_id']);
        });
        Schema::table('campaign_registrations', function (Blueprint $table) {
            $table->dropForeign(['campaign_id', 'creator_id']);
        });
        Schema::table('approval_histories', function (Blueprint $table) {
            $table->dropForeign(['campaign_id', 'creator_id', 'admin_id']);
        });
        Schema::table('blacklists', function (Blueprint $table) {
            $table->dropForeign(['creator_id']);
        });
        Schema::table('files', function (Blueprint $table) {
            $table->dropForeign(['uploaded_by_id']);
        });
        Schema::dropIfExists('creators');
        Schema::dropIfExists('campaigns');
        Schema::dropIfExists('campaign_registrations');
        Schema::dropIfExists('approval_histories');
        Schema::dropIfExists('blacklists');
        Schema::dropIfExists('files');
    }
};
