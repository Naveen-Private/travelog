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
                  <div class="x_title">
                    <h2>View Roles List</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a href="{{ URL::route('addRole') }}"><button class="btn btn-primary btn-sm"><i class="fa fa-plus-square-o"></i> Add New Role</button></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    @if (Session::has('success')) 
                    <div class="alert alert-success fade in">
                    <button data-dismiss="alert" class="close close-sm" type="button">
                     <i class="fa fa-times"></i>
                    </button>
                     {{ Session::get('success') }}
                    </div>
                    @endif
                      <table id="datatable-viewroles" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                        <th>#</th>
                        <th>Role Name</th>
                        <th>Actions</th>
                       </tr>

                      </thead>
                      <tbody>
              <?php 
                  $sno=1;
                  foreach($roles_list as $row)
                  {
                      ?>
                <tr>
                <td>{{ $sno }}</td>
                <td>{{ $row->name }}</td>
                <td>
                    <a href="{{ URL::route('edit-role',array(base64_encode($row->id))) }}"><button class="btn btn-warning btn-sm"><i class="fa fa-pencil-square-o"></i> Edit</button>&nbsp;
                    <a href="{{ URL::route('delete-role', array(base64_encode($row->id))) }}" class="deletepermissionConfirm"><button class="btn btn-danger btn-sm"><i class="fa fa-trash-o "></i> Delete</button></a>
                </td>
                </tr>
                <?php
                $sno++;
                  }
                ?>                                     
                                      
               </tbody>

                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
@stop