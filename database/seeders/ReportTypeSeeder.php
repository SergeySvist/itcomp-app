<?php

namespace Database\Seeders;

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
        DB::table('report_types')->insert([
            'title' => 'daily',
        ]);

        DB::table('report_types')->insert([
            'title' => 'weekly',
        ]);

        DB::table('report_types')->insert([
            'title' => 'monthly',
        ]);

        DB::table('report_types')->insert([
            'title' => 'project',
        ]);
    }
}
