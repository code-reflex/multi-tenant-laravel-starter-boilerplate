<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

    <div class="container">
        <div class="row justify-content-center" style="padding-top:20px;">
        <div class="col-md-8">
            <div class="jumbotron container" style="margin-bottom:10px; padding: 20px 20px 20px 20px;">
                <h2 style="margin:0px;">{{ config('app.name', 'Laravel') }}</h2>
            </div>
        </div>
        </div>
    </div>    

    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-8">
                <div class="jumbotron container" style="margin-bottom:10px; padding: 20px 20px 20px 20px;">
                <p style="font-size: 1.1em; margin: 0px; font-weight: 600;" >
                    <span>Thankyou for expressing interest in our services.</span> <br>
                    <span>Please provide the below information so that we can get in touch with you.</span>
                </p>
                </div>
                <div class="card">
                    <div class="card-body">
                        {{ Form::open(array('url' => '/signup')) }}
                        <div class="form-group">
                            {{ Form::label('company', 'Your Company Name') }}
                            {{ Form::text('company', null, array('class' => $errors->has('company') ? 'form-control is-invalid' : 'form-control', 'value' => old('company') )) }}
                            @if ($errors->has('company'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('company') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            {{ Form::label('location', 'Postal Address') }}
                            {{ Form::text('location', null, array('class' => $errors->has('location') ? 'form-control is-invalid' : 'form-control', 'value' => old('location') )) }}
                            @if ($errors->has('location'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('location') }}</strong>
                                </span>
                            @endif
                        </div>

                        <hr style="margin-top:30px;"/>

                        <div class="form-group">
                            {{ Form::label('subdomain', 'Preferred Portal Name') }}
                            {{ Form::text('subdomain', null, array('class' => $errors->has('subdomain') ? 'form-control is-invalid' : 'form-control', 'value' => old('subdomain') )) }}
                            <p style="font-size:0.9em; opacity:0.7;"><i>(E.g. If your company name is KLM Logistics, then you can opt for klm or klml as your preferred portal name)</i></p>
                            @if ($errors->has('subdomain'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('subdomain') }}</strong>
                                </span>
                            @endif
                        </div>

                        

                        <hr style="margin-top:30px;"/>

                        <div class="form-group">
                            {{ Form::label('name', 'Your Name') }}
                            {{ Form::text('name', null, array('class' => $errors->has('name') ? 'form-control is-invalid' : 'form-control', 'value' => old('name') )) }}
                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            {{ Form::label('email', 'Your Email') }}
                            {{ Form::text('email', null, array('class' => $errors->has('email') ? 'form-control is-invalid' : 'form-control', 'value' => old('email') )) }}
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            {{ Form::label('phone', 'Your Phone Number') }}
                            {{ Form::text('phone', null, array('class' => $errors->has('phone') ? 'form-control is-invalid' : 'form-control', 'value' => old('phone') )) }}
                            @if ($errors->has('phone'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <div class="jumbotron" style="padding:10px; height:auto;">                        
                                <span class="col-md-4 float-left">{!! captcha_img('flat') !!}</span>
                                {{ Form::text('captcha', null, array('class' => $errors->has('captcha') ? 'form-control col-md-4 float-middle is-invalid' : 'form-control col-md-4 float-middle ', 'placeholder' => 'Enter Captcha' )) }}
                                @if ($errors->has('captcha'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('captcha') }}</strong>
                                    </span>
                                @endif
                            </div>   
                        </div>

                        <div class="form-group">
                        {{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}
                        </div>

                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row" style="margin-bottom: 20px;"></div>

</body>
</html>