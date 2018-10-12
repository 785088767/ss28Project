@extends('AdminPublic.Public')
@section('title','商品修改')
@section('admin')
<html>
 <head></head>
 <body>
  <div class="mws-panel grid_8"> 
   <div class="mws-panel-header"> 
    <span>商品修改</span> 
   </div> 
   <div class="mws-panel-body no-padding"> 
    <form class="mws-form" action="/goodsList/{{$info->id}}" method="post" enctype="multipart/form-data">
      @if (count($errors) > 0)
      <div class="alert alert-danger">
          <div class="mws-form-message error">
            <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
            </ul>
          </div>
      </div>
      @endif 
     <div class="mws-form-inline"> 
      <div class="mws-form-row"> 
       <label class="mws-form-label">商品名</label> 
       <div class="mws-form-item"> 
        <input type="text" class="large" name="gname" value="{{$info->gname}}"/> 
       </div> 
      </div>
       <div class="mws-form-row"> 
       <label class="mws-form-label">品牌</label> 
       <div class="mws-form-item"> 
        <select class="large" name="bid">
              <option disabled="disabled" selected>--请选择--</option>
                <option value="1">测试</option>
        </select>
       </div> 
      </div>
      <div class="mws-form-row"> 
       <label class="mws-form-label">分类</label> 
       <div class="mws-form-item"> 
        <select class="large" name="cid">
              <option disabled="disabled" selected>--请选择--</option>
                @foreach($type as $v)
                <option value="{{$v->id}}" {{$v->id==$info->cid?'selected':''}}>{{$v->name}}</option>
                @endforeach
        </select>
       </div> 
      </div>
      <div class="mws-form-row"> 
       <label class="mws-form-label">状态</label> 
       <div class="mws-form-item"> 
       <select name="display">
          <option value="0" @if($v->display==0) selected @endif>上架</option>
          <option value="1" @if($v->display==1) selected @endif>下架</option>
       </select>
       </div> 
      </div>
      <div class="mws-form-row"> 
       <label class="mws-form-label">价格</label> 
       <div class="mws-form-item"> 
        <input type="text" class="large" name="price" value="{{$info->price}}"/> 
       </div> 
      </div>
      <div class="mws-form-row"> 
       <label class="mws-form-label">库存</label> 
       <div class="mws-form-item"> 
        <input type="text" class="large" name="stock" value="{{$info->stock}}"/> 
       </div> 
      </div>
      <div class="mws-form-row"> 
       <label class="mws-form-label">商品图片</label> 
       <div class="mws-form-item"> 
        <input type="file" class="large" name="gpic" /> 
        <img src="/uploads/goods/{{$info->gpic}}" alt="">
       </div> 
      </div>
      <div class="mws-form-row"> 
       <label class="mws-form-label">描述</label> 
       <div class="mws-form-item"> 
        <textarea name="gdesc">{{$info->gdesc}}</textarea>
       </div> 
      </div>
      <input type="hidden" name="ogpic" value="{{$info->gpic}}">
     </div> 
     <div class="mws-button-row">
      {{csrf_field()}}
      {{method_field('PUT')}}
      <input type="submit" value="Submit" class="btn btn-danger" /> 
      <input type="reset" value="Reset" class="btn " /> 
     </div> 
    </form> 
   </div> 
  </div>
 </body>
</html>
@endsection