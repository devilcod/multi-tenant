<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'product_management_access',
            ],
            [
                'id'    => 18,
                'title' => 'product_category_create',
            ],
            [
                'id'    => 19,
                'title' => 'product_category_edit',
            ],
            [
                'id'    => 20,
                'title' => 'product_category_show',
            ],
            [
                'id'    => 21,
                'title' => 'product_category_delete',
            ],
            [
                'id'    => 22,
                'title' => 'product_category_access',
            ],
            [
                'id'    => 23,
                'title' => 'product_tag_create',
            ],
            [
                'id'    => 24,
                'title' => 'product_tag_edit',
            ],
            [
                'id'    => 25,
                'title' => 'product_tag_show',
            ],
            [
                'id'    => 26,
                'title' => 'product_tag_delete',
            ],
            [
                'id'    => 27,
                'title' => 'product_tag_access',
            ],
            [
                'id'    => 28,
                'title' => 'product_create',
            ],
            [
                'id'    => 29,
                'title' => 'product_edit',
            ],
            [
                'id'    => 30,
                'title' => 'product_show',
            ],
            [
                'id'    => 31,
                'title' => 'product_delete',
            ],
            [
                'id'    => 32,
                'title' => 'product_access',
            ],
            [
                'id'    => 33,
                'title' => 'team_create',
            ],
            [
                'id'    => 34,
                'title' => 'team_edit',
            ],
            [
                'id'    => 35,
                'title' => 'team_show',
            ],
            [
                'id'    => 36,
                'title' => 'team_delete',
            ],
            [
                'id'    => 37,
                'title' => 'team_access',
            ],
            [
                'id'    => 38,
                'title' => 'order_list_access',
            ],
            [
                'id'    => 39,
                'title' => 'order_create',
            ],
            [
                'id'    => 40,
                'title' => 'order_edit',
            ],
            [
                'id'    => 41,
                'title' => 'order_show',
            ],
            [
                'id'    => 42,
                'title' => 'order_delete',
            ],
            [
                'id'    => 43,
                'title' => 'order_access',
            ],
            [
                'id'    => 44,
                'title' => 'table_create',
            ],
            [
                'id'    => 45,
                'title' => 'table_edit',
            ],
            [
                'id'    => 46,
                'title' => 'table_show',
            ],
            [
                'id'    => 47,
                'title' => 'table_delete',
            ],
            [
                'id'    => 48,
                'title' => 'table_access',
            ],
            [
                'id'    => 49,
                'title' => 'kitchen_create',
            ],
            [
                'id'    => 50,
                'title' => 'kitchen_edit',
            ],
            [
                'id'    => 51,
                'title' => 'kitchen_show',
            ],
            [
                'id'    => 52,
                'title' => 'kitchen_delete',
            ],
            [
                'id'    => 53,
                'title' => 'kitchen_access',
            ],
            [
                'id'    => 54,
                'title' => 'event_create',
            ],
            [
                'id'    => 55,
                'title' => 'event_edit',
            ],
            [
                'id'    => 56,
                'title' => 'event_show',
            ],
            [
                'id'    => 57,
                'title' => 'event_delete',
            ],
            [
                'id'    => 58,
                'title' => 'event_access',
            ],
            [
                'id'    => 59,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}