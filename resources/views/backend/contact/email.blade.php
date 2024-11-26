<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>{{config('app.name', 'AfrFinity')}}</title>
</head>
<body>
    <div class="container">
    <div class="row">
        <div class="col-md-6">
            <strong>First name:</strong> {{$data[0]['first__name']}}
        </div>
        <div class="col-md-6">
            <strong>Last name:</strong> {{$data[0]['last__name']}}
        </div>
        <div class="col-md-6">
            <strong>Email Address:</strong> {{$data[0]['__email']}}
        </div>
        <div class="col-md-6">
            <strong>Service:</strong> {{$data[0]['__service']}}
        </div>
        
        <div class="col-md-6">
            <strong>Client's phone:</strong> {{$data[0]['__phone']}}
        </div>
<div class="col-md-12">
    <p>
    <strong>Message:</strong>
    <br>
    {{$data[0]['__message']}}
</div>
    </div>
    </div>

</body>
</html>