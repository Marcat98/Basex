@extends('layouts.master')

@section('content')

@if(session()->has('loggedin'))

  <!-- TODO: check if logged in user is moderator -->

  <div class="main">
    <p class="sign" align="center">Create new project:</p>
    <form class="form1" method="post" action="{{ route('createRadar') }}">
      @csrf
      <input class="un" type="text" align="center" placeholder="Project Name" name="name">
      <input class="un" type="text" align="center" placeholder="Description" name="description">
      <input type="submit" class="submit" align="center" value="Save"/>
  </div>

@else

@endif
@stop
