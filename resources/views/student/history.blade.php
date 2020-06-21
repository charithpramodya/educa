@extends('layouts.dashboard')


@section('content')
    <div class="card mb-4 wow fadeIn">
					<!--Table-->
		<table class="table table-hover table-fixed">

						<!--Table head-->
						<thead>
							<tr>

								<th>#</th>
								<th>Image</th>
								<th>Quiz Name</th>
								<th>Subject</th>
								<th>Marks</th>

							</tr>
						</thead>
						<!--Table head-->

						<!--Table body-->
						<tbody>
							@foreach($quizes as $index=>$quiz)
							<tr>
								<th scope="row">{{$index+1}}</th>
								<td><img src="/img/sft.jpg" alt="" style="width: 50px;"></td>
								<td><a href="/quizpage.html" style="color: purple;">{{$quiz->name}}</a></td>
								<td>{{$quiz->en_name}}</td>
								<td>{{$quiz->correct_answers}}/{{$quiz->all_questions}}</td>
							</tr>
							@endforeach


							<tr>
								<th scope="row">2</th>
								<td><img src="/img/sft.jpg" alt="" style="width: 50px;"></td>
								<td><a href="/quizpage.html" style="color: purple;">Basic Measurements</a></td>
								<td>Science For technology</td>
								<td>35/40</td>
							</tr>

							<tr>
								<th scope="row">3</th>
								<td><img src="/img/sft.jpg" alt="" style="width: 50px;"></td>
								<td><a href="/quizpage.html" style="color: purple;">Basic Measurements</a></td>
								<td>Science For technology</td>
								<td>35/40</td>
							</tr>


						</tbody>
						<!--Table body-->

		</table>
		<!--Table-->
	</div>



@endsection