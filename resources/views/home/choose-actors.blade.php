@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">  
        @auth
        @include('layouts.header')
        <h1>You will play as</h1>
        <form method="POST" action="/allot-users/{{auth()->user()->id}}">
            @csrf
            @method('PUT')
        <select name="actor_id">
            @foreach($actors as $actor)
            <option value="{{$actor->id}}" id="{{$actor->id}}">{{$actor->name}}</option>
            @endforeach
        </select>
        <input type="submit" value="Choose" name="submit"/>
        </form>
        
        @endauth
    </div>
@endsection
