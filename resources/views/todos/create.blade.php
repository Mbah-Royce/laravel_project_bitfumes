@extends('todos.layout')

@section('content')
<h1 class="text-2xl">what next you need to do<h1>
<x-alert/>
<form method="POST" action="{{route('todos.store')}}" class="py-5">
@csrf
<div class="py-1">
<input type="text" name="title" class="py-2  border-2 rounded" placeholder="Title"/>
</div>

<div class="py-1">
<textarea name="description"  class="p-2 border-2 rounded" placeholder="Description"></textarea>
</div>

@livewire('step')

<div class="py-1">
<input type="submit" value="create" class="p-2 border-4  rounded"/>
</div>

</form>

<a href="{{route('todos.index')}}" class="m-5 p-2 bg-white-400 cursor-pointer border rounded text-black">Back</a>
@endsection
