<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      $role_user = new Role();
      $role_user->name = 'User';
      $role_user->description = 'User';
      $role_user->save();

      $role_author = new Role();
      $role_author->name = 'Moderator';
      $role_author->description = 'Moderator';
      $role_author->save();

      $role_admin = new Role();
      $role_admin->name = 'Admin';
      $role_admin->description = 'Admin';
      $role_admin->save();
    }
}
