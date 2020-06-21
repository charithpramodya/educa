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
                <p> {{$id}} </p>
                <table>
                    <tr>
                        <th>Question</th>
                        <th>Answer 1</th>
                        <th>Answer 2</th>
                        <th>Answer 3</th>
                        <th>Answer 4</th>
                        <th>Answer 5</th>
                        <th>Action</th>
                    </tr>

                    @foreach ($questions as $question)
                    <tr>
                        <td>
                            {{$question->question}}
                        </td>
                        <td>{{$question->ans1}}</td>
                        <td>{{$question->ans2}}</td>
                        <td>{{$question->ans3}}</td>
                        <td>{{$question->ans4}}</td>
                        <td>{{$question->ans5}}</td>
                        <td>
                        
                            <a class="dropdown-item" href="post-show-questions"
                                onclick="event.preventDefault();
                                document.getElementById('question-form-{{$question->id}}').submit();">
                                {{ __('Delete') }}
                            </a>

                            <form id="question-form-{{$question->id}}" action="{{ route('post-show-questions') }}" method="POST" style="display: none;">
                                
                            </form>
                                
                        </td>
                    </tr>
                    @endforeach
                </table>
                

                <form method="POST" action="{{route('post-add-questions')}}">

                    <label for="w3mission">Question</label>

                    <textarea id="w3mission" name="question" rows="4" cols="50">
                    
                    </textarea>

                    <br>

                    <label>Anserwer 1</label>

                    <input type="text" name="answer1">

                    <br>

                    <label>Anserwer 2</label>

                    <input type="text" name="answer2">

                    <br>

                    <label>Anserwer 3</label>

                    <input type="text" name="answer3">

                    <br>

                    <label>Anserwer 4</label>

                    <input type="text" name="answer4">

                    <br>

                    <label>Anserwer 5</label>

                    <input type="text" name="answer5">
                    
                    <br>

                    <label>Correct Answer</label>

                    <input type="text" name="correct_ans">


                    <input type="hidden" name="id" value="{{$id}}">

                    <br>

                    @csrf

                    <input type="submit" name="submit">
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
