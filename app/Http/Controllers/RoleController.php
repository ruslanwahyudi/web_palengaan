<?php

namespace App\Http\Controllers;

use App\Http\Requests\Role_Permission\PermissionRequest;
use App\Http\Requests\Role_Permission\StoreRoleHasPermissionsRequest;
use App\Http\Requests\Role_Permission\StoreRoleRequest;
use App\Http\Requests\Role_Permission\UpdatePermissionRequest;
use App\Http\Requests\Role_Permission\UpdateRoleRequest;
use App\Models\RoleHasPermissions;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public $title = "All Permission";
    public $model = "Permission";
    public $description = "Permission";
    //
    public function allPermission(){
        $page = array(
            "title" => $this->title,
            "description" => $this->description,
            "model" => $this->model,
        );

        // dd($page);
        $data = Permission::latest()->paginate(5);
        return view('admin.permissions.all_permission', compact('data','page'));
    }

    public function addPermission(){
        $data = [
            'model' => new Permission(),
            'method' => 'POST',
            'route' => ['store.permission'],
            'button' => 'Simpan'
        ];

        return view('admin.permissions.form_permission', $data);
    }

    public function storePermission(Request $request, PermissionRequest $permissionRequest){
        $roleRequest = $permissionRequest->validated();
        $permission = Permission::create($roleRequest);

        if($permission){
            return response()->json([
                'message' => 'Data Permisssion Berhasil Disimpan'
            ], 200);
        }
        
    }

    public function editPermission ($id){

        $data = Permission::findOrFail($id);
        $data = [
            'model' => Permission::findOrFail($id),
            'method' => 'POST',
            'route' => ['update.permission', $id],
            'button' => 'Update'
        ];

        return view('admin.permissions.form_permission', $data);

    }

    public function updatePermission(UpdatePermissionRequest $updatePermissionRequest, $id){
        $updatePermissionRequest = $updatePermissionRequest->validated();

        $permission = Permission::findOrFail($id);

        $permission->fill($updatePermissionRequest);
        $permission->save();

        return response()->json([
            'message' => 'Data Permission Berhasil Diupdate'
        ], 200);

    }

    public function deletePermission($id)  {
        $data = Permission::findOrFail($id);
        $data->delete();

        $notification = array(
            'message' => 'Data Permission Berhasil dihapus',
            'alert-type' => 'success'
        );

        return redirect()->route('all.permission')->with($notification);
    }

    // role controller
    public function allRole(){
        $page = array(
            "title" => 'Roles',
            "description" => $this->description,
            "model" => 'Roles',
        );

        // dd($page);
        $data = Role::latest()->paginate(5);
        return view('admin.roles.all_role', compact('data','page'));
    }

    public function addRole(){
        $data = [
            'model' => new Role(),
            'method' => 'POST',
            'route' => ['store.role'],
            'button' => 'Simpan'
        ];

        return view('admin.roles.form_role', $data);
    }

    public function storeRole(Request $request, StoreRoleRequest $roleRequest){
        $roleRequest = $roleRequest->validated();
        $role = Role::create($roleRequest);

        if($role){
            return response()->json([
                'message' => 'Data Role Berhasil Disimpan'
            ], 200);
        }
        
    }

    public function editRole($id){

        $data = Role::findOrFail($id);
        $data = [
            'model' => Role::findById($id),
            'method' => 'POST',
            'route' => ['update.role', $id],
            'button' => 'Update'
        ];

        return view('admin.roles.form_role', $data);

    }

    public function updateRole(UpdateRoleRequest $roleRequest, $id){
        $roleRequest = $roleRequest->validated();

        $role = Role::findOrFail($id);

        $role->fill($roleRequest);
        $role->save();

        return response()->json([
            'message' => 'Data Role Berhasil Diupdate'
        ], 200);

    }

    public function deleteRole($id)  {
        $data = Role::findOrFail($id);
        $data->delete();

        $notification = array(
            'message' => 'Data Role Berhasil dihapus',
            'alert-type' => 'success'
        );

        return redirect()->route('all.role')->with($notification);
    }


    // roles in permission function
    public function addRolePermission(){
        $data = [
            'model' => new RoleHasPermissions(),
            'method' => 'POST',
            'route' => ['store.role.permission'],
            'button' => 'Simpan',
            'roles' => Role::all(),
            'permissions' => Permission::all(),
            'permissionGroups' => User::getPermissionGroup(),
        ];
        // dd($data);
        return view('admin.roles.setup.form_role_has_permission', $data);
    }

    public function storeRolePermission(Request $request, StoreRoleHasPermissionsRequest $storeRoleHasPermissionsRequest){
        $storeRoleHasPermissionsRequest = $storeRoleHasPermissionsRequest->validated();
        $requestPermission = $request->permission;
        // kosongkan permission
        $oldRoleHasPermissions = RoleHasPermissions::where('role_id', $request->role_id);
        // dd($oldRoleHasPermissions);
        $oldRoleHasPermissions->delete();
        // insert permission to roles
        if(is_countable($requestPermission) && count($requestPermission) !== 0){
            foreach ($requestPermission as $key => $value) {
                # code...
                RoleHasPermissions::create([
                    'permission_id' => $value,
                    'role_id' => $request->role_id,
                ]);
            }
        }else{
            return response()->json([
                'message' => 'Permission Tidak Boleh Kosong'
            ], 200);
        }
        

        return response()->json([
            'message' => 'Permission Berhasil Ditambahkan'
        ], 200);
    }

    public function allRolePermission(){
        $page = array(
            "title" => 'Roles Has Permissions',
            "description" => 'Roles Has Permissions',
            "model" => 'Role Has Permissions',
        );
        $data = Role::latest()->paginate(5);
        return view('admin.roles.setup.all_role_has_permission', compact('data','page'));
    }

    public function editRolePermission($id){
        $data = [
            'model' => Role::findOrFail($id),
            'method' => 'POST',
            'route' => ['update.role.permission', $id],
            'button' => 'Update',
            'roles' => Role::all(),
            'permissions' => Permission::all(),
            'permissionGroups' => User::getPermissionGroup(),
        ];
        
        return view('admin.roles.setup.edit_role_has_permission', $data);

    }

    public function updateRolePermission(Request $request, StoreRoleHasPermissionsRequest $storeRoleHasPermissionsRequest){
        $storeRoleHasPermissionsRequest = $storeRoleHasPermissionsRequest->validated();
        $requestPermission = $request->permission;
        // kosongkan permission
        $oldRoleHasPermissions = RoleHasPermissions::where('role_id', $request->role_id);
        // dd($oldRoleHasPermissions);
        $oldRoleHasPermissions->delete();
        // insert permission to roles
        if(is_countable($requestPermission) && count($requestPermission) !== 0){
            foreach ($requestPermission as $key => $value) {
                # code...
                RoleHasPermissions::create([
                    'permission_id' => $value,
                    'role_id' => $request->role_id,
                ]);
            }
        }else{
            return response()->json([
                'message' => 'Permission Tidak Boleh Kosong'
            ], 200);
        }
        

        return response()->json([
            'message' => 'Permission Berhasil Ditambahkan'
        ], 200);
    }

    public function deleteRolePermission($id){
        $role = Role::findById($id);
        $role->delete();

        $notification = array(
            'message' => 'Data Role Has Permission Berhasil dihapus',
            'alert-type' => 'success'
        );

        return redirect()->route('all.role.permission')->with($notification);

    }
}
