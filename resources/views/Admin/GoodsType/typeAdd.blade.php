@extends('AdminPublic.Public')
@section('title','分类添加')
@section('admin')
<html>
 <head></head>
 <body>
  <div class="mws-panel grid_8"> 
   <div class="mws-panel-header"> 
    <span>用户添加</span> 
   </div> 
   <div class="mws-panel-body no-padding"> 
    <form class="mws-form" action="/type" method="post">
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
       <label class="mws-form-label">类名</label> 
       <div class="mws-form-item"> 
        <input type="text" class="small" name="name" value="{{old('username')}}"/> 
        <input type="hidden"  name="id"  value="{{$id or ''}}"/>
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