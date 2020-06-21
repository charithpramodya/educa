@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">


                @error('error')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $error }}</strong>
                </span>
                @enderror

                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>

                
            </div>
            {{$coupons}}
            
        </div>
        
        <form action="{{route('get-admin-profile-coupon-add')}}" method="POST">

                    <label>Code</label>
                    <input type="text" name="code"> <br>

                    <label>Count</label>
                    <input type="text" name="count" value='1'> <br>

                    <label>Number of Quizes</label>
                    <input type="text" name="num_of_quizes" value="1"> <br>

                    @csrf

                    <input type="submit" value="submit" name="submit">


                </form>
        
    </div>
</div>
@endsection
