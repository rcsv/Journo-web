<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // make fake data with faker factory
        User::factory(10)->create();

        DB::table('users')->insert([
            'name'  => 'samantha',
            'email' => 'rcsvpg@outlook.com',
            'password' => bcrypt('M299Qppi'),
            'role' => 'admin'
        ]);

        DB::table('users')->insert([
            'name'  => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin'),
            'role' => 'admin'
        ]);
        
    }
}
