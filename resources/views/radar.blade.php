@extends('layouts.master')

@section('content')


<figure class="highcharts-figure">
    <div id="container"></div>
</figure>

@if(App\Models\User::where('username',session()->get('user'))->first()->isModerator())
<a href="{{ route('editRadar', ['radarId' => request()->radarId]) }}">
  <button class="btn" style="width:10%;margin-top:32%;background-color: #8C8C8C;">
    <span>Edit Project</span></button>
</a>
@endif

<script>
  var data = {!! $data !!};
  var chart = anychart.sunburst(data, "as-table");
  var level = chart.level(4);
  chart.labels().position("circular");
  chart.level(1).normal().fill("#96a6a6", 0.4);
  //chart.normal().fill("#96a6a6", 0.4);
  level.labels({fontColor: 'gray', fontWeight: 600});
  chart.interactivity().selectionMode("single-select");
  chart.title('Project Name: '+'{!! $title !!}');
  // set the container id
  chart.container("container");
  // initiate drawing the chart
  chart.draw();
</script>
@stop
