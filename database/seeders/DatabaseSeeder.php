<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\PermissionsTableSeeder;
use Database\Seeders\RolesTableSeeder;
use Illuminate\Database\Eloquent\Model;
use Database\Seeders\ConnectRelationshipsSeeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        Model::unguard();

        $this->call(PermissionsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(ConnectRelationshipsSeeder::class);
        //$this->call('UsersTableSeeder');

        Model::reguard();

        $role = config('roles.models.role')::where('name', '=', 'admin')->first();
        $user = User::create([
            'name' => 'Test User',
            'email' => 'pratikjayswal2004@gmail.com',
            'password' => Hash::make('542004'),
            'address'     => 'HQ',
            'birth_date'  => '2004-04-05',
            'gender'      => 'male',
            'phone_number' => '1234567890',
        ]);

        $user->attachRole($role);


        if($role->name === 'Admin'){
            Admin::create([
                'user_id' => $user->id
            ]);
        }
    }
}
