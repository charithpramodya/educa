@extends('layouts.admin')

@section('content')

				<!-- adding -->
				<div class="btn-group" role="group" aria-label="Basic example" style="margin-bottom: 15px;">

					<a><button type="button" class="btn btn-white" data-toggle="modal" data-target="#modalAddExam"><i class="fas fa-plus"
								style="color: purple;"></i>
							Add Modules</button></a>
					
				</div>
				<!-- adding -->
				@if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif

				<div class="card mb-4 wow fadeIn">
					<!--Table-->
					<table class="table table-hover table-fixed">

						<!--Table head-->
						<thead>
							<tr>

								<th>#</th>
								<th>Module Name</th>
                                <th>Subject Name</th>
								<th>Delete</th>

							</tr>
						</thead>
						<!--Table head-->

						<!--Table body-->
						<tbody>

							@foreach($modules as $index=>$module)
							<tr>
								<th scope="row">{{$index+1}}</th>
								<td>{{$module->en_name}}</td>
                                <td>{{$module->subject->en_name}}</td>
								<td>
									
									<a  href="{{route('post-admin-profile-module-remove')}}" onclick="event.preventDefault();
									document.getElementById('delete-exam-form-{{$module->fid}}').submit();">
													<i class="far fa-trash-alt"> </i>
									</a>

									<form id="delete-exam-form-{{$module->fid}}" action="{{ route('post-admin-profile-module-remove') }}" method="POST" style="display: none;">
													@csrf
											<input type="hidden" name="id" value="{{$module->fid}}">
									</form>
									
								</td>
							</tr>
							@endforeach


						

						</tbody>
						<!--Table body-->

					</table>
					<!--Table-->
					
				</div>

				

				<!--Modal: add Exam-->
				<div class="modal fade" id="modalAddExam" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
						<div class="modal-content">
							<form method="POST" action="{{route('post-admin-profile-module-add')}}" enctype="multipart/form-data">
								<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Add Module</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								</div>
								<div class="modal-body">
								<!-- Grid column -->
									<ul id="error" class="alert alert-danger" style="display:none;"></ul>

								<!-- Exam Name -->
								<div class="form-group">
									<label for="FormExamName" style="float: left; font-size: smaller;">{{ __('Module Name') }}</label>
									<input type="text" name="modulename" value="{{old('examname')}}" id="FormExamName" class="form-control" style="background: #f8f7f7;">
		
								</div>


								<div class="form-group">
									<label for="FormControlSubject" style="float: left; font-size: smaller;">{{ __('Subject') }}</label>
									<select class="form-control" name="subject" id="FormControlSubject"
										style="background: #f8f7f7;">

										@foreach($subjects as $subject)
										<option value="{{$subject->fid}}">{{$subject->en_name}}</option>
										@endforeach
									</select>

									@error('subject')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>

								
								@csrf

								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									<button type="submit" id="savechanges" name="submit" class="btn btn-primary">Save changes</button>
								</div>
							</form>
						</div>
						</div>
				</div>
				<!--Modal: add exam-->

			



@endsection


@section('script')
<script>


</script>
@endsection