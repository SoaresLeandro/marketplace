<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Store;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('users')->insert([
        //     'name' => 'Leandro da Silva Soares',
        //     'email' => 'email@teste.com',
        //     'email_verified_at' => now(),
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        //     'remember_token' => 'Token',
        // ]);

        factory(User::class, 10)->create()->each( function ($user) {
            $user->store()->save(factory(Store::class)->make());
        });
    }
}
