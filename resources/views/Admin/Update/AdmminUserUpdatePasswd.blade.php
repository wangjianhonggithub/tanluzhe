@extends('Admin.Base')
@section('content')
<div class="panel">
  <!-- Panel heading -->
  <div class="panel-heading">
    <div class="panel-control">
     
    </div>
    <h3 class="panel-title">修改密码</h3>
    
  </div>
  <!-- Panel body -->

  <form id="demo-bv-errorcnt" class="form-horizontal bv-form" action="/Admin/Administrator/DoUpdatePassword" method="POST" novalidate="novalidate">
    <button type="submit" class="bv-hidden-submit" style="display: none; width: 0px; height: 0px;"></button>
          <strong class="col-md-4 col-md-offset-4  alert-success">{{Session::get('info')}}</strong>
    <div class="panel-body">
      <div class="tab-content">
        <!--SHOWING ERRORS IN TOOLTIP-->
        <!--===================================================-->
        <div id="demo-tabs-box-1" class="tab-pane fade in active">
    			@if (count($errors) > 0)
    			    <div class="alert alert-danger">
    			        <ul>
    			            @foreach ($errors->all() as $error)
    			                <li style="list-style: none">{{ $error }}</li>
    			            @endforeach
    			        </ul>
    			    </div>
    			@endif
          {{ csrf_field() }}
          <div class="form-group has-feedback">
            <label class="col-lg-3 control-label"></label>
            <div class="col-lg-7">
             
            </div>
          </div>
          <div class="form-group has-feedback">
            <label class="col-lg-3 control-label">新密码</label>
            <div class="col-lg-7">
              <input type="password" class="form-control" name="password" placeholder="新密码" data-bv-field="email">
              <i class="form-control-feedback" data-bv-icon-for="email" style="display: none;"></i>
            </div>
          </div>
          <div class="form-group has-feedback">
            <label class="col-lg-3 control-label">确认密码</label>
            <div class="col-lg-7">
              <input type="password" class="form-control" name="repassword" placeholder="确认密码" data-bv-field="email">
              <i class="form-control-feedback" data-bv-icon-for="email" style="display: none;"></i>
            </div>
          </div>
        </div>
       </div>
    </div>
    <div class="panel-footer clearfix">
      <div class="col-lg-7 col-lg-offset-3">
        <button type="submit" class="btn btn-mint" value="点击创建">点击修改</button></div>
    </div>
  </form>
</div>
@endsection