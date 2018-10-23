@extends('AdminPublic.Public')
@section('title','商品修改')
@section('admin')
<html>
 <head>
  <script type="text/javascript" charset="utf-8" src="/static/ueditor/ueditor.config.js"></script>
  <script type="text/javascript" charset="utf-8" src="/static/ueditor/ueditor.all.min.js">
  </script>
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加
    载的中文，那最后就是中文-->
    <script type="text/javascript" charset="utf-8" src="/static/ueditor/lang/zh-cn/zh-cn.js">
  </script>
 </head>
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
                @foreach($brand as $v)
                <option value="{{$v->id}}" {{$v->id==$info->bid?'selected':''}}>{{$v->name}}</option>
                @endforeach
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
          <option value="0" @if($info->display=='已上架') selected @endif>已上架</option>
          <option value="1" @if($info->display=='已下架') selected @endif>已下架</option>
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
        <script id="editor" type="text/plain" name="gdesc" style="width:800px;height:500px;">{!!$info->gdesc!!}</script>
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
 <script type="text/javascript">
    //实例化编辑器
    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
    var ue = UE.getEditor('editor');
  </script>
</html>
@endsection