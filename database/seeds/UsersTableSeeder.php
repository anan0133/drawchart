<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $password = bcrypt('123456789?as');
        /*$user = factory(App\Models\User::class)->create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => $password ?: $password = bcrypt('secret'),
            'is_root' => 1,
        ]);*/
        $user = factory(App\Models\User::class)->create([
            'name' => 'hoaian',
            'email' => 'hoaian.br@admin.com',
            'password' => $password ?: $password = bcrypt('secret'),
            'is_root' => 1,
        ]);
    }
}
