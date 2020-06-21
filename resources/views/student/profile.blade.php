@extends('layouts.dashboard')

@section('style')
  

@endsection

@section('content')

<!--Sign Up card-->
<div class="container my-5 py-5 z-depth-1" style="background: white; border-radius: 5px;">
	  
    <!--Section: Content-->
    <section class="px-md-5 mx-md-5 text-center text-lg-left dark-grey-text">


      <!--Grid row-->
      <div class="row d-flex justify-content-center">

          <!--Grid column-->
          <div class="col-md-6">

            <!-- Default form register -->
            <form class="text-center" action="{{route('post-student-profile')}}" method="POST" enctype="multipart/form-data">

              <p class="h4 mb-4">Profile</p>


              <!-- Grid column -->


              <div class="" style="margin-bottom: 20px;">
              <div class="avatar mx-auto">
                @if(Auth::user()->image_path == null)              
                  <img src="" class="rounded-circle z-depth-1 img-fluid" alt="Sample avatar">
                @else
                  <img src="{{asset('storage/images/'. Auth::user()->image_path)}}" class="rounded-circle z-depth-1" alt="Sample avatar">
                @endif
              </div>
              </div>


              <div class="input-group" style="margin-bottom: 25px;">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupFileAddon01"
                style="background: purple; color: white;">Change Image</span>
              </div>
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="inputGroupFile01"
                aria-describedby="inputGroupFileAddon01" name="image">
                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
              </div>
              </div>

              @error('image')
              <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
              </span>
              @enderror

              <!-- Grid column -->

              <div class="form-row mb-4">
                            <div class="col">
                                <!-- name -->
                                <input type="text" id="defaultRegisterFormFirstName" class="form-control @error('name') is-invalid @enderror"
                                    placeholder="Name" name="name" value="{{Auth::user()->name}}" required autocomplete="name">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                
                        </div>

                        <!-- E-mail -->
                        <input type="email" id="defaultRegisterFormEmail" class="form-control mb-4 @error('email') is-invalid @enderror" name="email" placeholder="E-mail" value="{{Auth::user()->email}}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <!-- mobile  -->
                        <input type="text" id="defaultRegisterFormEmail" value="{{Auth::user()->student()->first()->tpno }}" class="form-control mb-4 @error('telephone') is-invalid @enderror" placeholder="Mobile Number" name="telephone" required autocomplete="telephone">
                        
                        @error('telephone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror


                        <!-- exam types  -->
                        <select  id="defaultRegisterFormEmail" class="form-control mb-4 @error('exam_type') is-invalid @enderror" value="{{ old('exam_type') }}" placeholder="Exam Type" name="exam_type" required >
                            <option value="0">Select your Exam</option>
                            @foreach($exams as $exam)
                            <option value="{{$exam->id}}" {{(Auth::user()->student()->first()->exam_id==$exam->id) ? 'selected' : ''}} >{{$exam->en_name}}</option>
                            @endforeach

                        </select>

                        @error('exam_type')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
              
                      @csrf
                    <!-- Sign up button -->
                    <button class="btn btn-purple my-4 btn-block" type="submit" style="color: white">Update</button>


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

@section('script')




@endsection