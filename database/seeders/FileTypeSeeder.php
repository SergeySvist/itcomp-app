<?php

namespace Database\Seeders;

use App\Models\FileType;
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
        FileType::create(
            ['title' => 'technical specification',
            'slug' => 'ts',]);

        FileType::create(
            ['title' => 'avatar image',
                'slug' => 'ava',]);

    }
}
