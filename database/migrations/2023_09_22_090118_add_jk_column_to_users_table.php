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
        Schema::table('users', function (Blueprint $table) {
            $table->timestamp('tgl_lahir')->after('nip');
            $table->enum('jk', ['Laki-Laki', 'Perempuan'])->default('Laki-Laki')->after('nip');
            $table->enum('agama', ['Islam', 'Kristen','Khatolik','Hindu','Budha'])->default('Islam')->after('nip');
            $table->longText('alamat')->after('nip');
            $table->string('job_lain')->after('nip');
            $table->string('net_lain')->after('nip');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->dropColumn('tgl_lahir');
            $table->dropColumn('jk');
            $table->dropColumn('agama');
            $table->dropColumn('alamat');
            $table->dropColumn('job_lain');
            $table->dropColumn('net_lain');
        });
    }
};
