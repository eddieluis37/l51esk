<?php namespace App\Modules\Fabricante\Utils;

use Sroutier\L51ESKModules\Contracts\ModuleMaintenanceInterface;
use App\Models\Menu;
use App\Models\Route;
use App\Models\Permission;
use App\Models\Role;
use DB;

class FabricanteMaintenance implements ModuleMaintenanceInterface {


    static public function initialize()
    {

        DB::transaction(function () {

            //Register module routes.
            $routeMethodName = Route::firstOrCreate([
                'name' => 'fabricante.method-name',
                'method' => 'GET',
                'path' => 'fabricante/methodName',
                'action_name' => 'App\Modules\Fabricante\Http\Controllers\FabricanteController@methodName',
                'enabled' => 1,
            ]);

            // Create permissions required by module
            $permUseFabricanteMethodName = Permission::firstOrCreate([
                'name' => 'use-fabricante-method-name',
                'display_name' => 'Use Fabricante Method Name',
                'description' => 'Allows a user to use the Method Name function from the Fabricante module.',
                'enabled' => true,
            ]);

            // Associate module permissions to the module routes
            $routeMethodName->permission()->associate($permUseFabricanteMethodName);
            $routeMethodName->save();

            // Create a role for the module
            $roleFabricanteMethodName = Role::firstOrCreate([
                "name" => "fabricante-method-name-users",
                "display_name" => "Fabricante Method Name Users",
                "description" => "Users of the Method Name function from the Fabricante module.",
                "enabled" => true
            ]);
            // Assign module permission to new role.
            $roleFabricanteMethodName->perms()->sync([$permUseFabricanteMethodName->id]);

            // Get handle on home menu as the parent.
            $parentMenu = Menu::where('name', 'home')->first();
            // If home menu was not found, the site admin, must have customized the menu system.
            // Best to create our menu under root and let the admin work it out.
            if (!$parentMenu) {
                $parentMenu = Menu::where('name', 'root')->first();
            }

            // Create modules menu container/folder.
            $menuFabricanteContainer = Menu::firstOrCreate([
                'name'          => 'fabricante-container',
                'label'         => 'Fabricante',
                'position'      => 10,
                'icon'          => 'fa fa-folder',
                'separator'     => false,
                'url'           => null,                // No url.
                'enabled'       => true,
                'parent_id'     => $parentMenu->id,     // Parent is home or root.
                'route_id'      => null,                // No route
                'permission_id' => null,                // Get permission from sub-items. If the user has permission to see/use
                                                        // any sub-items, the menu will be rendered, otherwise it will
                                                        // not.
            ]);
            // Create methodName sub-menu one
            $menuFabricanteMethodName = Menu::firstOrCreate([
                'name'          => 'fabricante-method-name',
                'label'         => 'Method Name',
                'position'      => 0,
                'icon'          => 'fa fa-file',
                'separator'     => false,
                'url'           => null,                   // Get URL from route.
                'enabled'       => false,
                'parent_id'     => $menuFabricanteContainer->id,
                'route_id'      => $routeMethodName->id,
                'permission_id' => null,                   // Get permission from route.
            ]);

        }); // End of DB::transaction(....)

    }

    static public function unInitialize()
    {

        DB::transaction(function () {

            // Locate module sub menu entries and delete them.
            $menuFabricanteMethodName = Menu::where('name', 'fabricante-method-name')->first();
            Menu::destroy($menuFabricanteMethodName->id);
            // Locate demo module parent folder and delete it if if does not contain
            // any other sub-menu entries.
            $menuFabricanteContainer = Menu::where('name', 'fabricante-container')->first();
            if ( ($menuFabricanteContainer) && (!$menuFabricanteContainer->children->count()) ) {
                Menu::destroy($menuFabricanteContainer->id);
            }

            // Locate module role, detach from perms and users then delete.
            $roleFabricanteMethodName = Role::where('name', 'fabricante-method-name-users')->first();
            if ($roleFabricanteMethodName) {
                $roleFabricanteMethodName->perms()->detach();
                $roleFabricanteMethodName->users()->detach();
                Role::destroy($roleFabricanteMethodName->id);
            }

            // Locate module routes, dissociate from perms and delete
            $routeMethodName = Route::where('name', 'fabricante.method-name')->first();
            if ($routeMethodName) {
                $routeMethodName->permission()->dissociate();
                Route::destroy($routeMethodName->id);
            }

            // Locate module permission and delete
            $permUseFabricanteMethodName = Permission::where('name', 'use-fabricante-method-name')->first();
            if ($permUseFabricanteMethodName) {
                Permission::destroy($permUseFabricanteMethodName->id);
            }

        }); // End of DB::transaction(....)

    }

    static public function enable()
    {

        DB::transaction(function () {

            // Locate module sub menu entries and enable them.
            $menuFabricanteMethodName = Menu::where('name', 'fabricante-method-name')->first();
            if ($menuFabricanteMethodName) {
                $menuFabricanteMethodName->enabled = true;
                $menuFabricanteMethodName->save();
            }

        }); // End of DB::transaction(....)

    }

    static public function disable()
    {

        DB::transaction(function () {

            // Locate module sub menu entries and disable them.
            $menuFabricanteMethodName = Menu::where('name', 'fabricante-method-name')->first();
            if ($menuFabricanteMethodName) {
                $menuFabricanteMethodName->enabled = false;
                $menuFabricanteMethodName->save();
            }

        }); // End of DB::transaction(....)

    }

}