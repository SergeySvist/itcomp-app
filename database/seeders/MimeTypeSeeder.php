<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MimeTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mime_types')->insert([
            'title' => 'application/json',
        ]);

        DB::table('mime_types')->insert([
            'title' => 'application/pdf',
        ]);

        DB::table('mime_types')->insert([
            'title' => 'image/png',
        ]);
    }
}
