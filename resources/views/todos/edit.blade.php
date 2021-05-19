@extends('todos.layout')

@section('content')
<h1 class="text-2xl border-b pb-4">Updat This Todo List<h1>   
<x-alert/>
<form method="POST" action="{{route('todos.update',['todo'=>$todo->id])}}" class="py-5 border">
@csrf
@method('patch')
<div>
<input type="text" name="title" value="{{$todo->title}}" class="py-2  border-2 rounded" placeholder="Title"/>
</div>

<div class="py-1">
<textarea name="description" class="p-2 border-2 rounded" placeholder="Description"> {{$todo->description}}</textarea>
</div>

<div class="py-1">
<input type="submit" value="Update" class="p-2 border-4 rounded"/>
</div>
</form>

<a href="{{route('todos.index')}}" class="m-5 p-2 bg-white-400 cursor-pointer border rounded text-black">Back</a>
@endsection