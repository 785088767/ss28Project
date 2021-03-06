@extends("AdminPublic.public")
@section('admin')
<html>
 <head></head>
 <script type="text/javascript" src="/static/jquery-1.8.3.min.js"></script>
 <body>
  <div class="mws-panel grid_8"> 
   <div class="mws-panel-header"> 
    <span><i class="icon-table"></i>后台商品列表</span> 
   </div> 
   <div class="mws-panel-body no-padding"> 
    <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
      <form action="/adminList" method="get">
     <div class="dataTables_filter" id="DataTables_Table_1_filter">
      <label>搜索: 商品名<input type="text" aria-controls="DataTables_Table_1" name="keywords"  value="{{$request['keywords'] or ''}}"/></label>
      <input type="submit" value="搜索">
     </div>
     </form>
     <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info"> 
      <thead> 
       <tr role="row">
        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 157px;">ID</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 209px;">商品名</th>
         <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 137px;">图片</th>
         <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 137px;">分类</th>
         <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 137px;">品牌</th>
         <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 137px;">价格</th>
         <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 137px;">库存</th>
         <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 137px;">销量</th>
         <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 137px;">状态</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 201px;">操作</th>
       </tr> 
      </thead> 
      <tbody role="alert" aria-live="polite" aria-relevant="all">
      @if($data)
      @foreach($data as $row)
       <tr class="odd"> 
        <td class="  sorting_1">{{$row->id}}</td>
        <td class=" ">{{$row->gname}}</td> 
        <td class=" "><img src="/uploads/goods/{{$row->gpic}}" alt=""></td> 
        <td class=" ">{{$row->type->name}}</td> 
        <td class=" ">{{$row->brand->name}}</td> 
        <td class=" ">{{$row->price}}</td> 
        <td class=" ">{{$row->stock}}</td> 
        <td class=" ">{{$row->salenum}}</td>
        <td class="" onclick="check({{$row->id}}, this)" style="cursor: pointer;">{{$row->display}}</td>
        <td class=" ">
          <!-- <a href="/goodsList/{{$row->id}}" class="btn btn-info">商品详情</a> -->
          <a href="javascript:;" class="btn btn-danger del"><i class="icon-trash"></i></a>
          <a href="/goodsList/{{$row->id}}/edit" class="btn btn-info"><i class="icon-edit"></i></i></a> 
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
  // alert($);
  //获取删除按钮
  $(".del").click(function(){
    //获取id
    id=$(this).parents("tr").find("td:first").html();
    s=$(this).parents("tr");
    ss=confirm("你确定删除吗?");
    if(ss){
            // alert(id);
        $.get("/goodsDel",{id:id},function(data){
          alert(data);
          if(data==1){
            alert("删除成功");
            //删除数据所在的tr
            s.remove();
          }else{
            // alert(2);
          }
        });
    }
  });
 
 function check(a, obj){
    var num = obj.innerHTML=='上架中'?1:0;
    $.get('/ztt',{a:a,num:num},function(data){
      if(data==0){
        $(obj).html('上架中');
      }else if(data==1){
        $(obj).html('已下架');
      }
    })
  }
 </script>
</html>
@endsection
@section('title','后台商品列表')