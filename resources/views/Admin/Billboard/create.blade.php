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
                            <label class="col-md-3 control-label" for="demo-email-input">默认广告链接</label>
                            <div class="col-md-9">
                                <input type="text"  class="form-control" placeholder="url" name="billboards_default_url">
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
                                    <input id="demo-inline-form-radio-1" class="magic-radio" type="radio" name="billboards_position" checked value="1">
                                    <label for="demo-inline-form-radio-1">首页广告牌一</label>

                                    <input id="demo-inline-form-radio-2" class="magic-radio" type="radio" name="billboards_position" value="2">
                                    <label for="demo-inline-form-radio-2">首页广告牌二</label>

                                    <input id="demo-inline-form-radio-3" class="magic-radio" type="radio" name="billboards_position" value="3">
                                    <label for="demo-inline-form-radio-3">首页广告牌三</label>

                                    <hr/>
                                    <input id="demo-inline-form-radio-11" class="magic-radio" type="radio" name="billboards_position" checked value="11">
                                    <label for="demo-inline-form-radio-11">分类 广告牌一</label>

                                    <input id="demo-inline-form-radio-12" class="magic-radio" type="radio" name="billboards_position" value="12">
                                    <label for="demo-inline-form-radio-12">分类 广告牌二</label>

                                    <hr/>
                                    <input id="demo-inline-form-radio-21" class="magic-radio" type="radio" name="billboards_position" checked value="21">
                                    <label for="demo-inline-form-radio-21">商品详情广告牌一</label>

                                    <input id="demo-inline-form-radio-22" class="magic-radio" type="radio" name="billboards_position" value="22">
                                    <label for="demo-inline-form-radio-22">商品详情广告牌二</label>

                                    <input id="demo-inline-form-radio-23" class="magic-radio" type="radio" name="billboards_position" value="23">
                                    <label for="demo-inline-form-radio-23">商品详情广告牌三</label>

                                    <input id="demo-inline-form-radio-24" class="magic-radio" type="radio" name="billboards_position" value="24">
                                    <label for="demo-inline-form-radio-24">商品详情广告牌四</label>

                                    <input id="demo-inline-form-radio-25" class="magic-radio" type="radio" name="billboards_position" value="25">
                                    <label for="demo-inline-form-radio-25">商品详情广告牌五</label>
{{--

                                    <input id="demo-inline-form-radio-12" class="magic-radio" type="radio" name="billboards_position" value="12">
                                    <label for="demo-inline-form-radio-12">分类 广告牌二</label>

                                    <input id="demo-inline-form-radio-13" class="magic-radio" type="radio" name="billboards_position" value="13">
                                    <label for="demo-inline-form-radio-13">window 广告牌三</label>

                                    <hr/>
                                    <input id="demo-inline-form-radio-21" class="magic-radio" type="radio" name="billboards_position" checked value="21">
                                    <label for="demo-inline-form-radio-21">linux 广告牌一</label>

                                    <input id="demo-inline-form-radio-22" class="magic-radio" type="radio" name="billboards_position" value="22">
                                    <label for="demo-inline-form-radio-22">linux 广告牌二</label>

                                    <input id="demo-inline-form-radio-23" class="magic-radio" type="radio" name="billboards_position" value="23">
                                    <label for="demo-inline-form-radio-23">linux 广告牌三</label>

                                    <hr/>
                                    <input id="demo-inline-form-radio-31" class="magic-radio" type="radio" name="billboards_position" checked value="31">
                                    <label for="demo-inline-form-radio-31">IOS 广告牌一</label>

                                    <input id="demo-inline-form-radio-32" class="magic-radio" type="radio" name="billboards_position" value="32">
                                    <label for="demo-inline-form-radio-32">IOS 广告牌二</label>

                                    <input id="demo-inline-form-radio-33" class="magic-radio" type="radio" name="billboards_position" value="33">
                                    <label for="demo-inline-form-radio-33">IOS 广告牌三</label>

                                    <hr/>
                                    <input id="demo-inline-form-radio-41" class="magic-radio" type="radio" name="billboards_position" checked value="41">
                                    <label for="demo-inline-form-radio-41">Android 广告牌一</label>

                                    <input id="demo-inline-form-radio-42" class="magic-radio" type="radio" name="billboards_position" value="42">
                                    <label for="demo-inline-form-radio-42">Android 广告牌二</label>

                                    <input id="demo-inline-form-radio-43" class="magic-radio" type="radio" name="billboards_position" value="43">
                                    <label for="demo-inline-form-radio-43">Android 广告牌三</label>

                                    <hr/>
                                    <input id="demo-inline-form-radio-51" class="magic-radio" type="radio" name="billboards_position" checked value="51">
                                    <label for="demo-inline-form-radio">插件 广告牌一</label>

                                    <input id="demo-inline-form-radio-52" class="magic-radio" type="radio" name="billboards_position" value="52">
                                    <label for="demo-inline-form-radio-52">插件 广告牌二</label>

                                    <input id="demo-inline-form-radio-53" class="magic-radio" type="radio" name="billboards_position" value="53">
                                    <label for="demo-inline-form-radio-53">插件 广告牌三</label>

                                    <hr/>
                                    <input id="demo-inline-form-radio-61" class="magic-radio" type="radio" name="billboards_position" checked value="61">
                                    <label for="demo-inline-form-radio-61">小程序 广告牌一</label>

                                    <input id="demo-inline-form-radio-62" class="magic-radio" type="radio" name="billboards_position" value="62">
                                    <label for="demo-inline-form-radio-62">小程序 广告牌二</label>

                                    <input id="demo-inline-form-radio-63" class="magic-radio" type="radio" name="billboards_position" value="63">
                                    <label for="demo-inline-form-radio-63">小程序 广告牌三</label>
--}}

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
						
						<div class="form-group">
                            <label class="col-md-3 control-label">开始时间</label>
                            <input type="date" name="startTime" value="">
							<input type="time" name="startDay" value="">
                        </div>
						<div class="form-group">
                            <label class="col-md-3 control-label">结束时间</label>
                            <input type="date" name="endTime" value="">
							<input type="time" name="endDay" value="">
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