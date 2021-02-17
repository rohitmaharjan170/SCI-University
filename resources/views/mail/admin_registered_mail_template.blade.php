<html>
<body>
Hi, {{$admin->name}} <br>
<p>your account has been created successfull!</p>
<p>To verify your account and update your password please <a href="{{route('admin.verify.email',['email'=>$admin->email,'verify_token'=>$admin->verify_token])}}">Click Here.</a></p>
Thanks, <br>
{{ config('app.name') }}
</body>
</html>