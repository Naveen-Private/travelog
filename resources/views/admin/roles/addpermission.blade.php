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
                    {!!  Form::open(array('route' => 'addPermission','method'=>'post','class'=>'form-horizontal form-label-left','id'=>'addPermission','role'=>'form','novalidate'=>'novalidate')) !!}
                          {!! csrf_field() !!}
                     <span class="section">Add New Permission</span>

                      <div class="item form-group{{ $errors->has('permission') ? ' has-error' : '' }}">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Permission Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control" id="permission" name="permission" type="text" value="{{ old('permission') }}" />
                             @if ($errors->has('permission'))
                             <strong class="error">{{ $errors->first('permission') }}</strong>
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