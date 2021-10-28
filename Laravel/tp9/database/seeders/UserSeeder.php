<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        DB::table('users')->delete(); // au lieu de truncate
        User::create([
            'name' => 'Chuck NORRIS',
            'email' => 'chuck.norris@toto.fr',
            'email_verified_at' => now(),
            'password' => bcrypt('totototo'),
            'remember_token' => '',
        ]);
        User::factory()->count(10)->create();
    }
}
