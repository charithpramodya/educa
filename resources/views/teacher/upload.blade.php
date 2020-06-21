@extends('layouts.main')

@section('content')
<div class="container my-5">
            <div class="card mb-4 wow fadeIn">

                <form action="{{route('post-upload-form')}}" method="POST" enctype="multipart/form-data">
                    
                    @csrf
                    <input type="file" name="image" >

                    <input type="submit" name="submit" value="Submit">
                </form>

            </div>

            @if(isset($imgPath))
                <img src="{{URL::asset($imgPath)}}" name="img">
            
            @endif
</div>

@endsection 