@extends("AdminPublic.public")
@section('admin')
<html>
 <head></head>
 <script type="text/javascript" src="/static/jquery-1.8.3.min.js"></script>
 <body>
  <div class="mws-panel grid_8"> 
   <div class="mws-panel-header"> 
    <span><i class="icon-table"></i>后台订单列表</span> 
   </div> 
   <div class="mws-panel-body no-padding"> 
    <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
      <form action="/ordersList" method="get">
     <div class="dataTables_filter" id="DataTables_Table_1_filter">
      <label>搜索: 订单号<input type="text" aria-controls="DataTables_Table_1" name="keywords"  value="{{$request['keywords'] or ''}}"/></label>
      <input type="submit" value="搜索">
     </div>
     </form>
     <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info"> 
      <thead> 
       <tr role="row">
        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 157px;">ID</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 209px;">订单号</th>
         <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 137px;">下单用户名</th>
         <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 137px;">总价</th>
         <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 207px;">状态</th>
         <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 137px;">下单时间</th>
         <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 137px;">付款时间</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 151px;">操作</th>
       </tr> 
      </thead> 
      <tbody role="alert" aria-live="polite" aria-relevant="all">
      @if($data)
      @foreach($data as $row)
       <tr class="odd"> 
        <td class="  sorting_1">{{$row->id}}</td>
        <td class=" ">{{$row->oid}}</td> 
        <td class=" ">{{$row->users->loginname}}</td>
        <td class=" ">{{$row->total}}</td> 
        @if($row->status==0)
        <td class=" ">待付款</td>
        @elseif($row->status==1)
        <td class=" "><button onclick="btn({{$row->id}}, this)" type="">点击发货</button></td>
        @elseif($row->status==2)
        <td class=" ">待收货</td>
        @elseif($row->status==3)
        <td class=" ">订单完成</td>
        @elseif($row->status==4)
        <td class=" "><button onclick="btn({{$row->id}}, this)" type="">确认退货</button></td>
        @elseif($row->status==5)
        <td class=" ">订单完成</td>
        @endif
        <td class=" ">{{date('Y-m-d H:i:s',$row->addtime)}}</td>
        <td class=" ">{{date('Y-m-d H:i:s',$row->paytime)}}</td>
        <td class=" ">
          <a href="/orderList/{{$row->id}}" class="btn btn-info">详情</a> 
        </td>
       </tr>
       @endforeach
       @else
       <h1>暂无数据</h1>
       @endif
      </tbody>
     </table>
     <div class="dataTables_paginate paging_full_numbers" id="pages">
     {{$data->appends($request)->render()}}
     </div>
    </div> 
   </div> 
  </div>
 </body>
 <script type="text/javascript">
 function btn(a, obj){
  $.get('/ajaxorder',{a:a},function(data){
    if(data == 2){
      $(obj).parent().html('待收货');
    }else{
      $(obj).parent().html('订单完成');
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
        $.get("/orderDel",{id:id},function(data){
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
@section('title','后台订单列表')