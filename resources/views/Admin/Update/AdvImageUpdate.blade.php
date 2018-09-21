@extends('Admin.Base')
@section('content')
<div class="panel">
  <!-- Panel heading -->
  <div class="panel-heading">
    <div class="panel-control">
     
    </div><b style="margin-left:800px;color: green;font-size: 18px;">{{Session::get('info')}}</b>
    <h3 class="panel-title">添加栏目</h3> </div>

  <!-- Panel body -->
  <form id="demo-bv-errorcnt" class="form-horizontal bv-form" action="/Admin/AdvImage/{{$Update->id}}" method="POST" novalidate="novalidate" enctype="multipart/form-data">
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
          <br>
          <br>
          <div class="form-group has-feedback">
            <label class="col-lg-3 control-label">首页Banner广告图上-展示</label>
            <div class="col-lg-7">
              <img src="{{$Update->ind_s}}" width="120" height="80" alt="">
            </div>
          </div>
          <div class="form-group has-feedback">
            <label class="col-lg-3 control-label">选择图片</label>
            <div class="col-lg-7">
              <input type="file" class="form-control" value="" name="ind_s" placeholder="Name" data-bv-field="name">
              <i class="form-control-feedback" data-bv-icon-for="name" style="display: none;"></i>
            </div>
          </div>
          <div class="form-group has-feedback">
            <label class="col-lg-3 control-label">首页Banner广告图下-展示</label>
            <div class="col-lg-7">
              <img src="{{$Update->ind_x}}" width="120" height="120" alt="">
            </div>
          </div>
          <div class="form-group has-feedback">
            <label class="col-lg-3 control-label">选择图片</label>
            <div class="col-lg-7">
              <input type="file" class="form-control" value="" name="ind_x" placeholder="Name" data-bv-field="name">
              <i class="form-control-feedback" data-bv-icon-for="name" style="display: none;"></i>
            </div>
          </div>
          <div class="form-group has-feedback">
            <label class="col-lg-3 control-label">首页Banner广告图中部-展示</label>
            <div class="col-lg-7">
              <img src="{{$Update->ind_z}}" width="400" height="120" alt="">
            </div>
          </div>
          <div class="form-group has-feedback">
            <label class="col-lg-3 control-label">选择图片</label>
            <div class="col-lg-7">
              <input type="file" class="form-control" value="" name="ind_z" placeholder="Name" data-bv-field="name">
              <i class="form-control-feedback" data-bv-icon-for="name" style="display: none;"></i>
            </div>
          </div>
          <div class="form-group has-feedback">
            <label class="col-lg-3 control-label">列表页顶部横幅广告位-展示</label>
            <div class="col-lg-7">
              <img src="{{$Update->list_h}}" width="400" height="120" alt="">
            </div>
          </div>
          <div class="form-group has-feedback">
            <label class="col-lg-3 control-label">选择图片</label>
            <div class="col-lg-7">
              <input type="file" class="form-control" value="" name="list_h" placeholder="Name" data-bv-field="name">
              <i class="form-control-feedback" data-bv-icon-for="name" style="display: none;"></i>
            </div>
          </div>
          <div class="form-group has-feedback">
            <label class="col-lg-3 control-label">列表页Banner上-展示</label>
            <div class="col-lg-7">
              <img src="{{$Update->list_s}}" width="120" height="120" alt="">
            </div>
          </div>
          <div class="form-group has-feedback">
            <label class="col-lg-3 control-label">选择图片</label>
            <div class="col-lg-7">
              <input type="file" class="form-control" value="" name="list_s" placeholder="Name" data-bv-field="name">
              <i class="form-control-feedback" data-bv-icon-for="name" style="display: none;"></i>
            </div>
          </div>
          <div class="form-group has-feedback">
            <label class="col-lg-3 control-label">列表页Banner下-展示</label>
            <div class="col-lg-7">
              <img src="{{$Update->list_x}}" width="120" height="120" alt="">
            </div>
          </div>
          <div class="form-group has-feedback">
            <label class="col-lg-3 control-label">选择图片</label>
            <div class="col-lg-7">
              <input type="file" class="form-control" value="" name="list_x" placeholder="Name" data-bv-field="name">
              <i class="form-control-feedback" data-bv-icon-for="name" style="display: none;"></i>
            </div>
          </div>
          <div class="form-group has-feedback">
            <label class="col-lg-3 control-label">详情页Banner广告位左-展示</label>
            <div class="col-lg-7">
              <img src="{{$Update->info_bz}}" width="120" height="120" alt="">
            </div>
          </div>
          <div class="form-group has-feedback">
            <label class="col-lg-3 control-label">选择图片</label>
            <div class="col-lg-7">
              <input type="file" class="form-control" value="" name="info_bz" placeholder="Name" data-bv-field="name">
              <i class="form-control-feedback" data-bv-icon-for="name" style="display: none;"></i>
            </div>
          </div>
          <div class="form-group has-feedback">
            <label class="col-lg-3 control-label">详情页Banner广告位中左-展示</label>
            <div class="col-lg-7">
              <img src="{{$Update->info_bc}}" width="120" height="120" alt="">
            </div>
          </div>
          <div class="form-group has-feedback">
            <label class="col-lg-3 control-label">选择图片</label>
            <div class="col-lg-7">
              <input type="file" class="form-control" value="" name="info_bc" placeholder="Name" data-bv-field="name">
              <i class="form-control-feedback" data-bv-icon-for="name" style="display: none;"></i>
            </div>
          </div>
          <div class="form-group has-feedback">
            <label class="col-lg-3 control-label">详情页Banner广告位中右-展示</label>
            <div class="col-lg-7">
              <img src="{{$Update->info_bcy}}" width="120" height="120" alt="">
            </div>
          </div>
          <div class="form-group has-feedback">
            <label class="col-lg-3 control-label">选择图片</label>
            <div class="col-lg-7">
              <input type="file" class="form-control" value="" name="info_bcy" placeholder="Name" data-bv-field="name">
              <i class="form-control-feedback" data-bv-icon-for="name" style="display: none;"></i>
            </div>
          </div>
          <div class="form-group has-feedback">
            <label class="col-lg-3 control-label">详情页Banner广告位右-展示</label>
            <div class="col-lg-7">
              <img src="{{$Update->info_by}}" width="120" height="120" alt="">
            </div>
          </div>
          <div class="form-group has-feedback">
            <label class="col-lg-3 control-label">选择图片</label>
            <div class="col-lg-7">
              <input type="file" class="form-control" value="" name="info_by" placeholder="Name" data-bv-field="name">
              <i class="form-control-feedback" data-bv-icon-for="name" style="display: none;"></i>
            </div>
          </div>
          <div class="form-group has-feedback">
            <label class="col-lg-3 control-label">详情页Banner广告位中-展示</label>
            <div class="col-lg-7">
              <img src="{{$Update->info_z}}" width="400" height="120" alt="">
            </div>
          </div>
          <div class="form-group has-feedback">
            <label class="col-lg-3 control-label">选择图片</label>
            <div class="col-lg-7">
              <input type="file" class="form-control" value="" name="info_z" placeholder="Name" data-bv-field="name">
              <i class="form-control-feedback" data-bv-icon-for="name" style="display: none;"></i>
            </div>
          </div>
        </div>
       </div>
    </div>
    <div class="panel-footer clearfix">
      <div class="col-lg-7 col-lg-offset-3">
        <button type="submit" class="btn btn-mint" value="点击创建">点击更换</button></div>
    </div>
  </form>
</div>
@endsection