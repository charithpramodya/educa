@extends('layouts.admin')

@section('content')

				<div class="btn-group" role="group" aria-label="Basic example" style="margin-bottom: 15px;">
					<a ><button type="button" class="btn btn-white" data-toggle="modal" data-target="#modalAddTeacher"><i
								class="fas fa-plus" style="color: purple;"></i> Add Teacher</button></a>
					
				</div>
				<!-- adding -->


				<div class="card mb-4 wow fadeIn">
					<!--Table-->
					<table class="table table-hover table-fixed">

						<!--Table head-->
						<thead>
							<tr>

								<th>#</th>
								<th>Image</th>
								<th>Teacher</th>
								<th>Subject</th>

							</tr>
						</thead>
						<!--Table head-->

						<!--Table body-->
						<tbody>

							@foreach($teachers as $index=>$teacher)						
							<tr>
								<th scope="row">{{$index+1}}</th>
								<td>
									@if(isset($teacher->user->image_path))
									<img src="{{asset('storage/images/'. $teacher->user->image_path)}}" alt="" style="width: 50px;">
									@else
									<img src="/img/svg/t1.svg" alt="" style="width: 50px;">
									@endif
									
								</td>
								<td>{{$teacher->user->name}}</td>
								<td>{{$teacher->subject->en_name}}</td>
								<td>
									<a href="#"> <i class="far fa-trash-alt"> </i> </a>
									<a href="#"><i class="fas fa-edit" style="margin-left: 7px;"></i></a>
								</td>
							</tr>
							@endforeach
						</tbody>
						<!--Table body-->

					</table>
					<!--Table-->
				</div>


				<!--Modal: Login / Register Form Demo-->
				<div class="modal fade" id="modalAddTeacher" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
						<div class="modal-content">
							<form method="POST" action="{{route('get-admin-profile-add-teacher')}}" enctype="multipart/form-data">
								<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Add Teacher</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								</div>
								<div class="modal-body">
								<!-- Grid column -->


								<!-- Subject Name -->
								<div class="form-row mb-4">
									<label for="FormControlName" style="float: left; font-size: smaller;">{{ __('Name') }}</label>
									<input type="text" name="name" id="FormControlName" class="form-control @error('name') is-invalid @enderror"
										placeholder="Teacher Name" style="background: #f8f7f7;" value="{{ old('name') }}" required autocomplete="name" autofocus>

									@error('name')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>

								<div class="form-row mb-4">
									<label for="FormControlEmail" style="float: left; font-size: smaller;">{{ __('E-Mail') }}</label>
									<input type="email" name="email" id="FormControlEmail" class="form-control @error('email') is-invalid @enderror"
										placeholder="E-Mail" style="background: #f8f7f7;" value="{{ old('email') }}" required autocomplete="email" autofocus>

									@error('email')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>

								<div class="form-row mb-4">
									<label for="FormControlTP" style="float: left; font-size: smaller;">{{ __('Telephone Number') }}</label>
									<input type="text" name="tpno" id="FormControlTP" class="form-control @error('tpno') is-invalid @enderror"
										placeholder="Telephone Number" style="background: #f8f7f7;" value="{{ old('tpno') }}" required autocomplete="tpno" autofocus>

									@error('tpno')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>

								<div class="form-row mb-4">
									<label for="FormControlAccountNo" style="float: left; font-size: smaller;">{{ __('Account Number') }}</label>
									<input type="text" name="accountno" id="FormControlAccountNo" class="form-control @error('accountno') is-invalid @enderror"
										placeholder="Account Number" style="background: #f8f7f7;" value="{{ old('accountno') }}" required autocomplete="accountno" autofocus>

									@error('accountno')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>


								<!-- Grade select -->
								<div class="form-group">
									<label for="FormControlSubject" style="float: left; font-size: smaller;">Select Your Main Subject</label>
									<select class="form-control" name="subject" id="FormControlSubject"
										style="background: #f8f7f7;">

										@foreach($subjects as $subject)
										<option value="{{$subject->fid}}">{{$subject->en_name}}</option>
										@endforeach
									</select>
								</div>

								

								<div class="input-group" style="margin-bottom: 25px;">
									<div class="input-group-prepend">
										<span class="input-group-text" id="inputGroupFileAddon01"
											style="background: purple; color: white;">Teacher Image</span>
									</div>
									<div class="custom-file">
										<input type="file" class="custom-file-input" id="FormControlImage"
											aria-describedby="inputGroupFileAddon01" name="image">
										<label class="custom-file-label" for="FormControlImage">Choose file</label>
									</div>
								</div>

								@csrf

								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									<button type="submit" name="submit" class="btn btn-primary">Save changes</button>
								</div>
							</form>
						</div>
						</div>
				</div>
				<!--Modal: Login / Register Form Demo-->


@endsection


@section('script')

	<script>

		@if(count($errors)!=0)  
			$(function() {
				$('#modalAddTeacher').modal({
					show: true
				});
		});

	@endif


	</script>

@endsection