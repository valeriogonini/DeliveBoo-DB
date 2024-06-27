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
        Schema::table('restaurants', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->after('id');
<<<<<<< HEAD
            $table->foreign('user_id')->references('id')->on('users');
=======
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
>>>>>>> e00a2a85a039cf595745c3a26b5594cb6e080788
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('restaurants', function (Blueprint $table) {
            $table->dropForeign('restaurants_user_id_foreign');
            $table->dropColumn('user_id');
        });
    }
};
