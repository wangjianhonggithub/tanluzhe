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
            <label class="col-lg-3 control-label">手持身份证</label>
            <div class="col-lg-7">
              <img src="{{$data->id_card}}" alt="" width="600" height="400">
              <i class="form-control-feedback" data-bv-icon-for="name" style="display: none;"></i>
            </div>
          </div>
          <div class="form-group has-feedback">
            <label class="col-lg-3 control-label">公司执照</label>
            <div class="col-lg-7">
              <img src="{{$data->license}}" alt="" width="600" height="400">
              <i class="form-control-feedback" data-bv-icon-for="name" style="display: none;"></i>
            </div>
          </div>
        </div>
       </div>
    </div>
    <div class="panel-footer clearfix">
      <div class="col-lg-7 col-lg-offset-3">
       
    </div>
  </form>
</div>
@endsection