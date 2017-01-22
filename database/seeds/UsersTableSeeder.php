<?php

use Illuminate\Database\Seeder;

/**
 * Class UsersTableSeeder
 */
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\SON\Entities\User::class, 1)->create([
            'email' => 'admin@schoolofnet.com'
        ]);
        factory(\SON\Entities\User::class, 20)->create();
    }
}
