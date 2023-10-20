@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">  
        @auth
       @include('layouts.header')
        <h1>Your wish to play with {{$_POST['house']}}'s players:</h1>
       <form method="POST" action="/store-match">
        @csrf
        <input type="hidden" name="player_id" value="{{$player_id}}"/>
        @foreach($userlist as $item)
        <input type="checkbox" value="{{$item->id}}" id="{{$item->id}}" name="playalong_id[]">{{$item->name}}
        @endforeach
        <br>
        <label>Choose any curse spell to kill:</label>
        <select name="spell_id">
            <option value="0">--Not Suitable--</option>
        @foreach($spellslist as $spellItem)
          <option value="{{$spellItem['id']}}">{{$spellItem['name']}}</option>
          @endforeach
        </select>
        <input type="submit" name="submit" value="Submit"/>
       </form>
       @endauth
    </div>
@endsection

