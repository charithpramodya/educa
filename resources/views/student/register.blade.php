@extends('layouts.main')

@section('content')

    <!--Sign Up card-->
    <div class="container my-5 py-5 z-depth-1">

        <!--Section: Content-->
        <section class="px-md-5 mx-md-5 text-center text-lg-left dark-grey-text">


            <!--Grid row-->
            <div class="row d-flex justify-content-center">

                <!--Grid column-->
                <div class="col-md-6">

                    <!-- Default form register -->
                    <form class="text-center" action="{{ route('post-student-register') }}" method="POST" enctype="multipart/form-data">

                        <p class="h4 mb-4">Sign up</p>

                        <div class="form-row mb-4">
                            <div class="col">
                                <!-- First name -->
                                <input type="text" id="defaultRegisterFormFirstName" class="form-control @error('firstname') is-invalid @enderror"
                                    placeholder="First name" name="firstname" value="{{ old('firstname') }}" required autocomplete="firstname">
                                @error('firstname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col">
                                <!-- Last name -->
                                <input type="text" id="defaultRegisterFormLastName" class="form-control @error('lastname') is-invalid @enderror"
                                    placeholder="Last name" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname">
                                @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- E-mail -->
                        <input type="email" id="defaultRegisterFormEmail" class="form-control mb-4 @error('email') is-invalid @enderror" name="email" placeholder="E-mail" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <!-- mobile  -->
                        <input type="text" id="defaultRegisterFormEmail" value="{{ old('telephone') }}" class="form-control mb-4 @error('telephone') is-invalid @enderror" placeholder="Mobile Number" name="telephone" required autocomplete="telephone">
                        
                        @error('telephone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror


                        <!-- exam types  -->
                        <input type="text" id="defaultRegisterFormEmail" class="form-control mb-4 @error('exam_type') is-invalid @enderror" value="{{ old('exam_type') }}" placeholder="Exam Type" name="exam_type" required autocomplete="exam_type">

                        @error('exam_type')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <!-- Password -->
                        <input type="password" id="defaultRegisterFormPassword" class="form-control  @error('password') is-invalid @enderror"
                            placeholder="Password" name="password" aria-describedby="defaultRegisterFormPasswordHelpBlock" required autocomplete="new-password">
                        <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
                            At least 8 characters and 1 digit
                        </small>

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <!-- Password -->
                        <input type="password" id="defaultRegisterFormPassword" class="form-control"
                            placeholder="Confirm Password" name="password_confirmation" aria-describedby="defaultRegisterFormPasswordHelpBlock" required autocomplete="new-password">
                        <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
                            At least 8 characters and 1 digit
                        </small>


                        <div class="input-group" style="margin-bottom: 25px;">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupFileAddon01" style="background: purple; color: white;">Profile Picture</span>
                            </div>
                            <div class="custom-file">
                                <input name="image" type="file" class="custom-file-input" id="inputGroupFile01"
                                aria-describedby="inputGroupFileAddon01">
                                <label class="custom-file-label" for="inputGroupFile01">Choose picture</label>
                            </div>
                        </div>





                        <!-- Newsletter -->
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="defaultRegisterFormNewsletter">
                            <label class="custom-control-label" for="defaultRegisterFormNewsletter">Subscribe to our
                                newsletter</label>
                        </div>

                        @csrf
                        <!-- Sign up button -->
                        <button class="btn btn-purple my-4 btn-block" type="submit">Sign in</button>

                        <!-- Social register -->
                        <!--
                        <p>or sign up with:</p>

                        <a href="#" class="mx-1" role="button"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="mx-1" role="button"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="mx-1" role="button"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="mx-1" role="button"><i class="fab fa-github"></i></a>
                        -->
                        <hr>

                        <!-- Terms of service -->
                        <p>By clicking
                            <em>Sign up</em> you agree to our
                            <a href="" target="_blank" style="color: purple;">terms of service</a>

                    </form>
                    <!-- Default form register -->

                </div>
                <!--Grid column-->

            </div>
            <!--Grid row-->


        </section>
        <!--Section: Content-->

    </div>


@endsection