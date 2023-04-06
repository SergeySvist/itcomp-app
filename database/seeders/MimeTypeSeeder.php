<?php

namespace Database\Seeders;

use App\Models\MimeType;
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
        MimeType::create(['title' => 'application/json']);
        MimeType::create(['title' => 'application/pdf']);
        MimeType::create(['title' => 'image/png']);
    }
}
