<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash; // Correct import for Hash facade

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = new Admin;
        $admin->name = "zain";
        $admin->email = "zain@gmail.com";
        $admin->photo = "default.png";
        $admin->password = Hash::make('1234');
        $admin->token = "";
        $admin->save();
    }
}
