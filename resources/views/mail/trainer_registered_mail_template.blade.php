<html>
<body>
Hi, {{$trainer->getFullNameAttribute()}} <br>
<p>your account has been created successfull!</p>
<p>To verify your account and update your password please <a href="{{route('trainer.verify',['email'=>$trainer->email,'verify_token'=>$trainer->verify_token])}}">Click Here.</a></p>
Thanks, <br>
{{ config('app.name') }}
</body>
</html>