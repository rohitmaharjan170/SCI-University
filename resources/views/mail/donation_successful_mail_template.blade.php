<html>
<body>
Dear {{$donation->donor_name}}, <br>
Thank you for your donation <br>
<h2>${{$donation->donation_amount}}</h2>
Thanks, <br>
{{ config('app.name') }}
</body>
</html>