<?php
$conn = mysqli_connect("localhost", "root", "", "data");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Delete Data with jQuery Ajax</title>
    <!-- jQuery -->
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    </script>
  </head>
  <body>
    <?php
    $rows = mysqli_query($conn, "SELECT * FROM tb_data");
    ?>
    <h2>Concept : Data with female gender cannot be deleted</h2>
    <table border = 1 cellspacing = 0 cellpadding = 10>
      <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Gender</th>
        <th>Action</th>
      </tr>
    <?php foreach($rows as $row) : ?>
      <tr id = "<?php echo $row["id"]; ?>">
        <td><?php echo $row["id"]; ?></td>
        <td><?php echo $row["name"]; ?></td>
        <td><?php echo $row["gender"]; ?></td>
        <td> <button type="button" name="button" onclick = "deletedata(<?php echo $row['id']; ?>);">Delete</button> </td>
      </tr>
    <?php endforeach; ?>
    </table>
    <script type="text/javascript">
      // Function
      function deletedata(id){
        $(document).ready(function(){
          $.ajax({
            // Action
            url: 'function.php',
            // Method
            type: 'POST',
            data: {
              // Get value
              id: id,
              action: "delete"
            },
            success:function(response){
              // Response is the output of action file
              if(response == 1){
                alert("Data Deleted Successfully");
                document.getElementById(id).style.display = "none";
              }
              else if(response == 0){
                alert("Data Cannot Be Deleted");
              }
            }
          });
        });
      }
    </script>
  </body>
</html>
