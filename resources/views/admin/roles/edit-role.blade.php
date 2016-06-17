@extends('admin.layouts.master')
@section('main_content')
<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Role Management</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                 
                  <div class="x_content">
                    {!!  Form::open(array('route' => 'edit-role','method'=>'post','class'=>'form-horizontal form-label-left','id'=>'editRole','role'=>'form','novalidate'=>'novalidate')) !!}
                          {!! csrf_field() !!}
                     <span class="section">Edit Role Details</span>
                     <input type="hidden" name="roleid" value="{{ $role_details->id }}">
                      <div class="item form-group{{ $errors->has('rolename') ? ' has-error' : '' }}">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Role Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          {!! Form::text('rolename', $role_details->name, array('class' => 'form-control','id'=>'rolename','required'=>'required')) !!}
                                              @if ($errors->has('rolename'))
                                             <strong>{{ $errors->first('rolename') }}</strong>
                                              @endif
                        </div>
                      </div>
                     <div class="ln_solid"></div>
                     <!--table for permission settings -->
                     @if ($errors->has('permissions'))
                             <strong class="error">{{ $errors->first('permissions') }}</strong>
                    @endif
                     <table class="table table-bordered table-striped table-condensed">
                                  <thead>
                                  <tr>
                                      <th>#</th>
                                      <th>Permission</th>
                                      <th>Add</th>
                                      <th>View</th>
                                      <th>Update</th>
                                      <th>Delete</th>
                                  </tr>
                                  </thead>
                                  <tbody>
                                  <tr>
                                      <td>1</td>
                                      <td>Permissions</td>
                                      <td align="center">{{Form::checkbox('permissions[]','Add Permission',in_array('Add Permission',$permission_names))}}</td>
                                      <td align="center">{{Form::checkbox('permissions[]','View Permissions',in_array('View Permissions',$permission_names))}}</td>
                                      <td align="center">{{Form::checkbox('permissions[]','Edit Permission',in_array('Edit Permission',$permission_names))}}</td>
                                      <td align="center">{{Form::checkbox('permissions[]','Delete Permission',in_array('Delete Permission',$permission_names))}}</td>
                                  </tr>
                                  <tr>
                                      <td>2</td>
                                      <td>Roles</td>
                                      <td align="center">{{Form::checkbox('permissions[]','Add Role',in_array('Add Role',$permission_names))}}</td>
                                      <td align="center">{{Form::checkbox('permissions[]','View Roles',in_array('View Roles',$permission_names))}}</td>
                                      <td align="center">{{Form::checkbox('permissions[]','Edit Role',in_array('Edit Role',$permission_names))}}</td>
                                      <td align="center">{{Form::checkbox('permissions[]','Delete Role',in_array('Delete Role',$permission_names))}}</td>
                                   </tr>
                                   <tr>
                                      <td>3</td>
                                      <td>Users</td>
                                      <td align="center">{{Form::checkbox('permissions[]','Add User',in_array('Add User',$permission_names))}}</td>
                                      <td align="center">{{Form::checkbox('permissions[]','View Users',in_array('View Users',$permission_names))}}</td>
                                      <td align="center">{{Form::checkbox('permissions[]','Edit User',in_array('Edit User',$permission_names))}}</td>
                                      <td align="center">{{Form::checkbox('permissions[]','Delete User',in_array('Delete User',$permission_names))}}</td>
                                  </tr>
                                  </tbody>
                                       </table>
                     
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button type="cancel" class="btn btn-danger">Cancel</button>
                          <button id="send" type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
@stop