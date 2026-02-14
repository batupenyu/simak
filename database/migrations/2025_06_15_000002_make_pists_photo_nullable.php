<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class MakePistsPhotoNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // For SQLite, we need to recreate the table to change column constraints
        DB::statement('CREATE TABLE pists_new AS SELECT * FROM pists');
        DB::statement('DROP TABLE pists');
        
        Schema::create('pists', function ($table) {
            $table->id();
            $table->unsignedBigInteger('penilai_id');
            $table->string('path_bukti_pengajuan')->nullable();
            $table->string('no_surat');
            $table->date('tgl_surat');
            $table->date('tgl_surat_dasar');
            $table->string('asal_surat');
            $table->string('no_asal_surat');
            $table->text('description');
            $table->string('maksud');
            $table->string('tujuan');
            $table->string('acara');
            $table->text('ulasan');
            $table->string('photo')->nullable();  // Made nullable
            $table->date('tgl_awal');
            $table->date('tgl_akhir');
            $table->json('cat');
            $table->boolean('selected');
            $table->string('jam_1');
            $table->string('jam_2');
            $table->string('tempat');
            $table->timestamps();
            $table->foreign('penilai_id')->references('id')->on('penilai')->onDelete('cascade');
        });
        
        // Copy data from old table to new table
        DB::statement('INSERT INTO pists (id, penilai_id, path_bukti_pengajuan, no_surat, tgl_surat, tgl_surat_dasar, asal_surat, no_asal_surat, description, maksud, tujuan, acara, ulasan, photo, tgl_awal, tgl_akhir, cat, selected, jam_1, jam_2, tempat, created_at, updated_at) SELECT * FROM pists_new');
        DB::statement('DROP TABLE pists_new');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Recreate with NOT NULL constraint
        DB::statement('CREATE TABLE pists_new AS SELECT * FROM pists');
        DB::statement('DROP TABLE pists');
        
        Schema::create('pists', function ($table) {
            $table->id();
            $table->unsignedBigInteger('penilai_id');
            $table->string('path_bukti_pengajuan')->nullable();
            $table->string('no_surat');
            $table->date('tgl_surat');
            $table->date('tgl_surat_dasar');
            $table->string('asal_surat');
            $table->string('no_asal_surat');
            $table->text('description');
            $table->string('maksud');
            $table->string('tujuan');
            $table->string('acara');
            $table->text('ulasan');
            $table->string('photo');  // NOT NULL again
            $table->date('tgl_awal');
            $table->date('tgl_akhir');
            $table->json('cat');
            $table->boolean('selected');
            $table->string('jam_1');
            $table->string('jam_2');
            $table->string('tempat');
            $table->timestamps();
            $table->foreign('penilai_id')->references('id')->on('penilai')->onDelete('cascade');
        });
        
        DB::statement('INSERT INTO pists (id, penilai_id, path_bukti_pengajuan, no_surat, tgl_surat, tgl_surat_dasar, asal_surat, no_asal_surat, description, maksud, tujuan, acara, ulasan, photo, tgl_awal, tgl_akhir, cat, selected, jam_1, jam_2, tempat, created_at, updated_at) SELECT * FROM pists_new');
        DB::statement('DROP TABLE pists_new');
    }
}
