<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\WelcomeItem;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {


  //$this->call([AdminSeeder::class, WelcomeItemSeeder::class, CounterItemSeeder::class, HomeItemSeeder::class, AboutItemSeeder::class, ContactItemSeeder::class, TermPrivacyItemSeeder::class, SettingSeeder::class]);
//   $this->call([CounterItemSeeder::class]);
// $this->call([ContactItemSeeder::class]);
$this->call([TermPrivacyItemSeeder::class]);




    }
}
