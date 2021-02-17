<html>
<body>
Hi, {{$student->name}} <br>
<p>Your account has been created successfully!</p>
<p>your password is : {{$password}}</p>
<p>To verify your account please <a href="{{route('school.verify',['email'=>$student->email,'verify_token'=>$student->verify_token])}}">Click Here.</a></p>
Thanks, <br>
{{ config('app.name') }}
</body>
</html>