@extends('tenant.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">   
                    <h4>404 Not found</h4>
                </div>
                <div class="card-body">
                    We couldn't find the page.. <br/><br/>
                    The page you are looking for was either not found or does not exist. <br/>
                    Try refreshing the page or click the button below to go back to the Homepage.<br/>
                    <hr>
                    <div>
                        <a class="btn btn-info btn-sm" href="/home">
                                <i class="fa fa-arrow-left"></i>
                                Go back to Homepage                        
                            </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
