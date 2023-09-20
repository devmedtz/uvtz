<?php

namespace App\Http\Livewire\Admin\Role;

use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Permision extends Component
{
    public Role $role;

    public $permissions = [];

    public function mount($role_id = null){

        $this->role = Role::findOrFail($role_id);
    }

    public function createPermission(){

        foreach ($this->permissions as $permission) {

            $this->role->givePermissionTo($permission);
        }

        return redirect('/roles/1vs7du/'.$this->role->id);
    }


    public function removePermission() {

        foreach ($this->permissions as $permission) {

            $this->role->revokePermissionTo($permission);
        }

        return redirect('/roles/1vs7du/'.$this->role->id);
    }

    public function render()
    {
        $permissionInRole = $this->role->permissions->pluck('name');
        $permissionNotInRole = Permission::whereNotIn('name', $permissionInRole)->get()->pluck('name');

        return view('livewire.admin.role.permision',[
            'permissionInRole' => $permissionInRole,
            'permissionNotInRole' => $permissionNotInRole,
        ]);
    }
}
