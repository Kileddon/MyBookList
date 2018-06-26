<button type='submit' id='deleteId'>Delete book</button>
<script>
 $(document).ready(function() {
   $('#deleteId').click(function() {
     let deleteId = '&deleteId=<?php echo $bookId; ?>';
     $.ajax ({
       type: "GET",
       url: "ajax.php",
       data: deleteId,
       success: function(data) {
           location.reload();
       }
     });
   })
 });
</script>
