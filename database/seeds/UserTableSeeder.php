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
        $role_user = Role::where('name', 'user')->first();
        $role_admin  = Role::where('name', 'admin')->first();

        $employee = new User();
        $employee->name = 'Administrator';
        $employee->email = 'admin@admin.com';
        $employee->password = bcrypt('parola');
        $employee->save();
        $employee->roles()->attach($role_admin);

        $manager = new User();
        $manager->name = 'Basic user';
        $manager->email = 'user@email.com';
        $manager->password = bcrypt('parola');
        $manager->save();
        $manager->roles()->attach($role_user);

        $faker = Faker::create();
        foreach (range(1,10) as $index) {
            $fake_user = new User();
            $fake_user->name = $faker->name;
            $fake_user->email = $faker->email;
            $fake_user->password = bcrypt('parola');
            $fake_user->save();
            $fake_user->roles()->attach($role_user);
        }
    }
}
