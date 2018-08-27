@include('header')
<div class="login-page">
    <div class="form">
        <form class="login-form" action="{{url('login')}}" method="POST">
            {{ csrf_field() }}
            <span class="help-block" id="error-message" style="margin-left: 0px">
                <strong class="text-danger">{{$errors->has('error_message') ? $errors->first('error_message') : ''}}</strong>
            </span>
            <input type="text" placeholder="Email" name="email" value="{{old('email') ?? $email}}"><br>
            <span class="help-block" id="error-message" style="margin-left: 0px">
                <strong class="text-danger">{{$errors->first('email')}}</strong>
            </span>
            <input type="password" placeholder="Password" name="password"><br>
            <span class="help-block" id="error-message" style="margin-left: 0px">
                <strong class="text-danger">{{$errors->first('password')}}</strong>
            </span>
            <button type="submit">Login</button>
            <p class="message">You don't have an account? You can <a href="#/login"> Create an account</a></p>
        </form>
    </div>
</div>