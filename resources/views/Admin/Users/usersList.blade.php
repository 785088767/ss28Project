@extends("AdminPublic.public")
@section('admin')
<html>
 <head></head>
 <script type="text/javascript" src="/static/jquery-1.8.3.min.js"></script>
 <body>
  <div class="mws-panel grid_8"> 
   <div class="mws-panel-header"> 
    <span><i class="icon-table"></i>会员列表</span> 
   </div> 
   <div class="mws-panel-body no-padding"> 
    <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
      <form action="/adminList" method="get">
     <div class="dataTables_filter" id="DataTables_Table_1_filter">
      <label>搜索: 用户名<input type="text" aria-controls="DataTables_Table_1" name="keywords"  value="{{$request['keywords'] or ''}}"/></label>
      <input type="submit" value="搜索">
     </div>
     </form>
     <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info"> 
      <thead> 
       <tr role="row">
        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 157px;">ID</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 209px;">用户名</th>
         <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 137px;">密码</th>
         <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 137px;">账户状态</th>
         <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 137px;">性别</th>
         <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 137px;">账户等级</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 101px;">操作</th>
       </tr> 
      </thead> 
      <tbody role="alert" aria-live="polite" aria-relevant="all">
      @if($user)
      @foreach($user as $row)
       <tr class="odd"> 
        <td class="  sorting_1">{{$row->id}}</td> 
        <td class=" ">{{$row->loginname}}</td> 
        <td class=" ">不可见</td>
        <td class=" "><button type="" onclick="check({{$row->id}}, this)">{{$row->status}}</button></td>
        <td class=" ">{{$row->sex}}</td>
        <td class=" ">{{$row->level}}</td>
        <td class=" ">
          <!-- <form action="/adminuser/{{$row->id}}" method="post">
            <button class="btn btn-success">普通删除</button>
            {{method_field("DELETE")}}
            {{csrf_field()}}
          </form>
 -->          <a href="javascript:;" class="btn btn-danger del"><i class="icon-trash"></i></a>
          <!-- <a href="/adminuseraddress/{{$row->id}}" class="btn btn-info">会员收货地址</a> -->
          <a href="/usersList/{{$row->id}}/edit" class="btn btn-info"><i class="icon-edit"></i></i></a></td> 
       </tr>
       @endforeach
       @else
       <h1>暂无数据</h1>
       @endif
      </tbody>
     </table>
     <div class="dataTables_paginate paging_full_numbers" id="pages">
     {{$user->appends($request)->render()}}
     </div>
    </div> 
   </div> 
  </div>
 </body>
 <script type="text/javascript">
  // 用户状态修改
  function check(a, obj){
    var num = obj.innerHTML=='启用'?'1':'0';
    $.get('/usersta',{a:a,num:num},function(data){
      if(data==0){
        $(obj).html('启用');
      }else if(data==1){
        $(obj).html('禁用');
      }
    })
  }

  // alert($);
  //获取删除按钮
  $(".del").click(function(){
    //获取id
    id=$(this).parents("tr").find("td:first").html();
    s=$(this).parents("tr");
    ss=confirm("你确定删除吗?");
    if(ss){
            // alert(id);
        $.get("/usersDel",{id:id},function(data){
          // alert(data);
          if(data==1){
            // alert("删除成功");
            //删除数据所在的tr
            s.remove();
          }
        });
    }
  });


 </script>
</html>
@endsection
@section('title','后台用户列表')