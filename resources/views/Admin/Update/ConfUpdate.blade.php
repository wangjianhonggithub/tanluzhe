@extends('Admin.Base')
@section('content')
<div class="panel">
  <!-- Panel heading -->
  <div class="panel-heading">
    <div class="panel-control">
     
    </div><b style="margin-left:800px;color: green;font-size: 18px;">{{Session::get('info')}}</b>
    <h3 class="panel-title">添加栏目</h3> </div>

  <!-- Panel body -->
  <form id="demo-bv-errorcnt" class="form-horizontal bv-form" action="/Admin/Conf/{{$Update->id}}" method="POST" novalidate="novalidate" enctype="multipart/form-data">
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
            <label class="col-lg-3 control-label">LOGO展示</label>
            <div class="col-lg-7">
              <img src="{{$Update->logo}}" width="120" height="80" alt="">
            </div>
          </div>
          <div class="form-group has-feedback">
            <label class="col-lg-3 control-label">上传LOGO</label>
            <div class="col-lg-7">
              <input type="file" class="form-control" value="" name="logo" placeholder="Name" data-bv-field="name">
              <i class="form-control-feedback" data-bv-icon-for="name" style="display: none;"></i>
            </div>
          </div>
          <div class="form-group has-feedback">
            <label class="col-lg-3 control-label">二维码展示</label>
            <div class="col-lg-7">
              <img src="{{$Update->qr_code}}" width="120" height="120" alt="">
            </div>
          </div>
          <div class="form-group has-feedback">
            <label class="col-lg-3 control-label">上传二维码</label>
            <div class="col-lg-7">
              <input type="file" class="form-control" value="" name="qr_code" placeholder="Name" data-bv-field="name">
              <i class="form-control-feedback" data-bv-icon-for="name" style="display: none;"></i>
            </div>
          </div>
          <div class="form-group has-feedback">
            <label class="col-lg-3 control-label">logo导语(登录,注册)</label>
            <div class="col-lg-7">
              <input type="text" class="form-control" value="{{$Update->logo_int}}" name="logo_int" placeholder="logo导语(登录,注册)" data-bv-field="name">
              <i class="form-control-feedback" data-bv-icon-for="name" style="display: none;"></i>
            </div>
          </div>
          <div class="form-group has-feedback">
            <label class="col-lg-3 control-label">邮箱</label>
            <div class="col-lg-7">
              <input type="text" class="form-control" value="{{$Update->email}}" name="email" placeholder="邮箱" data-bv-field="name">
              <i class="form-control-feedback" data-bv-icon-for="name" style="display: none;"></i>
            </div>
          </div>
          <div class="form-group has-feedback">
            <label class="col-lg-3 control-label">地址</label>
            <div class="col-lg-7">
              <input type="text" class="form-control" value="{{$Update->address}}" name="address" placeholder="地址" data-bv-field="name">
              <i class="form-control-feedback" data-bv-icon-for="name" style="display: none;"></i>
            </div>
          </div>
          <div class="form-group has-feedback">
            <label class="col-lg-3 control-label">电话</label>
            <div class="col-lg-7">
              <input type="text" class="form-control" value="{{$Update->mobile}}" name="mobile" placeholder="电话" data-bv-field="name">
              <i class="form-control-feedback" data-bv-icon-for="name" style="display: none;"></i>
            </div>
          </div>
          <div class="form-group has-feedback">
            <label class="col-lg-3 control-label">邮编</label>
            <div class="col-lg-7">
              <input type="text" class="form-control" value="{{$Update->zip_code}}" name="zip_code" placeholder="邮编" data-bv-field="name">
              <i class="form-control-feedback" data-bv-icon-for="name" style="display: none;"></i>
            </div>
          </div>
          <div class="form-group has-feedback">
            <label class="col-lg-3 control-label">公司地图展示</label>
            <div class="col-lg-7">
              <img src="{{$Update->c_map}}" width="150" height="150" alt="">
            </div>
          </div>
          <div class="form-group has-feedback">
            <label class="col-lg-3 control-label">上传公司地图</label>
            <div class="col-lg-7">
              <input type="file" class="form-control" name="c_map" value="" placeholder="二维码" data-bv-field="name">
              <i class="form-control-feedback" data-bv-icon-for="name" style="display: none;"></i>
            </div>
          </div>
          <div class="form-group has-feedback">
            <label class="col-lg-3 control-label">公司总机电话</label>
            <div class="col-lg-7">
              <input type="text" class="form-control" name="switchboard" value="{{$Update->switchboard}}" placeholder="公司总机电话" data-bv-field="email">
              <i class="form-control-feedback" data-bv-icon-for="switchboard" style="display: none;"></i>
            </div>
          </div>
          <div class="form-group has-feedback">
            <label class="col-lg-3 control-label">广告服务电话</label>
            <div class="col-lg-7">
              <input type="text" class="form-control" name="adv_mobile" value="{{$Update->adv_mobile}}" placeholder="广告服务电话" data-bv-field="email">
              <i class="form-control-feedback" data-bv-icon-for="email" style="display: none;"></i>
            </div>
          </div>
          <div class="form-group has-feedback">
            <label class="col-lg-3 control-label">备案号</label>
            <div class="col-lg-7">
              <input type="text" class="form-control" name="record" value="{{$Update->record}}" placeholder="备案号" data-bv-field="email">
              <i class="form-control-feedback" data-bv-icon-for="email" style="display: none;"></i>
            </div>
          </div>
          <div class="form-group has-feedback">
            <label class="col-lg-3 control-label">上传须知</label>
            <div class="col-lg-7">
               <script id="up_ins" name="up_ins" type="text/plain"><?php echo htmlspecialchars_decode($Update->up_ins) ?></script>
            </div>
          </div>
          <div class="form-group has-feedback">
            <label class="col-lg-3 control-label">注册会员须知</label>
            <div class="col-lg-7">
               <script id="vip_ins" name="vip_ins" type="text/plain"><?php echo htmlspecialchars_decode($Update->vip_ins) ?></script>
            </div>
          </div>
          <div class="form-group has-feedback">
            <label class="col-lg-3 control-label">上传规则</label>
            <div class="col-lg-7">
               <script id="upload_rules" name="upload_rules" type="text/plain"><?php echo htmlspecialchars_decode($Update->upload_rules) ?></script>
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
<script type="text/javascript" src="/ueditor/ueditor.config.js"></script>
<!-- 编辑器源码文件 -->
<script type="text/javascript" src="/ueditor/ueditor.all.js"></script>
<!-- 实例化编辑器 -->
<script>
    var editor = UE.getEditor('up_ins',{
        initialFrameWidth :900,//设置编辑器宽度
        initialFrameHeight:300,//设置编辑器高度
    });
    var editor = UE.getEditor('vip_ins',{
        initialFrameWidth :900,//设置编辑器宽度
        initialFrameHeight:300,//设置编辑器高度
    });
    var editor = UE.getEditor('upload_rules',{
        initialFrameWidth :900,//设置编辑器宽度
        initialFrameHeight:300,//设置编辑器高度
    });
</script>
@endsection