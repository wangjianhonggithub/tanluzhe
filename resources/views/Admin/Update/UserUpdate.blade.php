@extends('Admin.Base')
@section('content')
<div class="panel">
  <!-- Panel heading -->
  <div class="panel-heading">
    <div class="panel-control">
     
    </div>
    <h3 class="panel-title">添加栏目</h3></div>
  <!-- Panel body -->
  <form id="demo-bv-errorcnt" class="form-horizontal bv-form" action="/Admin/User/{{$data->id}}" method="POST" novalidate="novalidate">
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
          {{ csrf_field() }}
          {{ method_field('PUT') }} 
          <div class="form-group has-feedback">
            <label class="col-lg-3 control-label">用户昵称</label>
            <div class="col-lg-7">
              <input type="text" class="form-control" name="nickname" disabled value="{{$data->nickname}}" placeholder="分类名称" data-bv-field="name">
              <i class="form-control-feedback" data-bv-icon-for="name" style="display: none;"></i>
            </div>
          </div>
          <div class="form-group has-feedback">
            <label class="col-lg-3 control-label">用户账号</label>
            <div class="col-lg-7">
              <input type="text" class="form-control" name="username" disabled value="{{$data->username}}" placeholder="分类名称" data-bv-field="name">
              <i class="form-control-feedback" data-bv-icon-for="name" style="display: none;"></i>
            </div>
          </div>
          <div class="form-group has-feedback">
            <label class="col-lg-3 control-label">用户手机号</label>
            <div class="col-lg-7">
              <input type="text" class="form-control" name="mobile" disabled value="{{$data->mobile}}" placeholder="分类名称" data-bv-field="name">
              <i class="form-control-feedback" data-bv-icon-for="name" style="display: none;"></i>
            </div>
          </div>
          <div class="form-group has-feedback">
            <label class="col-lg-3 control-label">用户邮箱</label>
            <div class="col-lg-7">
              <input type="text" class="form-control" name="email" disabled value="{{$data->email}}" placeholder="分类名称" data-bv-field="name">
              <i class="form-control-feedback" data-bv-icon-for="name" style="display: none;"></i>
            </div>
          </div>
          <div class="form-group has-feedback">
            <label class="col-lg-3 control-label">密保答案</label>
            <div class="col-lg-7">
              <input type="text" class="form-control" name="answer" disabled value="{{$data->answer}}" placeholder="分类名称" data-bv-field="name">
              <i class="form-control-feedback" data-bv-icon-for="name" style="display: none;"></i>
            </div>
          </div>
          <div class="form-group has-feedback">
            <label class="col-lg-3 control-label">注册时间</label>
            <div class="col-lg-7">
              <input type="text" class="form-control" disabled value="{{$data->created_at}}" placeholder="分类名称" data-bv-field="name">
              <i class="form-control-feedback" data-bv-icon-for="name" style="display: none;"></i>
            </div>
          </div>
          <div class="form-group has-feedback">
            <label class="col-lg-3 control-label">冻结状态</label>
            <div class="col-lg-7">
              <input type="radio" value="1" @if($data->is_freeze == 1) checked @endif name="is_freeze">启用
              <input type="radio" value="0" @if($data->is_freeze == 0) checked @endif name="is_freeze">禁用
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