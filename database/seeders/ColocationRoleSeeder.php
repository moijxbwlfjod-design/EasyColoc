<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ColocationRole;

class ColocationRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ColocationRole::firstOrCreate(['name' => 'without colocation']);
        ColocationRole::firstOrCreate(['name' => 'owner']);
        ColocationRole::firstOrCreate(['name' => 'member']);
    }
}
