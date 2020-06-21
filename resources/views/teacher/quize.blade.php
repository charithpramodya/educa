@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Teacher's Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                </div>
            </div>

            <div class="row">
                <table>
                    <tr>
                        <th>Quiz</th>
                        <th>Action</th>
                    </tr>

                    @foreach ($quizes as $quiz)
                    <tr>
                        <td>
                            {{$quiz->name}}
                        </td>
                        <td>
                        
                            <a class="dropdown-item" href="post-show-questions"
                                onclick="event.preventDefault();
                                document.getElementById('question-form-{{$quiz->id}}').submit();">
                                {{ __('View') }}
                            </a>

                            <form id="question-form-{{$quiz->id}}" action="{{ route('post-show-questions') }}" method="POST" style="display: none;">
                                <input type="hidden" value="{{$quiz->id}}" name="id">
                                @csrf
                            </form>
                                
                        </td>
                    </tr>
                    @endforeach
                </table>
                
                <br><br>
                

            </div>
            <br><br>
            <form method="POST" action="{{route('post-add-quizes')}}">

                    <label for="w3mission">Subject</label>

                    <select name="subject">
                    @foreach ($subjects as $subject)
                        <option value="{{$subject->id}}">{{$subject->en_name}}</option>


                    @endforeach
                    </select>

                    <br>

                    <label>Name</label>

                    <input type="text" name="name">

                    <br>

                    <label>Type</label>

                    <input type="text" name="type">

                    <br>

                    <label>Privacy</label>

                    <input type="text" name="privacy">

                    <br>


                    

                    <br>

                    @csrf

                    <input type="submit" name="submit">
                </form>
        </div>
    </div>
</div>
@endsection
