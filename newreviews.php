  <label>Your review:</label>
  <input type="text" id="comment">
  <label>Rate book:</label>
  <select id="rate">
    <option name='1'>1</option>
    <option name='2'>2</option>
    <option name='3'>3</option>
    <option name='4'>4</option>
    <option name='5'>5</option>
    <option name='6'>6</option>
    <option name='7'>7</option>
    <option name='8'>8</option>
    <option name='9'>9</option>
    <option name='10'>10</option>
  </select>
  <br>
<button id='reviewButton' type="submit" name="create">Submit a Review</button>
<script>
$(document).ready(function(){
  $('#reviewButton').click(function(){
  let comment = '&comment='+$('#comment').val();
  let rate = 'rate=' + $('#rate').find('option:selected').val();
  let bookId = '&bookId=<?php echo $bookId; ?>';
  let query = rate+comment+bookId;
  $.ajax({
    type: "GET",
    url: "ajax.php",
    data: query,
    success: function(result){
      $("#show").append('<br>'+result);
    }
    }
  );
})
});
</script>
