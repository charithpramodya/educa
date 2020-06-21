@extends('layouts.main')

@section('content')


<div class="container my-5 py-5 z-depth-1">

    <section class="px-md-5 mx-md-5 text-center dark-grey-text">

        <!--Grid row-->
        <div class="row">

            <!--Grid column-->
            <div class="col-md-12 mb-4 mb-md-0">

                <h3 class="font-weight-bold">{{$quiz->name}}</h3>

                <p style="color: purple;">{{$quiz->subject->en_name}}</p>


                <a href="{{route('get-student-start-questions',['alias'=>$quiz->alias])}}" class="btn btn-md ml-0" role="button"
                    style="color: white; background: #23AF9E; font-size: x-large; border-radius: 5px;">Start</a>

            </div>
            <!--Grid column-->


        </div>
        <!--Grid row-->


    </section>


</div>






@endsection