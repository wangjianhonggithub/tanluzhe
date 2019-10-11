@extends('Admin.Base')
@section('content')
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">列表</h3>
    </div>

    <div id="demo-custom-toolbar2" class="table-toolbar-left">
        <a href="/Admin/Caty/create" id="demo-dt-addrow-btn" class="btn btn-primary"><i class="demo-pli-plus"></i> 添加</a> 
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
                    <th class="min-tablet">软件分类名称</th>
                    <th class="min-tablet">创建时间</th>
                    <th class="min-tablet">修改时间</th>
                    <th class="min-desktop">操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $val)
                <tr>
                    <td>{{$val->id}}</td>
                    <td>{{$val->caty_name}}</td>
                    <td>{{$val->created_at}}</td>
                    <td>{{$val->updated_at}}</td>
                    <td>
                        <a href="/Admin/Caty/{{$val->id}}/edit" class="btn btn-xs btn-rounded btn-warning">修改</a>
                    	<a href="javasctipt:;" data-id='{{$val->id}}' class="btn Delete btn-xs btn-rounded btn-danger">删除</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $data->links() }}
    </div> 
</div>
<script src="/layui/layui.all.js"></script>
<script>
    $(function(){
        $('.Delete').click(function(){
            var id = $(this).attr('data-id');
            layer.msg('你确定要删除吗？', {
              time: 0 //不自动关闭
              ,btn: ['确认', '取消']
              ,yes: function(index){
                $.ajax({
                    type: 'GET',
                    url: '/Admin/CatyDelete',
                    data: {
                      id:id,
                    },
                    dataType: 'json',
                    success: function(res){
                        if (res.code == 1) {
                           layer.msg(res.msg, {icon: 6});
                           setTimeout(function(){//两秒后跳转  
                               window.location.href='/Admin/Caty';
                           },1500);
                        }else{
                            layer.msg(res.msg, {icon: 5});
                        }
                    },
                });
              }
            });
        });
    });
</script>
@endsection