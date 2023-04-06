<?php

namespace Database\Seeders;

use App\Models\ReportType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReportTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ReportType::create(['title' => 'daily']);
        ReportType::create(['title' => 'weekly']);
        ReportType::create(['title' => 'monthly']);
        ReportType::create(['title' => 'project']);
    }
}
