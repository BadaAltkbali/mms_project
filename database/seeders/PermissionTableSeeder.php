<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Permissions
        $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',

            'emp-all', // For show all Employees (emp/officer)
            'emp-list',
            'emp-create',
            'emp-update',
            'emp-delete',
            'emp-show',

            'empOffice-all', // I don'd use it
            'empOffice-list',
            'empOffice-create',
            'empOffice-update',
            'empOffice-delete',
            'empOffice-show',

            'Personal-emp-all',
            'Personal-empOffice-all', // I don'd use it
            'Personal-emp-list',
            'Personal-empOffice-list',
            'Personal-emp-update',
            'Personal-empOffice-update',
            'Personal-emp-show',
            'Personal-empOffice-show',

            'users-all',
            'users-list',
            'users-create',
            'users-update',
            'users-delete',
            'users-show',

            'filter-all',
            'filter-emp',
            'filter-empOffice',
            'filter-emp_Print',
            'filter-empOffice_Print',

            'Dashboard_widget',

            'mainInfo-all',
            'mainInfo-wahadat',
            'mainInfo-banks',
            'mainInfo-adjectives',
            
            'subList-all',



        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}