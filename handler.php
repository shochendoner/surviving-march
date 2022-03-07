<HTML>



<select class="select1" name="select1" id="">
  <option value="this is line 2">this is line 2</option>
  <option value="this is line line">this is line line</option>
  <option value="this is line fine">this is line fine</option>
  <option value="help me">help me</option>
</select><select class="select2" name="" id="">
  <option value="this is line 2">this is line 2</option>
  <option value="this is line line">this is line line</option>
  <option value="this is line fine">this is line fine</option>
  <option value="help me">help me</option>
</select>
<script>
$('.select1').on('change',function(){
 var optionInSelect2 = $('.select2').find('option[value='+$(this).val()+']');
 if(optionInSelect2.length) {
   		$('.select2 option').removeAttr('disabled');
   		optionInSelect2.attr('disabled','disabled');
  }
});
</script>

</HTML>