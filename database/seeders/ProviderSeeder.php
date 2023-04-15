<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('providers')->insert([
            [
                'name' => "Provider1",
                'endpoint' => "https://www.mocky.io/v2/5d47f24c330000623fa3ebfa",
                'parameters' => "zorluk,sure,id"
            ],
            [
                'name' => "Provider2",
                'endpoint' => "https://www.mocky.io/v2/5d47f235330000623fa3ebf7",
                'parameters' => "level,estimated_duration,{key}"
            ]
        ]);
    }
}
