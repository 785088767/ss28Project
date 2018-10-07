@extends('AdminPublic.Public')
@section('title','用户添加')
@section('admin')
<html>
 <head></head>
 <body>
  <div class="mws-panel grid_8"> 
   <div class="mws-panel-header"> 
    <span>用户添加</span> 
   </div> 
   <div class="mws-panel-body no-padding"> 
    <form class="mws-form" action="/usersList" method="post">
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
       <label class="mws-form-label">用户名</label> 
       <div class="mws-form-item"> 
        <input type="text" class="large" name="loginname" value="{{old('loginname')}}"/> 
       </div> 
      </div> 
      <div class="mws-form-row"> 
       <label class="mws-form-label">密码</label> 
       <div class="mws-form-item"> 
        <input type="password" class="large" name="password" /> 
       </div> 
      </div>
      <div class="mws-form-row"> 
       <label class="mws-form-label">确认密码</label> 
       <div class="mws-form-item"> 
        <input type="password" class="large" name="repassword" /> 
       </div> 
      </div>
      <div class="mws-form-row"> 
       <label class="mws-form-label">性别</label> 
       <div class="mws-form-item"> 
        <select class="large" name="sex">
              <option disabled="disabled" selected>--请选择--</option>
              <option value="0">女</option>
              <option value="1">男</option>
        </select>
       </div> 
      </div>
      <div class="mws-form-row"> 
       <label class="mws-form-label">邮箱</label> 
       <div class="mws-form-item"> 
        <input type="text" class="large" name="email" value="{{old('email')}}"/> 
       </div> 
      </div>
      <div class="mws-form-row"> 
       <label class="mws-form-label">手机号</label> 
       <div class="mws-form-item"> 
        <input type="text" class="large" name="phone" value="{{old('phone')}}" /> 
       </div> 
      </div>
      <div class="mws-form-row"> 
       <label class="mws-form-label">真实姓名</label> 
       <div class="mws-form-item"> 
        <input type="text" class="large" name="truename" value="{{old('truename')}}" /> 
       </div> 
      </div>
      <div class="mws-form-row"> 
       <label class="mws-form-label">账户级别</label> 
       <div class="mws-form-item"> 
        <select class="large" name="level">
              <option disabled="disabled" selected>--请选择--</option>
              <option value="0">普通会员</option>
              <option value="1">高级会员</option>
              <option value="2">土豪用户</option>
              <option value="3">测试账号</option>
        </select>
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