<?php

namespace Database\Seeders;

use App\Models\MenuGroup;
use App\Models\MenuItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $menu = [
            [
                'name' => 'Main',
                'position' => 1,
                'item' => [
                    [
                        'name' => 'Dashboard',
                        'icon' => 'fa fa-home',
                        'route' => 'dashboard',
                        'permission_name' => 'dashboard',
                        'position' => 1,
                    ],
                ],
            ],
            [
                'name' => 'Setting',
                'position' => 2,
                'item' => [
                    [
                        'name' => 'Setting',
                        'icon' => 'fa fa-cog',
                        'route' => 'setting',
                        'permission_name' => 'setting',
                        'position' => 1,
                    ],
                    [
                        'name' => 'Role',
                        'icon' => 'fa fa-cog',
                        'route' => 'role',
                        'permission_name' => 'role',
                        'position' => 2,
                    ],
                    [
                        'name' => 'User',
                        'icon' => 'fa fa-cog',
                        'route' => 'user',
                        'permission_name' => 'user',
                        'position' => 3,
                    ],
                ],
            ],
        ];

        foreach ($menu as $menuGroup) {
            if (!MenuGroup::where('name', $menuGroup['name'])->exists()) {
                $menuGroupId = MenuGroup::create([
                    'name' => $menuGroup['name'],
                    'position' => $menuGroup['position'],
                ])->id;
            } else {
                $menuGroupId = MenuGroup::where('name', $menuGroup['name'])->value('id');
            }

            foreach ($menuGroup['item'] as $menuItem) {
                MenuItem::updateOrCreate(
                    ['name' => $menuItem['name']],
                    [
                        'name' => $menuItem['name'],
                        'icon' => $menuItem['icon'],
                        'route' => $menuItem['route'],
                        'permission_name' => $menuItem['permission_name'],
                        'position' => $menuItem['position'],
                        'menu_group_id' => $menuGroupId,
                    ]
                );
                // if (!MenuItem::where('name', $menuItem['name'])->exists()) {
                //     MenuItem::create([
                //         'name' => $menuItem['name'],
                //         'icon' => $menuItem['icon'],
                //         'route' => $menuItem['route'],
                //         'permission_name' => $menuItem['permission_name'],
                //         'position' => $menuItem['position'],
                //         'menu_group_id' => $menuGroupId,
                //     ]);
                // }
            }
        }
    }
}
