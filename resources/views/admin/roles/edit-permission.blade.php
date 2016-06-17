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
                    {!!  Form::open(array('route' => 'edit-permission','method'=>'post','class'=>'form-horizontal form-label-left','id'=>'editPermission','role'=>'form','novalidate'=>'novalidate')) !!}
                          {!! csrf_field() !!}
                     <span class="section">Edit Permission</span>
                     <input type="hidden" name="id" value="{{ $permission_details->id }}">

                      <div class="item form-group{{ $errors->has('permission') ? ' has-error' : '' }}">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Permission Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          {!! Form::text('permission', $permission_details->name, array('class' => 'form-control','required'=>'required')) !!}
                                              @if ($errors->has('permission'))
                                             <strong>{{ $errors->first('permission') }}</strong>
                                              @endif
                        </div>
                      </div>
                     
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button type="button" class="btn btn-danger">Cancel</button>
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