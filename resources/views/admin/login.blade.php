@extends('layouts.main')

@section('content')

<div class="container my-5 py-5 z-depth-1">


        <!--Section: Content-->
        <section class="px-md-5 mx-md-5 text-center text-lg-left dark-grey-text">


            <!--Grid row-->
            <div class="row d-flex justify-content-center">

                <!--Grid column-->
                <div class="col-md-6">

                    <!-- Default form login -->
                    <form class="text-center" action="{{ route('post-admin-login') }}" method="POST">
                        @csrf
                        <p class="h4 mb-4">{{ __('Admin Login') }}</p>

                        <!-- Email -->
                        <input name="email" type="email" id="defaultLoginFormEmail" class="form-control mb-4 @error('email') is-invalid @enderror" placeholder="{{ __('E-Mail Address') }}" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <!-- Password -->
                        <input name="password" type="password" id="defaultLoginFormPassword" class="form-control mb-4 @error('password') is-invalid @enderror"
                            placeholder="{{ __('Password') }}" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="d-flex justify-content-around">
                            <div>
                                <!-- Remember me -->
                                <div class="custom-control custom-checkbox">
                                    <input name="remember" type="checkbox" class="custom-control-input" id="defaultLoginFormRemember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="defaultLoginFormRemember">{{ __('Remember Me') }}</label>
                                </div>
                            </div>

                           
                        </div>

                        <!-- Sign in button -->
                        <button class="btn btn-purple btn-block my-4" type="submit">{{ __('Login') }}</button>

                        <!-- Register -->
                        

                       

                    </form>
                    <!-- Default form login -->

                </div>
                <!--Grid column-->

            </div>
            <!--Grid row-->


        </section>
        <!--Section: Content-->
</div>



@endsection