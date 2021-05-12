<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'Admin';
        $user->email = 'admin@admin.it';
        $user->password = Hash::make('password');
        $user->save();
        // -> get() ritorna sempre una collection
        // ->first() ritorna il primo oggetto corrispondente

        $user->roles()->attach(Role::where('key',Role::ROLE_ADMIN)->first());

        User::factory()->count(50)->create();
    }
}
