@extends('todos.layout')

@section('content')
<div class="flex justify-center border-b pb-4 px-4">
<h1 class="text-2x1 pb-4">{{$todo->title}}</h1>
<a href="{{route('todos.index')}}" class="mx-5 py-2 text-gray-400 cursor-pointer text-white">
<i class="fas fa-arrow-left"></i></a>
</div>
<div>
        <div>

                <p>{{$todo->description}}</p>
        </div>

</div>
@endsection