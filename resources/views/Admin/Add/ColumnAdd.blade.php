@extends('Admin.Base')
@section('content')
<div class="panel">
  <!-- Panel heading -->
  <div class="panel-heading">
    <div class="panel-control">
     
    </div>
    <h3 class="panel-title">添加栏目</h3></div>
  <!-- Panel body -->
  <form id="demo-bv-errorcnt" class="form-horizontal bv-form" action="/Admin/Column" method="POST" novalidate="novalidate">
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
          <div class="form-group has-feedback">
          	{{ csrf_field() }}
            <label class="col-lg-3 control-label">选择栏目</label>
            <div class="col-lg-7">
                 <select class="selectpicker col-lg-6" name="pid" data-live-search="true" data-width="100%" tabindex="-98">
        			    <option value="0" selected>顶级栏目</option>
                  @foreach ($data as $val)
        			    <option value="{{$val->id}}"><?php if ($val->lev != 1) {echo str_repeat("&nbsp",4*$val->lev);}?>{{$val->name}}</option>
                  @endforeach
        			</select>
            </div>
          </div>
          <div class="form-group has-feedback">
            <label class="col-lg-3 control-label">栏目名</label>
            <div class="col-lg-7">
              <input type="text" class="form-control" name="name" placeholder="Name" data-bv-field="name">
              <i class="form-control-feedback" data-bv-icon-for="name" style="display: none;"></i>
            </div>
          </div>
          <div class="form-group has-feedback">
            <label class="col-lg-3 control-label">icon图标</label>
            <div class="col-lg-7">
              <input type="text" class="form-control" name="icon" placeholder="ICON" data-bv-field="name">
              <i class="form-control-feedback" data-bv-icon-for="name" style="display: none;"></i>
            </div>
          </div>
          <div class="form-group has-feedback">
            <label class="col-lg-3 control-label">URL地址</label>
            <div class="col-lg-7">
              <input type="email" class="form-control" name="url" placeholder="Email" data-bv-field="email">
              <i class="form-control-feedback" data-bv-icon-for="email" style="display: none;"></i>
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