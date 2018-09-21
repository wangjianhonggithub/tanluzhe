@extends('Admin.Base')
@section('content')
<div class="panel">
  <!-- Panel heading -->
  <div class="panel-heading">
    <div class="panel-control">
     
    </div>
    <h3 class="panel-title">添加</h3></div>
  <!-- Panel body -->
  <form id="demo-bv-errorcnt" class="form-horizontal bv-form" action="/Admin/Banner/{{$Banner->id}}" method="POST" enctype="multipart/form-data" novalidate="novalidate">
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
            <label class="col-lg-3 control-label">分类</label>
            <div class="col-lg-7">
              <select name="c_id" class="selectpicker col-lg-6" name="pid" data-live-search="true" data-width="100%" tabindex="-98">
                @foreach ($Pro as $val)
                <option value="{{$val->id}}" <?php if($val->id == $Banner->c_id){echo 'selected';} ?>>{{$val->nav_name}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-group has-feedback">
            <label class="col-lg-3 control-label">标题</label>
            <div class="col-lg-7">
              <input type="text" class="form-control" name="title" value="{{$Banner->title}}" placeholder="标题" data-bv-field="name">
              <i class="form-control-feedback" data-bv-icon-for="name" style="display: none;"></i>
            </div>
          </div>
          <div class="form-group has-feedback">
            <label class="col-lg-3 control-label">描述</label>
            <div class="col-lg-7">
              <input type="text" class="form-control" name="description" value="{{$Banner->description}}" placeholder="描述" data-bv-field="name">
              <i class="form-control-feedback" data-bv-icon-for="name" style="display: none;"></i>
            </div>
          </div>
          <div class="form-group has-feedback">
            <label class="col-lg-3 control-label">图片展示</label>
            <div class="col-lg-7">
              <img src="{{$Banner->banner_img}}" width="400" height="300" alt="">
            </div>
          </div>
          <div class="form-group has-feedback">
            <label class="col-lg-3 control-label">上传轮播图</label>
            <div class="col-lg-7">
              <input type="file" class="form-control" name="banner_img" placeholder="标题" data-bv-field="name">
              <i class="form-control-feedback" data-bv-icon-for="name" style="display: none;"></i>
            </div>
          </div>
          
<!--           <div class="form-group has-feedback">
            <label class="col-lg-3 control-label">内容</label>
            <div class="col-lg-7">
              <script id="neirong" name="content" type="text/plain">
               </script>
            </div>
          </div> -->
        </div>
       </div>
    </div>
    <div class="panel-footer clearfix">
      <div class="col-lg-7 col-lg-offset-3">
        <button type="submit" class="btn btn-mint" value="点击创建">点击创建</button></div>
    </div>
  </form>
</div>
<script type="text/javascript" src="/ueditor/ueditor.config.js"></script>
<!-- 编辑器源码文件 -->
<script type="text/javascript" src="/ueditor/ueditor.all.js"></script>
<!-- 实例化编辑器 -->
<script>
    var editor = UE.getEditor('neirong',{
        initialFrameWidth :950,//设置编辑器宽度
        initialFrameHeight:500,//设置编辑器高度
    });
</script>
@endsection