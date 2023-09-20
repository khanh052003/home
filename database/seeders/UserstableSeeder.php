<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserstableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                ['name'=>'admin','email'=>'admin@gmail.com','password'=>bcrypt('123456789'),'typeuser'=>'admin'],
                // ['name'=>'phuc','email'=>'phuc@gmail.com','password'=>bcrypt('123456789'),'typeuser'=>'user']
            ]
        );
    }
}
