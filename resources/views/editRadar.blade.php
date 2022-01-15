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
<button class="edit-button" onclick="openPopupWindow()" style="margin-top:2%">
  <span>Edit entry</span>
</button>
<button class="edit-button" onclick="" style="background: #0078E7;margin-top:9%">
  <span>Save</span>
</button>
@endif

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
    } else {
      alert('A valid project must have at least two actors! Last slice could not be removed');
    }
  }

  // edit entries through popupwindow
  var popupWindow;
  var sharedObject = {};

  function openPopupWindow() {
    // pass number of slices through shared object
    sharedObject.slices = slices;
    // Open the popup window
    popupWindow = this.open('{{ route('editEntry') }}', 'Edit Radar Entry', 'resizable=yes,height=600,width=450,location=0,menubar=0,scrollbars=1');
    if (this.focus) {
      popupWindow.focus();
    }
  }

  function closePopupWindow() {
    popupWindow.close();
    // Retrieve the data from popup popupWindow
    var slice = sharedObject.slice;
    var ring = sharedObject.ring;
    var value = sharedObject.value;
    var changed = false;

    if (slice!=='' && ring!=='' && value!=='') {
      // Search entry in data
      data.forEach(function (entry) {
        if (entry.id === slice + '.' + ring) {
          if (ring==='4') {
            // Add slice number to changed actor name so user knows which slice is which
            value = value + ' (' + slice + ')';
          }
          entry.name = value;
          changed = true;
        }
      });
      if(!changed) {
        alert('Changes could not be executed. Make sure to enter a valid slice number. Current max number for slice is: ' + slices);
      } else {
        chart.data(data, "as-table");
      }
    } else {
      alert('Make sure to enter the number of the slice and the ring in which the entry to change is located as well as the new value of the entry');
    }
  }
</script>
@stop
