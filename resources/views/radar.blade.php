@extends('layouts.master')

@section('content')

<figure class="highcharts-figure">
    <div id="container"></div>
</figure>

<script>
  var data = {!! $data !!};
  var chart = anychart.sunburst(data, "as-table");
  var level = chart.level(4);
  chart.labels().position("circular");
  // set the container id
  chart.container("container");
  chart.level(1).normal().fill("#96a6a6", 0.4);
  //chart.normal().fill("#96a6a6", 0.4);
  level.labels({fontColor: 'gray', fontWeight: 600});
  chart.interactivity().selectionMode("single-select");
  // initiate drawing the chart
  chart.title('Project Name: '+'{!! $title !!}');
  chart.draw();
</script>

@stop
