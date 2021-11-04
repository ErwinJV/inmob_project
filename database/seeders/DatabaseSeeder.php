<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\InmobCategory;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Storage::deleteDirectory('public/inmuebles'); 
        Storage::makeDirectory('public/inmuebles'); 
        $this->call(UserSeeder::class);
        InmobCategory::factory(2)->create();
        $this->call(InmuebleSeeder::class);
    }
}
