
@if($todo->completed)
<i onclick="event.preventDefault();document.getElementById('form-incomplete-{{$todo->id}}').submit()" class="fas fa-check text-green-400 "></i>
<form style="display:none" id="{{'form-incomplete-'.$todo->id}}" method="post" action="{{route('todo.incomplete',$todo->id)}}">
@csrf
@method('delete')
</form>
@else
<i onclick="event.preventDefault();document.getElementById('form-complete-{{$todo->id}}').submit()" class="fas fa-check text-gray-300 cursor-pointer p-1"></i>
<form style="display:none" id="{{'form-complete-'.$todo->id}}" method="post" action="{{route('todo.complete',$todo->id)}}">
@csrf
@method('put')
</form>
@endif