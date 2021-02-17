<html>
<body>
<p>please <a href="{{route('resetpassword.form',['email'=>$email,'reset_token'=>$token,'user_type'=>$userType])}}">click here</a> to reset your password</p>
<br>
{{ config('app.name') }}
</body>
</html>