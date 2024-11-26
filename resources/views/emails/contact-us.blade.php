<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>{{config('app.name', 'Rebar Africa')}}</title>
</head>
<body>
    <div class="container">
    <div class="row">

<div class="col-md-6">
{{$first__name}} {{$last__name}}
</div>
<div class="col-md-6">
    <strong>E.</strong> {{$__email}}
</div>
<div class="col-md-6">
    <strong>T.</strong> {{$__phone}}
</div>
<br/>
        <div class="col-md-12">
            <p>
                <strong>Message:</strong>
                <br>
                {{$__message}}
            </p>
        </div>
<br/>

<p> <em>--- Message sent from the website</em></p>
    </div>
    </div>

</body>
</html>

