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
                    {!!  Form::open(array('route' => 'addRole','method'=>'post','class'=>'form-horizontal form-label-left','id'=>'addRole','role'=>'form','novalidate'=>'novalidate')) !!}
                          {!! csrf_field() !!}
                     <span class="section">Add New Role</span>

                      <div class="item form-group{{ $errors->has('rolename') ? ' has-error' : '' }}">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Role Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class=" form-control" id="rolename" name="rolename" type="text" value="{{ old('rolename') }}" />
                             @if ($errors->has('rolename'))
                             <strong class="error">{{ $errors->first('rolename') }}</strong>
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
                                      <td align="center"><input type="checkbox" name="permissions[]" value="Add Permission"></td>
                                      <td align="center"><input type="checkbox" name="permissions[]" value="View Permissions"></td>
                                      <td align="center"><input type="checkbox" name="permissions[]" value="Edit Permission"></td>
                                      <td align="center"><input type="checkbox" name="permissions[]" value="Delete Permission"></td>
                                      
                                  </tr>
                                  <tr>
                                      <td>2</td>
                                      <td>Roles</td>
                                      <td align="center"><input type="checkbox" name="permissions[]" value="Add Role"></td>
                                      <td align="center"><input type="checkbox" name="permissions[]" value="View Roles"></td>
                                      <td align="center"><input type="checkbox" name="permissions[]" value="Edit Role"></td>
                                      <td align="center"><input type="checkbox" name="permissions[]" value="Delete Role"></td>
                                   </tr>
                                   <tr>
                                      <td>3</td>
                                      <td>Users</td>
                                      <td align="center"><input type="checkbox" name="permissions[]" value="Add User"></td>
                                      <td align="center"><input type="checkbox" name="permissions[]" value="View Users"></td>
                                      <td align="center"><input type="checkbox" name="permissions[]" value="Edit User"></td>
                                      <td align="center"><input type="checkbox" name="permissions[]" value="Delete User"></td>
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