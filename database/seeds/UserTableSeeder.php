<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      $role_user = Role::where('name', 'User')->first();
      $role_author = Role::where('name', 'Moderator')->first();
      $role_admin = Role::where('name', 'Admin')->first();

      $user = new User();
      $user->name = 'Visitor';
      $user->role = 'User';
      $user->email = 'visitor@example.com';
      $user->password = Hash::make('password');
      $user->save();
      $user->roles()->attach($role_user);

      $admin = new User();
      $admin->name = 'Admin';
      $admin->role = 'Admin';
      $admin->email = 'admin@example.com';
      $admin->password = Hash::make('password');
      $admin->save();
      $admin->roles()->attach($role_admin);

      $author = new User();
      $author->name = 'Moderator';
      $author->role = 'Moderator';
      $author->email = 'moderator@example.com';
      $author->password = Hash::make('password');
      $author->save();
      $author->roles()->attach($role_author);
    }
}
