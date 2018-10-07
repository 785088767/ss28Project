@extends('AdminPublic.Public')
@section('title','商品添加')
@section('admin')
<html>
 <head></head>
 <body>
  <div class="mws-panel grid_8"> 
   <div class="mws-panel-header"> 
    <span>商品添加</span> 
   </div> 
   <div class="mws-panel-body no-padding"> 
    <form class="mws-form" action="/goodsList" method="post" enctype="multipart/form-data">
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
        <input type="text" class="large" name="gname" value="{{old('gname')}}"/> 
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
                <option value="{{$v->id}}">{{$v->name}}</option>
                @endforeach
        </select>
       </div> 
      </div>
      <div class="mws-form-row"> 
       <label class="mws-form-label">价格</label> 
       <div class="mws-form-item"> 
        <input type="text" class="large" name="price" /> 
       </div> 
      </div>
      <div class="mws-form-row"> 
       <label class="mws-form-label">库存</label> 
       <div class="mws-form-item"> 
        <input type="text" class="large" name="stock" /> 
       </div> 
      </div>
      <div class="mws-form-row"> 
       <label class="mws-form-label">商品图片</label> 
       <div class="mws-form-item"> 
        <input type="file" class="large" name="gpic" /> 
       </div> 
      </div>
      <div class="mws-form-row"> 
       <label class="mws-form-label">描述</label> 
       <div class="mws-form-item"> 
        <textarea name="gdesc"></textarea>
       </div> 
      </div>
      
     </div> 
     <div class="mws-button-row">
      {{csrf_field()}}
      <input type="submit" value="Submit" class="btn btn-danger" /> 
      <input type="reset" value="Reset" class="btn " /> 
     </div> 
    </form> 
   </div> 
  </div>
 </body>
</html>
@endsection