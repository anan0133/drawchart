<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        
        Permission::create(['name' => 'view_user']);
        Permission::create(['name' => 'create_user']);
        Permission::create(['name' => 'edit_user']);
        Permission::create(['name' => 'delete_user']);

        Permission::create(['name' => 'view_faq']);
        Permission::create(['name' => 'edit_faq']);
        Permission::create(['name' => 'delete_faq']);

        Permission::create(['name' => 'view_type']);
        Permission::create(['name' => 'create_type']);
        Permission::create(['name' => 'edit_type']);
        Permission::create(['name' => 'delete_type']);

        Permission::create(['name' => 'view_chart']);
        Permission::create(['name' => 'create_chart']);
        Permission::create(['name' => 'edit_chart']);
        Permission::create(['name' => 'delete_chart']);
        Permission::create(['name' => 'slide_chart']);
        Permission::create(['name' => 'collect_chart']);

        Permission::create(['name' => 'view_setting']);
        Permission::create(['name' => 'edit_setting']);
    }
}
