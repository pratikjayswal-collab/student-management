<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ConnectRelationshipsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $permissionModel = config('roles.models.permission');
        $roleModel = config('roles.models.role');
        $permissions = config('roles.models.permission')::all();

        $roleAdmin = $roleModel::where('name', 'Admin')->first();

        if ($roleAdmin) {
            $roleAdmin->permissions()->sync($permissions->pluck('id')->toArray());
        }

        $rolePermissions = [
            'Teacher' => [
                'view.students',
                'create.students',
                'edit.students',
                'view.results',
                'create.results',
                'edit.results',
                'view.parents',
            ],
            'Parent' => [
                'view.students',
                'view.results',
            ],
            'Student' => [
                'view.students',
                'view.results',
            ],

        ];
        
        foreach ($rolePermissions as $roleName => $slugs) {
            # code...
        }
    }
}
