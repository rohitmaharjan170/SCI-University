<html>
<body>
Hi, {{$admin->name}} <br>
<p>your password has been updated successfully!</p>
<p>your new password is: {{$password}}</p><br>
Thanks, <br>
{{ config('app.name') }}
</body>
</html>