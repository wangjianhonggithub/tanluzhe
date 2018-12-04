@extends('Admin.Base')
@section('content')
    <div id="page-content">

        <div class="row">
            <div class="col-lg-6">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">添加广告</h3>
                    </div>


                    <!-- BASIC FORM ELEMENTS -->
                    <!--===================================================-->
                    <form class="panel-body form-horizontal form-padding" action="/billboard" method="post" enctype="multipart/form-data">

                        <!--Text Input-->
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="demo-text-input">广告标题</label>
                            <div class="col-md-9">
                                <input type="text" id="demo-text-input" name="billboards_title" class="form-control" placeholder="广告牌标题">
                            </div>
                        </div>

                        <!--Email Input-->
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="demo-email-input">广告链接</label>
                            <div class="col-md-9">
                                <input type="text"  class="form-control" placeholder="url" name="billboards_url">
                            </div>
                        </div>

                        <!--Textarea-->
                        <div class="form-group">
                            <label class="col-md-3 control-label">广告图片</label>
                            <div class="col-md-9">
					                        <span class="pull-left btn btn-primary btn-file">
					                        选择图片... <input type="file" name="billboards_default_pic">
					                        </span>
                            </div>
                        </div>

                        <div class="form-group pad-ver">
                            <label class="col-md-3 control-label">广告位置</label>
                            <div class="col-md-9">
                                <div class="radio">

                                    <!-- Inline radio buttons -->
                                    <input id="demo-inline-form-radio" class="magic-radio" type="radio" name="billboards_position" checked value="1">
                                    <label for="demo-inline-form-radio">首页广告牌一</label>

                                    <input id="demo-inline-form-radio-2" class="magic-radio" type="radio" name="billboards_position" value="2">
                                    <label for="demo-inline-form-radio-2">首页广告牌二</label>

                                    <input id="demo-inline-form-radio-3" class="magic-radio" type="radio" name="billboards_position" value="3">
                                    <label for="demo-inline-form-radio-3">首页广告牌三</label>

                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">位置简介</label>
                            <div class="col-md-9">
					                        <span class="pull-left btn btn-primary btn-file">
					                        选择图片... <input type="file" name="billboards_position_desc">
					                        </span>
                            </div>
                        </div>
                        <input type="hidden" name="billboards_creation_date" value="{{date("Y-m-d H-i-s")}}">
                        <input type="submit" class="pull-right" value="提交">
                    </form>
                    <!--===================================================-->
                    <!-- END BASIC FORM ELEMENTS -->


                </div>
            </div>
        </div>


    </div>
@endsection