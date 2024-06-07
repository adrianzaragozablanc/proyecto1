<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public function run()
    {
        // Verifica si el rol 'admin' ya existe antes de crearlo
        if (Role::where('name', 'admin')->doesntExist()) {
            Role::create(['name' => 'admin']);
        }

        // Verifica si el rol 'trabajador' ya existe antes de crearlo
        if (Role::where('name', 'trabajador')->doesntExist()) {
            Role::create(['name' => 'trabajador']);
        }

        // Verifica si el rol 'cliente' ya existe antes de crearlo
        if (Role::where('name', 'cliente')->doesntExist()) {
            Role::create(['name' => 'cliente']);
        }
    }
}