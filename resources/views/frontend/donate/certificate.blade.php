<html>
<head></head>
<body>
<div style="width:800px; height:600px; padding:20px; text-align:center; border: 10px solid #787878">
    <div style="width:750px; height:550px; padding:20px; text-align:center; border: 5px solid #787878">
        <span style="font-size:50px; font-weight:bold">Certificate of Donation</span>
        <br><br>
        <span style="font-size:25px"><i>This is to certify that</i></span>
        <br><br>
        <span style="font-size:30px"><b>{{$donation->donor_name}}</b></span><br/><br/>
        <span style="font-size:25px"><i>has donated the sum of</i></span> <br/><br/>
        <span style="font-size:30px">${{$donation->donation_amount}}</span> <br/><br/>
        <span style="font-size:20px">Thankyou for your donation.</b></span> <br/><br/><br/><br/>

    </div>
</div>
</body>
</html>