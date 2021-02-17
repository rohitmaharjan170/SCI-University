<html>
<body>
<p>please <a href="{{route('update.email',['user_id'=>$resetEmail->user_id,'token'=>$resetEmail->token])}}">click here</a> to update your new email</p>
<br>
{{ config('app.name') }}
</body>
</html>