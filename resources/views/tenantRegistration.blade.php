{{-- \resources\views\tenant\roles\create.blade.php --}}
@extends('tenant.app')

@section('title', '| Add Role')

@section('content')

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
                    {{ Form::open(array('url' => '/register')) }}
                    <div class="form-group">
                        {{ Form::label('company', 'Company Name') }}
                        {{ Form::text('company', null, array('class' => $errors->has('company') ? 'form-control is-invalid' : 'form-control', 'value' => old('company') )) }}
                        @if ($errors->has('company'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('company') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        {{ Form::label('location', 'Address') }}
                        {{ Form::text('location', null, array('class' => $errors->has('location') ? 'form-control is-invalid' : 'form-control', 'value' => old('location') )) }}
                        @if ($errors->has('location'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('location') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        {{ Form::label('name', 'Name') }}
                        {{ Form::text('name', null, array('class' => $errors->has('name') ? 'form-control is-invalid' : 'form-control', 'value' => old('name') )) }}
                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        {{ Form::label('email', 'Email') }}
                        {{ Form::text('email', null, array('class' => $errors->has('email') ? 'form-control is-invalid' : 'form-control', 'value' => old('email') )) }}
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        {{ Form::label('phone', 'Phone Number') }}
                        {{ Form::text('phone', null, array('class' => $errors->has('phone') ? 'form-control is-invalid' : 'form-control', 'value' => old('phone') )) }}
                        @if ($errors->has('phone'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('phone') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <div class="jumbotron" style="padding:10px; height:65px;">                        
                            <span class="col-md-4 float-left">{!! captcha_img('flat') !!}</span>
                            {{ Form::text('captcha', null, array('class' => $errors->has('captcha') ? 'form-control col-md-4 float-middle is-invalid' : 'form-control col-md-4 float-middle ', 'placeholder' => 'Enter Captcha' )) }}
                            @if ($errors->has('captcha'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('captcha') }}</strong>
                                </span>
                            @endif
                        </div>   
                    </div>

<!--          
                    <div class="row">
                      <div class="col-md-4"></div>
                      <div class="form-group col-md-4">
                         <div class="captcha">
                           <span>{!! captcha_img('flat') !!}</span>
                           <button type="button" class="btn btn-outline-primary btn-sm"><i id="refresh"></i>Refresh</button>
                           </div>
                        </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4"></div>
                        <div class="form-group col-md-4">
                         <input id="captcha" type="text" class="form-control" placeholder="Enter Captcha" name="captcha"></div>
                      </div>
 -->
                    <div class="form-group">
                    {{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}
                    </div>

                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
<!-- <script type="text/javascript">
$('#refresh').click(function(){
  alert('hello');
  $.ajax({
     type:'GET',
     url:'registerRefreshCaptcha',
     success:function(data){
        $(".captcha span").html(data.captcha);
     }
  });
});
</script>
 -->@endsection