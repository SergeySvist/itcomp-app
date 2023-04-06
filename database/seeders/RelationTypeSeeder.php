<?php

namespace Database\Seeders;

use App\Models\RelationType;
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
        RelationType::create(['title' => 'work']);
        RelationType::create(['title' => 'break']);
        RelationType::create(['title' => 'fired']);
        RelationType::create(['title' => 'vacation']);
    }
}
