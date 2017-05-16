<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Contact</title>
</head>
<body>

@include('layouts.header', array('title'=>'Home'))

<div class="container">
    <!-- Form -->
    <div class="col-xs-6 col-md-7">
        {{ Form::open(['route' => 'send_message']) }}
        {{ Form::hidden('_token', csrf_token()) }}
            <div class="form-group" style="margin-top:23%;text-align:center;font-family:Verdana, Geneva, sans-serif;font-size:35px;">
                <p>Contact opnemen</p>
            </div>
            <div class="form-group">
                <label for="naam" class="col-sm-2 control-label">Naam*</label>
                <div class="col-sm-10">
                    <input required type="text" class="form-control" id="name" name="name" placeholder="Naam" value="">
                </div>
            </div>
            <div class="form-group">
                <label for="email" class="col-sm-2 control-label">Email*</label>
                <div class="col-sm-10">
                    <input required type="email" class="form-control" id="email" name="email" placeholder="voorbeeld@domain.com" value="">
                </div>
            </div>
            <div class="form-group">
                <label for="onderwerp" class="col-sm-2 control-label">Onderwerp</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="subject" name="subject" placeholder="Bijv: Beschadigd Product" value="">
                </div>
            </div>
            <div class="form-group">
                <label for="message" class="col-sm-2 control-label">Bericht*</label>
                <div class="col-sm-10">
                    <textarea required class="form-control" rows="4" name="message"></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-10 col-sm-offset-2">
                    <input id="submit" name="submit" type="submit" value="Send" class="btn btn-primary">
                </div>
            </div>
        {{ Form::close() }}
    </div>

    <!-- Contactgegevens -->
    <div class="col-xs-6 col-md-4">
        <div style="margin-top:25%;text-align:center;font-family:Verdana, Geneva, sans-serif;font-size:35px;">
            <p>Contactinformatie</p>
        </div>
        <div style="text-align:center;">
            <p>PosterHouse</p>
            <p>info@posterhouse.nl</p>
            <p>073-36651039</p>
            <p>Onderwijsboulevard 215, 5223 DE 's-Hertogenbosch</p>
        </div>
        <div style="margin-top:5%;text-align:center;font-family:Verdana, Geneva, sans-serif;font-size:35px;">
            <p>Onze deskundige</p>
        </div>
        <div class="container">
            <div class="col-xs-6 col-md-2">
                <img src="{{ URL::asset('images/shaun.png') }}"/>
                <p>Shaun van Beurden</p>
                <p>WebsiteOntwikkelaar</p>
                <p>06-53520699</p>
                <p>smkbeurd@avans.nl</p>
            </div>
            <div class="col-xs-6 col-md-2">
                <img src="{{ URL::asset('images/dennis.png') }}"/>
                <p>Dennis Tijbosch</p>
                <p>WebsiteOntwikkelaar</p>
                <p>06-37881657</p>
                <p>dennistijbosch@avans.nl</p>
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')
</body>
</html>