@extends('todos.layout')

@section('content')
<div class="flex justify-center border-b pb-4">
<h1 class="text-2xl">All Your Todos<h1>
<a href="{{route('todos.create')}}" class="mx-5 py-5 px-1  cursor-pointer "><i class="fas fa-plus-circle"></i>
</a>

</div>
<ul class="my-5">

<x-alert/>
@if($todos->count() > 0)
@foreach($todos as $todo)

<li class="flex justify-between p-2">
<div>
@include('todos.completeButton')
</div>
@if($todo->completed)
<p class="line-through">{{$todo->title}}</p>
@else
<a class="cursor-pointer" href="{{route('todos.show',$todo->id)}}">{{$todo->title}}</a>
@endif
<div>
<a href="{{route('todos.edit',$todo->id)}}" class="text-red-400 cursor-pointer rounded">
<i class="fas fa-edit"></i></a>

<i class="fas fa-trash text-red-500 cursor-pointer px-4" 
onclick="event.preventDefault();
    if(confirm('Are you sure you really want to delete') )   {
    document.getElementById('form-delete-{{$todo->id}}')
    .submit()
    }"></i></div>
<!-- 
<a href="{{'/todos/'.$todo->id.'/edit'}}" class="mx-5 py-2 px-1 text-red-400 cursor-pointer rounded">
<i class="fas fa-trash text-red-500  px-2"></i></a> -->

<form style="display:none" id="{{'form-delete-'.$todo->id}}" method="post" action="{{route('todos.destroy',$todo->id)}}">
@csrf
@method('delete')
</form>

</li>
    @endforeach

    @else
<P>No task available, create one</p>
    @endif
    </ul>

@endsection

