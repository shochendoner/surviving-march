<?php
  include_once 'header.php';
  include 'dbh.inc.php';
  
  $teamnow = $team->teamnow($conn);
  if(mysqli_num_rows($teamnow)){
   while($row = mysqli_fetch_array($teamnow)){
    $selectlist .= '<option value="'.$row['team_name'].'">'.$row['team_name'].'</option>';
   }
  }
?>
<select class="form-control" id="location_id" name="location_id[0]">
  <?php echo $selectlist; ?>
</option>
<button class="btn-sm btn btn-primary" type="button" onclick="addLocation()" >Add</button>
var loc = 0;

function updateSelect() {
  var selectedValue = [];
  $("select[name^='location_id']").each(function(index, element) {
    var value = $(element).val();
    if (value.length > 0) {
      selectedValue.push(value);
    }
  });

  $("select[name^='location_id'] option").attr("disabled", false);
  $("select[name^='location_id'] option").not(":selected").each(function(index, element) {
    if (selectedValue.indexOf($(element).val()) !== -1) {
      $(element).attr("disabled", true);
    }
  });
}

function addLocation() {

  var html = '';

  loc += 1;

  var numDisplay = loc + 1;

  html += '<div class="form-group">';

  html += '<button class="btn btn-danger btn-xs"onclick="$(this).closest(\'.form-group\').remove();updateSelect();" type=button><i class="fa fa-times"></i></button>&nbsp;';

  html += '<label for="location_id">Location ' + numDisplay + '</label>';

  html += '<select class="form-control" name="location_id[' + loc + ']" id="location_id">';

  html += '<option value="">---Please Select---</option><option value="1">Location A</option><option value="2">Location B</option><option value="3">Location C</option>';

  html += '</select>';

  html += '</div>';

  $('.locationRows').append(html);

  updateSelect();

}

$("body").on("change", "select[name^='location_id']", function(e) {
  updateSelect();
});

<select class="form-control" id="location_id" name="location_id[0]">
  <option value="">---Please Select---</option>
  <option value="1">Location A</option>
  <option value="2">Location B</option>
  <option value="3">Location C</option>
</select>

<button class="btn-sm btn btn-primary" type="button" onclick="addLocation()">Add</button>

<div class="locationRows"></div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
