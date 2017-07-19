<?php

use Illuminate\Database\Seeder;

use App\Role;
use App\User;

use Faker\Factory as Faker;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin  = Role::where('name', 'admin')->first();
        $role_user = Role::where('name', 'user')->first();

        $admin = new User();
        $admin->name = 'Administrator';
        $admin->email = 'admin@admin.com';
        $admin->password = bcrypt('parola');
        $admin->save();
        $admin->attachRole($role_admin);

        $basic_user = new User();
        $basic_user->name = 'Basic user';
        $basic_user->email = 'user@email.com';
        $basic_user->password = bcrypt('parola');
        $basic_user->save();
        $basic_user->attachRole($role_user);

        $faker = Faker::create();
        foreach (range(1,10) as $index) {
            $fake_user = new User();
            $fake_user->name = $faker->name;
            $fake_user->email = $faker->email;
            $fake_user->password = bcrypt('parola');
            $fake_user->save();
            $fake_user->attachRole($role_user);
        }
    }
}
