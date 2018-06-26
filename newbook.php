<label>Author:</label>
<input type="text" id="newAuthor">
<label>Book Name:</label>
<input type="text" id="newBook">
<br>
<button type="submit" id="createBook">Create</button>
<script>
$(document).ready(function() {
  $('#createBook').click(function() {
  let newAuthor = 'newAuthor='+$('#newAuthor').val();
  let newBook = '&newBook=' + $('#newBook').val();
  let query = newAuthor+newBook;
  $.ajax ({
    type: "GET",
    url: "ajax.php",
    data: query,
    success: function(result){
      if (result !== 'false') {
        $('#selectBook')
        .prepend($("<option></option>")
                .attr("value",result)
                .text($('#newAuthor').val()+' '+$('#newBook').val()));
                $("#selectBook").prop("selectedIndex", 0);
                $.ajax({
                  type: "GET",
                  url: "ajax.php",
                  data: 'id='+result,
                  success: function(result){
                    $("#show").html(result);
                  }
                  }
                );
      }
    }
    });
})
});
</script>
