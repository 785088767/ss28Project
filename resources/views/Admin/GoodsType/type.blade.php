@extends("AdminPublic.public")
@section('admin')
<html>
 <head></head>
 <script type="text/javascript" src="/static/jquery-1.8.3.min.js"></script>
 <body>
  <div class="mws-panel grid_8"> 
   <div class="mws-panel-header"> 
    <span><i class="icon-table"></i>分类展示</span> 
   </div> 
   <div class="mws-panel-body no-padding"> 
    <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
      <form action="/type" method="get">
     <div class="dataTables_filter" id="DataTables_Table_1_filter">
      <label>搜索: 分类名<input type="text" aria-controls="DataTables_Table_1" name="keywords"  value="{{$request['keywords'] or ''}}"/></label>
      <input type="submit" value="搜索">
     </div>
     </form>
     <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info"> 
      <thead> 
       <tr role="row">
        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 157px;">ID</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 209px;">分类名</th>
         <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 137px;">父类</th>
         <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 137px;">状态</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 251px;">操作</th>
       </tr> 
      </thead> 
      <tbody role="alert" aria-live="polite" aria-relevant="all">
      @if($data)
      @foreach($data as $row)
       <tr class="odd"> 
        <td class="  sorting_1">{{$row->id}}</td> 
        <td class=" ">{{$row->name}}</td>
        <td class=" ">{{$row->path=='0,'?'顶级分类':$row->path}}</td>
       <td class="" onclick="pp({{$row->id}}, this)" style="cursor: pointer;">{{$row->display==0?'开启':'关闭'}}</td>
        <td class=" ">
          <a href="/typeAdd/{{$row->id}}" class="btn btn-danger">添加</i></a>
          <a href="javascript:;" class="btn btn-danger del">删除</i></a>
          <a href="/type/{{$row->id}}" class="btn btn-success">查看</i></a>
          <a href="/type/{{$row->id}}/edit" class="btn btn-info">修改</i></i></a>
        </td>
       </tr>
         @endforeach
         @else
        <h1>暂无数据</h1>
         @endif
        <div class="dataTables_paginate paging_full_numbers" id="pages">
        {{$data->appends($request)->render()}}
        </div>
      </tbody>
     </table>
     <div class="dataTables_paginate paging_full_numbers" id="pages">
     </div>
    </div> 
   </div> 
  </div>
 </body>
 <script type="text/javascript">
  // alert($);
  //获取删除按钮
  $(".del").click(function(){
    //获取id
    id=$(this).parents("tr").find("td:first").html();
    s=$(this).parents("tr");
    ss=confirm("你确定删除吗?");
    if(ss){
            // alert(id);
        $.get("/typeDel",{id:id},function(data){
          // alert(data);
          if(data==1){
            alert("删除成功");
            //删除数据所在的tr
            s.remove();
          }else if(data == 2){
            alert('请先删除子分类');
          }
        });
    }
  });

function pp(id, obj){
      var num = obj.innerHTML=='开启'?1:0;
      $.get('/zt',{pp:num, id:id},function(data){
          if(data==0){
            $(obj).html('开启');
          }else if(data==1){
            $(obj).html('关闭');
          }
      });
    }
 </script>
</html>
@endsection
@section('title','分类列表')