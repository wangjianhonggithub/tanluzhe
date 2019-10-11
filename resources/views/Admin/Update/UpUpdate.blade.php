@extends('Admin.Base')
@section('content')
<div class="panel">
  <!-- Panel heading -->
  <div class="panel-heading">
    <div class="panel-control">
     
    </div>
    <h3 class="panel-title">查看</h3></div>
  <!-- Panel body -->
  <form id="demo-bv-errorcnt" class="form-horizontal bv-form" action="/Admin/Up/{{$data->id}}" method="POST" novalidate="novalidate">
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
            <label class="col-lg-3 control-label">软件名称</label>
            <div class="col-lg-7">
              <input type="text" class="form-control"  disabled value="{{$data->softwarename}}" placeholder="分类名称" data-bv-field="name">
              <i class="form-control-feedback" data-bv-icon-for="name" style="display: none;"></i>
            </div>
          </div>
          <div class="form-group has-feedback">
            <label class="col-lg-3 control-label">发布人账号</label>
            <div class="col-lg-7">
              <input type="text" class="form-control" disabled value="{{$data->username}}" placeholder="分类名称" data-bv-field="name">
              <i class="form-control-feedback" data-bv-icon-for="name" style="display: none;"></i>
            </div>
          </div>
          <div class="form-group has-feedback">
            <label class="col-lg-3 control-label">发布人昵称</label>
            <div class="col-lg-7">
              <input type="text" class="form-control"  disabled value="{{$data->nickname}}" placeholder="分类名称" data-bv-field="name">
              <i class="form-control-feedback" data-bv-icon-for="name" style="display: none;"></i>
            </div>
          </div>
          <div class="form-group has-feedback">
            <label class="col-lg-3 control-label">软件封面图片</label>
            <div class="col-lg-7">
              <img src="{{$data->cover}}" alt="" width="120" height="120">
              <i class="form-control-feedback" data-bv-icon-for="name" style="display: none;"></i>
            </div>
          </div>
          <div class="form-group has-feedback">
            <label class="col-lg-3 control-label">适用平台</label>
            <div class="col-lg-7">
              <input type="text" class="form-control"  disabled value="{{$data->platform}}" placeholder="分类名称" data-bv-field="name">
              <i class="form-control-feedback" data-bv-icon-for="name" style="display: none;"></i>
            </div>
          </div>
          <div class="form-group has-feedback">
            <label class="col-lg-3 control-label">分类</label>
            <div class="col-lg-7">
              <input type="text" class="form-control" disabled value="{{$data->caty_name}}" placeholder="分类名称" data-bv-field="name">
              <i class="form-control-feedback" data-bv-icon-for="name" style="display: none;"></i>
            </div>
          </div>
          <div class="form-group has-feedback">
            <label class="col-lg-3 control-label">软件大小</label>
            <div class="col-lg-7">
              <input type="text" class="form-control" disabled value="{{$data->software_size}}" placeholder="分类名称" data-bv-field="name">
              <i class="form-control-feedback" data-bv-icon-for="name" style="display: none;"></i>
            </div>
          </div>
          <div class="form-group has-feedback">
            <label class="col-lg-3 control-label">软件描述</label>
            <div class="col-lg-7">
              <textarea disabled style="width:950px;height:300px">{{$data->description}}</textarea>
              <i class="form-control-feedback" data-bv-icon-for="name" style="display: none;"></i>
            </div>
          </div>
          <div class="form-group has-feedback">
            <label class="col-lg-3 control-label">是否收费</label>
            <div class="col-lg-7">
              <input type="text" class="form-control" disabled value="@if($data->charge == 1)免费@else收费@endif" placeholder="分类名称" data-bv-field="name">
              <i class="form-control-feedback" data-bv-icon-for="name" style="display: none;"></i>
            </div>
          </div>
          <div class="form-group has-feedback">
            <label class="col-lg-3 control-label">创建时间</label>
            <div class="col-lg-7">
              <input type="text" class="form-control" disabled value="{{$data->created_at}}" placeholder="分类名称" data-bv-field="name">
              <i class="form-control-feedback" data-bv-icon-for="name" style="display: none;"></i>
            </div>
          </div>
          <div class="form-group has-feedback">
            <label class="col-lg-3 control-label">审核状态</label>
            <div class="col-lg-7">
              <input type="radio" value="1" @if($data->is_status == 1) checked @endif name="is_status">审核通过
              <input type="radio" value="0" @if($data->is_status == 0) checked @endif name="is_status">审核未通过
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