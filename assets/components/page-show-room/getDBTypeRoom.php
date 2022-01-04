<?php
$t = '';
if(isset($_GET['typeRoom'])) $t=$_GET['typeRoom'];
$queryComment = "SELECT * FROM loaiphong";
$conn = $db_handle->connectDB();
$result = $conn->query($queryComment);
if ($result->num_rows > 0) {
   while ($row = $result->fetch_assoc()) {
      if($t == $row["idloaiphong"])
         echo '<button   form="formSearch" name="typeRoom"  class="type-name focus" value="' . $row['idloaiphong'] . '">' . $row['tenloaiphong'] . '</button>';
      else 
         echo '<button   form="formSearch" name="typeRoom"  class="type-name" value="' . $row['idloaiphong'] . '">' . $row['tenloaiphong'] . '</button>';
   }
}
?>
