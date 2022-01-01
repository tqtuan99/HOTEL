<?php
$queryComment = "SELECT * FROM loaiphong";
$conn = $db_handle->connectDB();
$result = $conn->query($queryComment);
if ($result->num_rows > 0) {
   while ($row = $result->fetch_assoc()) {
      echo '<button name="typeRoom"  class="type-name" value="' . $row['idloaiphong'] . '">' . $row['tenloaiphong'] . '</button>';
   }
}