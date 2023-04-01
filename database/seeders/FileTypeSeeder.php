<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FileTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('file_types')->insert([
            'title' => 'technical specification',
            'slug' => 'ts',
        ]);

        DB::table('file_types')->insert([
            'title' => 'avatar',
            'slug' => 'ava',
        ]);
    }
}
