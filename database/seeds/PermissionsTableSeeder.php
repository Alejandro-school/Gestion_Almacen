<?php

use Caffeinated\Shinobi\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //Usuarios
        Permission::create([

            'name' => 'Navegación Usuarios',
            'slug' => 'Users.index',
            'description' => 'Lista y navega todos los usuarios',

        ]);
        Permission::create([

            'name' => 'Ver detalle usuarios',
            'slug' => 'Users.show',
            'description' => 'Ver en detalle los datos de los usuarios',

        ]);
        Permission::create([

            'name' => 'Edición de usuarios',
            'slug' => 'Users.edit',
            'description' => 'Editar usuarios del sistema',

        ]);
        Permission::create([

            'name' => 'Eliminar Usuarios',
            'slug' => 'Users.destroy',
            'description' => 'Eliminar usuarios del sistema',

        ]);

        //Roles

        Permission::create([

            'name' => 'Navegación roles',
            'slug' => 'Roles.index',
            'description' => 'Lista y navega todos los roles',

        ]);
        Permission::create([

            'name' => 'Ver detalle roles',
            'slug' => 'Roles.show',
            'description' => 'Ver en detalle los datos de los roles',

        ]);
        Permission::create([

            'name' => 'Creación de roles',
            'slug' => 'Roles.create',
            'description' => 'Creacion roles del sistema',

        ]);
        Permission::create([

            'name' => 'Edición de roles',
            'slug' => 'Roles.edit',
            'description' => 'Editar roles del sistema',

        ]);
        Permission::create([

            'name' => 'Eliminar roles',
            'slug' => 'Roles.destroy',
            'description' => 'Eliminar roles del sistema',

        ]);

        //Providers

        Permission::create([

            'name' => 'Navegación Proveedores',
            'slug' => 'Providers.index',
            'description' => 'Lista y navega todos los Proveedores',

        ]);

        Permission::create([

            'name' => 'Ver detalle Proveedores',
            'slug' => 'Providers.show',
            'description' => 'Ver en detalle los datos de los Proveedores',

        ]);

        Permission::create([

            'name' => 'Creación de Proveedores',
            'slug' => 'Providers.create',
            'description' => 'Creación Proveedores del sistema',

        ]);

        Permission::create([

            'name' => 'Edición de Proveedores',
            'slug' => 'Providers.edit',
            'description' => 'Editar Proveedores del sistema',

        ]);

        Permission::create([

            'name' => 'Eliminar Proveedores',
            'slug' => 'Providers.destroy',
            'description' => 'Eliminar Proveedores del sistema',

        ]);

        //Product

        Permission::create([

            'name' => 'Navegación productos',
            'slug' => 'product.index',
            'description' => 'Lista y navega todos los productos',

        ]);

        Permission::create([

            'name' => 'Ver detalle productos',
            'slug' => 'product.show',
            'description' => 'Ver en detalle los datos de los productos',

        ]);

        Permission::create([

            'name' => 'Creación de productos',
            'slug' => 'product.create',
            'description' => 'Creación productos del sistema',

        ]);

        Permission::create([

            'name' => 'Edición de productos',
            'slug' => 'product.modify',
            'description' => 'Editar productos del sistema',

        ]);

        Permission::create([

            'name' => 'Eliminar productos',
            'slug' => 'product.destroy',
            'description' => 'Eliminar productos del sistema',

        ]);
        Permission::create([

            'name' => 'Vincular Proveedores con sus productos',
            'slug' => 'product.linkProviders',
            'description' => 'Vincular Proveedores a los productos',

        ]);

    }
}
