@extends('Admin.Base')
@section('content')
<div class="panel">
  <!-- Panel heading -->
  <div class="panel-heading">
    <div class="panel-control">
     
    </div>
    <h3 class="panel-title">添加栏目</h3></div>
  <!-- Panel body -->
  <form id="demo-bv-errorcnt" class="form-horizontal bv-form" action="/Admin/Administrator/{{$data->id}}" method="POST" novalidate="novalidate">
    <button type="submit" class="bv-hidden-submit" style="display: none; width: 0px; height: 0px;"></button>
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
          {{ method_field('PUT') }} 
          {{ csrf_field() }}      	
          <div class="form-group has-feedback">
            <label class="col-lg-3 control-label">用户名</label>
            <div class="col-lg-7">
              <input type="text" class="form-control" name="username" value="{{$data->username}}" placeholder="用户名" data-bv-field="name">
              <i class="form-control-feedback" data-bv-icon-for="name" style="display: none;"></i>
            </div>
          </div>
          <input type="hidden" name="password" value="{{$data->password}}">
          <div class="form-group has-feedback">
            <label class="col-lg-3 control-label">昵称</label>
            <div class="col-lg-7">
              <input type="email" class="form-control" name="nickname" value="{{$data->nickname}}" placeholder="昵称" data-bv-field="email">
              <i class="form-control-feedback" data-bv-icon-for="email" style="display: none;"></i>
            </div>
          </div>
          <div class="form-group has-feedback">
            <label class="col-lg-3 control-label">状态</label>
            <div class="col-lg-7">
              <input type="radio" name="status" value="1" @if($data->status==1) checked="checked" @endif>启用
              <input type="radio" name="status" value="0" @if($data->status==0) checked="checked" @endif>禁用
            </div>
          </div>
        </div>
       </div>
    </div>
    <div class="panel-footer clearfix">
      <div class="col-lg-7 col-lg-offset-3">
        <button type="submit" class="btn btn-mint" value="点击创建">点击创建</button></div>
    </div>
  </form>
</div>
@endsection