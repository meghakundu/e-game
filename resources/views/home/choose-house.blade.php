@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">  
        @auth
        @include('layouts.header')
        <h1>You wish to play with</h1>
        <form method="POST" action="/play-along">
            @csrf
             @php
             $arr_houses = array();
             @endphp
            @foreach($other_house as $item)
            @php
            $arr_houses[] = $item['house'];
            @endphp
           @endforeach
           @php
           $arr_unique = array_unique($arr_houses);
           @endphp
           <select id="history" onchange="SubjectChanged(this);">
            @foreach($arr_unique as $item)
            <option value="{{$item}}">{{$item}}
            </option>
            @endforeach
           </select>
           <input type="hidden" id="inputBox" name="house"/>
        <input type="submit" value="Choose" name="submit"/>
        </form>
       @endauth
    </div>
    <script type="text/javascript">
      function SubjectChanged(Subject){
  console.log(Subject.value);
   $('#inputBox').val(Subject.value);
   }   
    </script>
@endsection

