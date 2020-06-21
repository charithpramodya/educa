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

                    @isset($coupon)
                        {{$coupon}}
                    @endisset
                </div>
            </div>
        </div>
        
        
        <form action="{{route('post-student-coupon-validate')}}" method="POST">
            <input type="text" name="coupon"> <br>

            @csrf

            <input  type="submit" name="submit" value="submit">
        </form>

        
    </div>
</div>
@endsection
