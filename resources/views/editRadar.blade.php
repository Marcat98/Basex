@extends('layouts.master')

@section('content')


<figure class="highcharts-figure">
    <div id="container"></div>
</figure>

@if(App\Models\User::where('username',session()->get('user'))->first()->isModerator())
<button class="edit-button" onclick="addSlice()" style="margin-top:12%">
  <span>Add Slice</span>
</button>
<button class="edit-button" onclick="popSlice()" style="margin-top:2%">
  <span>Remove last slice</span>
</button>
<button class="edit-button" onclick="" style="margin-top:2%">
  <span>Edit entry</span>
</button>
<button class="edit-button" onclick="" style="background: #0078E7;margin-top:9%">
  <span>Save</span>
</button>
@endif
<!-- <div class="share-link">
  <a href="javascript:;" class="btn open-modal">Share Link</a>
</div>
  <div class="modal">
    <div class="modal_head">
      <h2 class="modal_title">Share.</h2>
      <a href="javascript:;" class="modal_close">
        <i class='bx bx-x'></i>
      </a>
    </div>
    <div class="modal_body">
      <h3 class="modal_name">Share this link:</h3>
      <div class="modal_label">
        <input type="text" class="modal_input" value="file:///C:/Users/Max/Documents/Master%20DS/Projects/Project%201/Web/projects.html">
        <button class="link-btn">Copy</button>
      </div>
    </div>
  </div>
  <script src="{{ asset('js/script.js') }}"></script> -->
<script>
  // Initialise chart
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

   // Number of slices
   var slices = Number(data[data.length-1].id.split('.')[0]);
   console.log(slices);


  // This function takes the number of the last slice and adds a new slice based on that number
  function addSlice() {
    var lastIndex = data[data.length-1].id.split('.');
    var index = Number(lastIndex[0]) + 1;
    var firstId = index + '.1';
    var secondId = index + '.2';
    var thirdId = index + '.3';
    var fourthId = index + '.4';
    var avp = 'Actor Value Proposition ' + index;
    var aca = 'Actor co-production activity ' + index;
    var acb = 'Actor cost/benefit ' + index;
    var act = 'Actor ' + index;
    data.push(
      {name: avp, parent: '0.0', id: firstId},
			{name: aca, parent: firstId, id: secondId},
			{name: acb, parent: secondId, id: thirdId},
			{name: act, normal: {fill: "white"}, parent: thirdId, id: fourthId}
    );
    chart.data(data, "as-table");
    slices++;
    console.log(slices);
  }

  // removes the last added slice
  function popSlice() {
    if (slices > 2) {
      data.pop(); // remove all 4 entries corresponding to this slice
      data.pop();
      data.pop();
      data.pop();
      chart.data(data, "as-table");
      slices--;
      console.log(slices);
    } else {
      alert('A valid project must have at least two actors! Last slice could not be removed');
    }
  }
</script>
@stop
