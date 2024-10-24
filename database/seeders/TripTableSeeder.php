<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Models\Trip;

class TripTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Trip::factory(10)->create();
        //
        DB::table('trips')->insert([
            'title' => 'This is a first Trip for me',
            'description' => 'Hokkaido, Japan'
        ]);

        
    }
}
