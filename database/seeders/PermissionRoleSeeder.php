<?php

namespace Database\Seeders;

use App\Models\Permission;

use Illuminate\Database\Seeder;

class PermissionRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $permissions = [
            'view_users' => ['admin', 'organizer'], // Both admin and organizer
            'banned_users' => ['admin'], // Only admin
            'refuse_events' => ['admin'], // Only admin
            'manage_events' => ['organizer'], // Only organizer
            'manage_categories' => ['admin'], // Only admin
            'make_reservations' => ['spectator'], // Only spectator
            'organizer_statistics' => ['organizer'], // Only organizer
            'admin_statistics' => ['admin'], // Only admin
        ];

        foreach ($permissions as $permissionName => $roles) {
            $permission = Permission::create([
                'name' => $permissionName,
            ]);

            $permission->roles->attach($roles);
        }
    }
}
