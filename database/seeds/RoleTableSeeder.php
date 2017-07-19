<?php

use Illuminate\Database\Seeder;
use App\Role;
class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new Role();
        $user->name         = 'user';
        $user->display_name = 'Basic user'; // optional
        $user->description  = 'Basic user with limited view rights'; // optional
        $user->save();

        $owner = new Role();
        $owner->name         = 'owner';
        $owner->display_name = 'Project Owner'; // optional
        $owner->description  = 'User is the owner of a given project'; // optional
        $owner->save();

        $admin = new Role();
        $admin->name         = 'admin';
        $admin->display_name = 'Administrator'; // optional
        $admin->description  = 'User is allowed to manage and edit other users'; // optional
        $admin->save();

        $admin = new Role();
        $admin->name         = 'teacher';
        $admin->display_name = 'Teacher'; // optional
        $admin->description  = 'User is allowed to add and edit posts'; // optional
        $admin->save();
    }
}
