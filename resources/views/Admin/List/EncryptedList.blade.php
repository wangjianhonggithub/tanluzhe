@extends('Admin.Base')
@section('content')
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">列表</h3>
    </div>

    <div id="demo-custom-toolbar2" class="table-toolbar-left">
        <a href="/Admin/Encrypted/create" id="demo-dt-addrow-btn" class="btn btn-primary"><i class="demo-pli-plus"></i> 添加</a> 
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
                    <th class="min-tablet">密保问题</th>
                    <th class="min-tablet">创建时间</th>
                    <th class="min-tablet">修改时间</th>
                    <th class="min-desktop">操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $val)
                <tr>
                    <td>{{$val->id}}</td>
                    <td>{{$val->encry}}</td>
                    <td>{{$val->created_at}}</td>
                    <td>{{$val->updated_at}}</td>
                    <td>
                        <a href="/Admin/Encrypted/{{$val->id}}/edit" class="btn btn-xs btn-rounded btn-warning">修改</a>
                    	<a href="javascript:;" data-id="{{$val->id}}" class="btn btn-xs Delete btn-rounded btn-danger">删除</a>
                        <!-- <form action="/Admin/Encrypted/{{$val->id}}" method="POST" style="display: inline;" accept-charset="utf-8">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                           <button class="btn btn-xs btn-rounded btn-danger">删除</button>
                        </form> -->
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
                //假设 id 的 class  是 getId
                //然后发送ajax;
                $.ajax({
                    type: 'GET',
                    url: '/Admin/EncryptedDelete',
                    data: {
                      id:id,
                    },
                    dataType: 'json',
                    success: function(res){
                         if (res.code == 1) {
                            layer.msg(res.msg, {icon: 6});
                            setTimeout(function(){//两秒后跳转
                                window.location.href='/Admin/Encrypted';
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