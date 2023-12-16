<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pengguna', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('password');
            $table->string('nama');
            $table->string('alamat');
            $table->string('no_telepon');
            $table->string('no_sim');
            $table->timestamps();
        });

          DB::table('pengguna')->insert(
            array(
                'username' => 'user',
                'password' => Hash::make('user'),
                'nama' => 'user',
                'alamat' => 'jimbaran',
                'no_telepon' => '085733886677',
                'no_sim' => '29034567',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            )
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengguna');
    }
};
