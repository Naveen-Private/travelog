<?php

namespace App\Http\Controllers\Admin;

//use App\Http\Requests;
use App\User;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesController extends Controller
{
    
    public function addPermission()
    {
        return view('admin.roles.addpermission');
    }
    
    public function postaddPermission(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'permission' => 'required|unique:permissions,name',
            
        ]);

        if ($validator->fails()) {
            return redirect()
			      ->back()
			      ->withErrors($validator);
        }
        else
        {
            $permission = Permission::create(['name' => $request->get('permission')]);
            return \Redirect::route('viewPermissions')->with('success', 'New Permission Added Successfully.');
        }

    }
    
    public function viewPermissions()
    {
        $permission_list =  \DB::table('permissions')
                              ->orderBy('created_at', 'desc')
                              ->get();
        return view('admin.roles.view-permissions')->with(array('permission_list'=>$permission_list));
    }
    
    //show edit permission form
    public function editPermission($id)
    {
        $id = base64_decode($id);
        $permission_details =  \DB::table('permissions')
                             ->where('permissions.id','=' ,$id)
                              ->first();
       return view('admin.roles.edit-permission')->with('permission_details',$permission_details);
    }
    
    //post edit permission form
    public function posteditPermission(Request $request)
    {
        $id = $request->get('id');
        
        $validator = Validator::make($request->all(), [
            'permission' => 'required|unique:permissions,name,'.$id.',id'
            
        ]);

        if ($validator->fails()) {
            return redirect()
			      ->back()
			      ->withInput()
			      ->withErrors($validator);
        }
        else
        {
            //update permission data in DB
            $input_data = array('name'=>$request->permission
                           );
          $update = \DB::table('permissions')
            ->where('id', $id)
            ->update($input_data);
          return \Redirect::route('viewPermissions')->with('success', 'Permission Data Updated Successfully.');
        }
    }
    //delete permission
    public function deletePermission($id)
    {
        $id =  base64_decode($id);
        $delete = \DB::table('permissions')->where('id',$id)->delete();
        return \Redirect::route('viewPermissions')->with('success', 'Permission Deleted Successfully.');
    }
     
    
    public function addRole()
    {
       return view('admin.roles.addrole');
    }
    
    public function postaddRole(Request $request)
    {
        //echo "type is:".gettype($request->get('permissions'));
        //echo $request->get('rolename');
        //echo print_r($request->get('permissions'));
        $messages = [
                     'rolename.required' => 'Please Enter a valid Role Name',
                     'permissions.required' => 'Select Atleast one permission to proceed.',
                    ];
        $validator = Validator::make($request->all(), [
            'rolename' => 'required|unique:roles,name',
            'permissions' => 'required'
            
        ],$messages);

        if ($validator->fails()) 
            {
            return redirect()
			      ->back()
			      ->withErrors($validator);
            }
        else 
           {
             $role = Role::create(['name' => $request->get('rolename')]);
             $permissions = $request->get('permissions');
             foreach($permissions as $value)
             {
                 $role->givePermissionTo($value);
             }
             return \Redirect::route('viewRoles')->with('success', 'New Role Added Successfully.');
           }
       
    }
    public function viewRoles()
    {
        $roles_list =  \DB::table('roles')
                              ->orderBy('name', 'asc')
                              ->get();
        return view('admin.roles.view-roles')->with(array('roles_list'=>$roles_list));
         
    }
    
    public function editRole($id)
    {
        $id =  base64_decode($id);
        
        $role_details = \DB::table('roles')->where('id', $id)->first();
        $permission_details =  \DB::table('role_has_permissions')->where('role_id', $id)->get();
        
        $permissions_current = array();
        foreach($permission_details as $role){
        $permissions_current[] =  $role->permission_id;
        }
        //print_r($permissions_current);
        //print_r($permission_details
        $permission_names = array();
        foreach($permissions_current as $key=>$value)
        {
            $permission = \DB::table('permissions')->where('id', $value)->value('name');
            $permission_names[] = $permission;
            
        }
        //print_r($permission_names);
        
        return view('admin.roles.edit-role')->with(array('permission_names'=>$permission_names,'role_details'=>$role_details));
       
    }
    
    public function posteditRole(Request $request)
    {
        $role_id = $request->get('roleid');
        $messages = [
                     'rolename.required' => 'Please Enter a valid Role Name',
                     'permissions.required' => 'Select Atleast one permission to proceed.',
                    ];
        $validator = Validator::make($request->all(), [
                                                       'rolename' => 'required|unique:roles,name,'.$role_id.',id',
                                                       'permissions' => 'required'
                                                      ],$messages);
        if ($validator->fails()) {
            return redirect()
			      ->back()
			      ->withInput()
			      ->withErrors($validator);
        }
       else 
       {
        $permission_details =  \DB::table('role_has_permissions')->where('role_id', $role_id)->get();
        
        $permissions_current = array();
        foreach($permission_details as $role){
        $permissions_current[] =  $role->permission_id;
        }
       
        $permissions_old_db = array();
        foreach($permissions_current as $key=>$value)
        {
            $permission = \DB::table('permissions')->where('id', $value)->value('name');
            $permissions_old_db[] = $permission;
            
        }
        
        $permissions_new_form = $request->get('permissions');
        $result_deletions = array_diff($permissions_old_db,$permissions_new_form);
        $result_additions = array_diff($permissions_new_form,$permissions_old_db);
        
        if (!empty($result_deletions) || !empty($result_additions))
        {
            \DB::beginTransaction();
            //delete if any
            if (!empty($result_deletions)) 
            {
                $permissions_ids = array();
                foreach($result_deletions as $key=>$value)
                 {
                    $permission_val = \DB::table('permissions')->where('name', $value)->value('id');
                    $permissions_ids[] = $permission_val;
                 }
                 //delete the permissions for role
                foreach($permissions_ids as $key=>$value)
                 {
                    \DB::table('role_has_permissions')->where('permission_id', '=', $value)->where('role_id','=',$role_id)->delete();
                 }
            }
            //add new permission to role
            if (!empty($result_additions)) 
            {
                $permissions_ids2 = array();
                foreach($result_additions as $key=>$value)
                 {
                    $role = Role::find($role_id);
                    $role->givePermissionTo($value);
                 }
                 
            }
            //update role name also
            $role_name = $request->get('rolename');
            \DB::table('roles')->where('id', $role_id)->update(['name' => $role_name]);
            \DB::commit();
        }
       
        if(empty($result_additions) && empty($result_deletions) )
        {
           $role_name = $request->get('rolename');
           \DB::table('roles')->where('id', $role_id)->update(['name' => $role_name]);
        }
        return \Redirect::route('viewRoles')->with('success', 'Role Updated Successfully.');
       }
    }
    
    public function deleteRole($id)
    {
        $id =  base64_decode('id');
        
        //delete from roles table,role_has_permissions table,user_has_roles table
        \DB::beginTransaction();
        \DB::table('roles')->where('id', '=',$id)->delete();
        \DB::table('role_has_permissions')->where('role_id', '=', $id)->delete();
        \DB::table('user_has_roles')->where('role_id', '=', $id)->delete();
        \DB::commit();
        return \Redirect::route('viewRoles')->with('success', 'Role Deleted Successfully.');
    }

}