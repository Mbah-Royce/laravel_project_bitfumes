<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo; 
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\TodoCreateRequest;
use App\Http\Controllers\auth;

class TodoController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except('index');
    }
    
    public function index(){
       // $todos = Todo::all();
        // return view('todos.index')->with(['todos'=>$todos]);or
        $todos= auth()->user()->todos()->orderBy('completed')->get();
        // $todos = Todo::orderBy('completed')->get();
        return view('todos.index',compact('todos'));
    }

    public function create(){
        return view('todos.create');
    }

    public function edit(Todo $todo){
        //dd($todo->title);
        //$todo = Todo::find($id);
        return view('todos.edit',compact('todo'));
    }

    public function store(TodoCreateRequest $request){
         //dd($request->all());
        // if(!$request->title){
        //     return redirect()->back()->with('error','Todo Not Created'); in case of many field this method is disadvantgoues
        // }

        //$request->validate([
            //'title' => 'required|max:255'
        //]);//this method of validation make sure in case of any error then the next line of code is not executed,validation rules work 
        //in order of appearance

        // $rules =[
        //     'title' => 'required|max:255'
        // ];
        // $messages =[
        //     'title.max' => 'Todo title should not be greater than 255 char'
        // ];
        // $validator = Validator::make($request->all(),$rules,$messages);
        // if($validator->fails()){
        //     return redirect()->back()->withErrors($validator)->withInput();
        // }
        //Todo::create($request->all());
        auth()->user()->todos()->create($request->all());
        return redirect()->back()->with('message','Todo successfully created');
        
    }

    public function update(TodoCreateRequest $request, Todo $todo){
        //dd($request->all());
        $todo->update(['title'=> $request->title]);
        $todo->update(['description'=> $request->description]);
        return redirect(route('todos.index'))->with('message','updated');
    }

    public function complete(Todo $todo){
        
        $todo->update(['completed'=>true]);
        return redirect()->back()->with('message','Todo Marked Completed');
    }

    public function incomplete(Todo $todo){
        
        $todo->update(['completed'=>false]);
        return redirect()->back()->with('message','Todo Marked incompleted');
    }

    public function destroy(Todo $todo){
        $todo->delete();
        return redirect()->back()->with('message','Todo Deleted Successfully');


    }

    public function show(Todo $todo){
        return view('todos.show',compact('todo'));
    }
}
