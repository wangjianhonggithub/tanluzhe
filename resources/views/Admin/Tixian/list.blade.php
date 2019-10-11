@extends('Admin.Base')
@section('content')
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">列表</h3>
    </div>

    <div id="demo-custom-toolbar2" class="table-toolbar-left">
        <!-- <a href="/Admin/Nav/create" id="demo-dt-addrow-btn" class="btn btn-primary"><i class="demo-pli-plus"></i> 添加</a>  -->
        <div class="col-m-5">
        <!--Block Level buttons-->
        <!--===================================================-->
        <!--===================================================-->
    </div>
    </div>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li style="list-style: none">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
   
    <!--Block Level buttons-->
    <!--===================================================-->
    <strong class="col-md-4 col-md-offset-4  alert-success">{{Session::get('info')}}</strong>

        <!--===================================================-->
    <div class="panel-body">
        <table id="demo-dt-addrow" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th class="min-tablet">用户名称</th>
                    <th class="min-tablet">提现金额</th>
                    <th class="min-tablet">提现方式</th>
                    <th class="min-tablet">账户</th>
                    <th class="min-tablet">备注</th>
                    <th class="min-tablet">创建时间</th>
                    <th class="min-tablet">状态</th>
                    <th class="min-desktop">操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $val)
                <tr>
                    <td>{{$val->id}}</td>
                    <td>{{$val->userName}}</td>
                    <td>{{$val->money}}</td>
                    <td>{{$val->tixianType}}</td>
                    <td>{{$val->cardNo}}</td>
                    <td>{{$val->remark}}</td>
                    <td>{{$val->createTime}}</td>
                    <td style="color:red;">{{$val->handleStatus}}</td>
                    @if ($val->status == 1)
                    <td>
                        <form class="form-inline" action="/Tixian/DoHandle" method="get">
                            <div class="form-group">
								<select id="yes_{{$val->id}}">
								@foreach ($information as $v)
									@if($v->type ==1)
										<option>{{$v->liuyan}}</option>
									@endif
								@endforeach
								</select>
								<select id="no_{{$val->id}}">
									@foreach ($information as $v)
									@if($v->type ==2)
										<option>{{$v->liuyan}}</option>
									@endif
								@endforeach
								</select>
                                <label for="demo-inline-inputmail{{$val->id}}" class="sr-only">填写失败信息</label>
                                <input type="text" name="errorinfo" placeholder="填写失败信息" id="demo-inline-inputmail{{$val->id}}" class="form-control">
                            </div>
                            <input name="id" type="hidden" value="{{$val->id}}" />
                            <div class="radio" id="dianji_{{$val->id}}">
                                <input name="status" value="2" type="radio" id="demo-remember-me{{$val->id}}" class="magic-radio" checked />
                                <label for="demo-remember-me{{$val->id}}">通过</label>
                                <input name="status" value="3" type="radio" id="demo-remember-me1{{$val->id}}" class="magic-radio" />
                                <label for="demo-remember-me1{{$val->id}}">不通过</label>
                            </div>
                            <button class="btn btn-primary" type="submit">提交</button>
                        </form>
                    </td>
					<script>
						$(function(){
							$('#no_{{$val->id}}').hide();
							$('#dianji_{{$val->id}}').find('input').click(function(){
								var v = $(this).val();
								var id = '{{$val->id}}'
								if(v == 2){
									$('#no_{{$val->id}}').hide();
									$('#yes_{{$val->id}}').show();
                                    $('#demo-inline-inputmail{{$val->id}}').val($('#yes_{{$val->id}}').val());
								}else{
									$('#no_{{$val->id}}').show();
									$('#yes_{{$val->id}}').hide();
                                    $('#demo-inline-inputmail{{$val->id}}').val($('#no_{{$val->id}}').val());
								}
								//alert(v)
							})

                            $('#yes_{{$val->id}}').change(function(){
                                var options=$("#yes_{{$val->id}} option:selected");
                                $('#demo-inline-inputmail{{$val->id}}').val(options.val());
                            })
                            $('#no_{{$val->id}}').change(function(){
                                var options=$("#no_{{$val->id}} option:selected");
                                $('#demo-inline-inputmail{{$val->id}}').val(options.val());
                            })


						})
					</script>
                    @endif

                    @if ($val->status == 3 )

                        <td>
                            <form class="form-inline" action="/Tixian/DoHandle" method="get">
                                <div class="form-group">
                                    <label for="demo-inline-inputmail{{$val->id}}" class="sr-only">填写失败信息</label>
                                    <input type="text" value="{{$val->errorinfo}}" name="errorinfo" placeholder="填写失败信息" id="demo-inline-inputmail{{$val->id}}" class="form-control">
                                </div>
                                <div class="radio">
                                <input name="status" value="3" type="radio" checked id="demo-remember-me1{{$val->id}}" class="magic-radio" />
                                <label for="demo-remember-me1{{$val->id}}">未通过</label>
                            </div>

                            </form>
                        </td>

                    @endif
<!-- 
                    <td>
                        <a href="/Tixian/DoHandle/{{$val->id}}" class="btn btn-xs btn-rounded btn-warning">处理</a>
                        <form action="/Tixian/DoDelete/{{$val->id}}" method="POST" style="display: inline;" accept-charset="utf-8">
                           <button class="btn btn-xs btn-rounded btn-danger">删除</button>
                        </form>
                    </td> -->
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $data->links() }}
    </div> 
</div>
@endsection