<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Permiso generales de administrador
        $adminPermission=Permission::create(['name'=> 'admin']);

        //Permisos criterios
        $criteriaRPermission=Permission::create(['name'=> 'criteria.r.permission']);

        $criterio1Permission=Permission::create(['name'=> 'criterio_1']);
        $criterio2Permission=Permission::create(['name'=> 'criterio_2']);
        $criterio3Permission=Permission::create(['name'=> 'criterio_3']);
        $criterio4Permission=Permission::create(['name'=> 'criterio_4']);
        $criterio5Permission=Permission::create(['name'=> 'criterio_5']);
        $criterio6Permission=Permission::create(['name'=> 'criterio_6']);

        //Permisos Indicadores
        $indicatorRPermission=Permission::create(['name'=> 'indicator.r.permission']);
        
        $admin=Role::create(['name' => 'Admin']);
        $criteria_r=Role::create(['name'=> 'CriteriaR']);
        $indicator_r=Role::create(['name'=> 'IndicatorR']);   

        $admin->givePermissionTo($adminPermission,$criterio1Permission,$criterio2Permission,$criterio3Permission,$criterio4Permission,$criterio5Permission,$criterio6Permission);
        $criteria_r->givePermissionTo($criteriaRPermission);
        $indicator_r->givePermissionTo($indicatorRPermission);
    }
}
