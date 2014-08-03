@extends('layouts.base')

@section('content')
  <div class="col-md-4 col-md-offset-4 column">
    @include('layouts.pageheader')
    {{-- 登录表单 --}}
    <form role="form" method="post" id="signin_form" action="{{{ URL::action('AccountController@signin') }}}">
      <div class="form-group">
         <label for="userId">{{{ Lang::get('site.user_id') }}}</label><input type="text" class="form-control" id="userId" name="userId" />
      </div>
      <div class="form-group">
         <label for="password">{{{ Lang::get('site.password') }}}</label><input type="password" class="form-control" id="password" name="password" />
      </div>
      <div class="form-group">
        <div class="row">
          <div class='col-md-6'>
            <label><input type="checkbox" class="checkbox-normal" id="rememberMe" name="rememberMe" value="0"/> {{{ Lang::get('site.remember_me') }}}</label>
          </div>
          <div class='col-md-6'>
            <strong>
              <a href="{{{ URL::action('AccountController@findpassword') }}}"> {{{ Lang::get('site.forgot_psw') }}}</a>
            </strong>
          </div>
        </div>
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-lg btn-primary btn-block">{{{ Lang::get('site.signin') }}}</button>
        <button type="button" class="btn btn-default btn-lg btn-block" id="signup_button">{{{ Lang::get('site.signup') }}}</button>
      </div>
    </form>
    {{-- 注册表单 --}}
    <form role="form" method="post" id="signup_form" action="{{{ URL::action('AccountController@signup') }}}">
      <div class="form-group">
         <label for="email">{{{ Lang::get('site.email') }}}</label><input type="email" class="form-control" id="email" name="email"/>
      </div>
      <div class="form-group">
         <label for="name">{{{ Lang::get('site.username') }}}</label><input type="text" class="form-control" id="name" name="name"/>
      </div>
      <div class="form-group">
         <label for="password">{{{ Lang::get('site.password') }}}</label><input type="password" class="form-control" id="password" name="password"/>
      </div>
      <div class="form-group">
         <label for="passwordConfirm">{{{ Lang::get('site.password_confirm') }}}</label><input type="password" class="form-control" id="passwordConfirm" name="passwordConfirm"/>
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-lg btn-primary btn-block">{{{ Lang::get('site.signup') }}}</button>
        <button type="button" class="btn btn-default btn-lg btn-block" id="signin_button">{{{ Lang::get('site.signin') }}}</button>
      </div>
    </form>
  </div>
@stop

@section('javascript')
  <script src="{{{ asset('js/taskpool/home.startup.js') }}}"></script>
@stop