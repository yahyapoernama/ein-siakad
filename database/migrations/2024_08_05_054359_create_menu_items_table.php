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
        Schema::create('menu_items', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('icon');
            $table->string('route');
            $table->boolean('is_active')->default(true);
            $table->string('permission_name');
            $table->uuid('menu_group_id');
            $table->integer('position');
            $table->timestamps();

            $table->foreign('menu_group_id')->references('id')->on('menu_groups')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('menu_items', function (Blueprint $table) {
            $table->dropForeign(['menu_group_id']);
        });

        Schema::dropIfExists('menu_items');
    }
};
