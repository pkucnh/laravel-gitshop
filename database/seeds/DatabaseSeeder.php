<?php

use Illuminate\Database\Seeder;
use App\user;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        $data = [
            'email' => 'nphuc3423@mail.com',
            'password'=>bcrypt('111'),
        ];
        DB::table('users')->insert($data);
    }
}
