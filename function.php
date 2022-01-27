<?php
$conn = mysqli_connect("localhost", "root", "", "data");

if(isset($_POST["action"])){
  // Choose a function depends on value of $_POST["action"]
  if($_POST["action"] == "delete"){
    delete();
  }
}

function delete(){
  global $conn;

  $id = $_POST["id"];

  $rows = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tb_data WHERE id = $id"));

  // Data with female gender
  if($rows["gender"] == "Female"){
    echo 0;
    exit;
  }

  mysqli_query($conn, "DELETE FROM tb_data WHERE id = $id");
  echo 1;
}
