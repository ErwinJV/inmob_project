<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory(25)->create();
        
        User::create([
          
          'name' => 'Erwin Jimenez',
          'email' => 'erwinjv98@gmail.com',
          'password' => bcrypt('@swordseals98')
        
        ]);
    }
}
