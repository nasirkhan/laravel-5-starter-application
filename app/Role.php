<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Permission;

class Role extends Model {

    protected $guarded = ['id', '_token'];

    /**
     * A role may be given various permissions.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function permissions() {
        return $this->belongsToMany(Permission::class);
    }

    /**
     * Grant the given permission to a role.
     *
     * @param  Permission $permission
     * @return mixed
     */
    public function givePermissionTo(Permission $permission) {
        return $this->permissions()->save($permission);
    }

    public function setPermissionsAttribute($values) {

        $errors = array_filter($values);

        if (!empty($errors)) {
            foreach ($values as $value) {

                $permission = Permission::findOrFail($value);
                $this->givePermissionTo($permission);

//                print_r($value);                
            }
        }
    }
    
    public function hasPermission($permission) {
        
        $errors = array_filter($permission);

        if (!empty($errors)) {
            foreach ($values as $value) {

                $permission = Permission::findOrFail($value);
                $this->givePermissionTo($permission);
                
                return !!$permission->intersect($this->permissions)->count();
                
            }
        }

        
    }

}
