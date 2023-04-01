<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RelationTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('relation_types')->insert([
            'title' => 'work',
        ]);

        DB::table('relation_types')->insert([
            'title' => 'break',
        ]);

        DB::table('relation_types')->insert([
            'title' => 'fired',
        ]);

        DB::table('relation_types')->insert([
            'title' => 'vacation',
        ]);
    }
}
