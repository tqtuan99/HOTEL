<?php
include('../components/handle/configDB.php');
    if(isset($_GET['idRoom']) && !empty($_GET['idRoom'])) {
         $idR = $_GET['idRoom'];
        $query = 'SELECT * FROM PHONG WHERE idphong = '.$_GET['idRoom'];
        $result = $conn->query($query);
        $rowAllRoom = $result->fetch_assoc();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styleAdmin.css">
    <link rel="stylesheet" href="../../output.css">
    <title>Document</title>
</head>
<body>
<center>
     <!-- begin modal edit room -->
<div div aria-hidden="true" class="my-modal-edit-room overflow-y-auto overflow-x-hidden fixed z-50 justify-center items-center h-modal md:h-full inset-0 bg-gray-600 bg-opacity-50">
   <div class="relative w-full max-w-lg md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <div class="flex justify-end">
                <a href="./adminHome.php?q=room"><button type="button" class="close-modal-room text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="authentication-modal">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
                </a>
            </div>
            <form class="px-6 pb-2 space-y-6 lg:px-8 " action="" method="POST" enctype="multipart/form-data">
                <input type="hidden" value="<?php echo $idR?>" name="idR">
                <h3 class="text-4xl text-center font-medium text-gray-900 dark:text-white">Update Room</h3>
                <div>
                    <label for="nameR" class="mb-1 block text-sm font-medium text-gray-900 dark:text-gray-300">Room Name</label>
                    <input type="text" name="nameR" id="nameR" value="<?php echo $rowAllRoom['tenphong']?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="NORMAL PH101" required>
                </div>
                <div style="display: flex; align-items: center; margin-top: 12px;">
                    <label class="block text-sm font-medium text-gray-900 dark:text-gray-300">Type:</label>
                    <?php
                    $queryTypeRoom = "SELECT * FROM loaiphong";
                    $result = $conn->query($queryTypeRoom);
                    if ($result)
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                    if($rowAllRoom['idloaiphong'] == $row['idloaiphong'])
                                        echo '
                                            <input type="radio"  name="typeR" checked value="' . $row['idloaiphong'] . '" id="' . $row['tenloaiphong'] . '" 
                                            class="bg-gray-50 border w-40 -mr-6 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                                                    <label for="' . $row['tenloaiphong'] . '" class="block text-sm text-gray-900 dark:text-gray-300">' . $row['tenloaiphong'] . '</label>
                                            ';
                                    else
                                        echo '
                                            <input type="radio"  name="typeR" value="' . $row['idloaiphong'] . '" id="' . $row['tenloaiphong'] . '" 
                                            class="bg-gray-50 border w-40 -mr-6 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                                                    <label for="' . $row['tenloaiphong'] . '" class="block text-sm text-gray-900 dark:text-gray-300">' . $row['tenloaiphong'] . '</label>
                                            ';
                            }
                        }
                    ?>
                </div>
                <div style="display: flex; align-items: center; margin-top: 12px;">
                    <div style="margin: 10px; width: 100px;">

                        <label for="Flo" class="text-center block text-sm font-medium text-gray-900 dark:text-gray-300">Floor</label>
                        <input type="number" name="Flo" value="<?php echo $rowAllRoom['tang']; ?>" id="Flo" min="1" max="20" class="text-center bg-gray-50 border w-40 -mr-12 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                    </div>

                    <div style="margin: 10px; width: 100px;">
                        <label for="Peo" class="text-center block text-sm font-medium text-gray-900 dark:text-gray-300">People</label>
                        <input type="number" name="Peo" value="<?php echo $rowAllRoom['songuoi']; ?>" id="Peo" min="1" max="20" class="text-center bg-gray-50 border w-40 -mr-12 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                    </div>

                    <div style="margin: 10px; width: 100px;">
                        <label for="Bed" class="text-center block text-sm font-medium text-gray-900 dark:text-gray-300">Bed</label>
                        <input type="number" name="Bed" id="Bed" value="<?php echo $rowAllRoom['sogiuong']; ?>" min="1" max="20" class="text-center bg-gray-50 border w-40 -mr-12 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                    </div>

                    <div style="margin: 10px; width: 100px;">
                        <label for="Ba" class="text-center block text-sm font-medium text-gray-900 dark:text-gray-300">Bathtub</label>
                        <input type="number" name="Ba" id="Ba" value="<?php echo $rowAllRoom['sobontam']; ?>" min="1" max="20" class="text-center bg-gray-50 border w-40 -mr-12 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                    </div>
                </div>
                <div style="margin-top: 8px !important">
                    <label for="Lo" class="mb-1 block text-sm font-medium text-gray-900 dark:text-gray-300">Location</label>
                    <input type="text" name="Lo" value="<?php echo $rowAllRoom['vitri']; ?>" id="Lo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Sea ​​views..." required>
                </div>
                <div style="margin-top: 8px !important">
                    <label for="Des" class="mb-1 block text-sm font-medium text-gray-900 dark:text-gray-300">Description</label>
                    <textarea cols="40" rows="5" type="text" name="Des" id="Des" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Luxury bedroom..." required><?php echo $rowAllRoom['mota']; ?></textarea>
                </div>
                <div style="margin-top: 8px !important">
                    <label for="Pri" class="mb-1 block text-sm font-medium text-gray-900 dark:text-gray-300">Unit price</label>
                    <input type="number" min="100000" value="<?php echo $rowAllRoom['dongia']; ?>" step="100000" name="Pri" id="Pri" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="1.000.000" required>
                </div>
                <div style="margin-top: 8px !important">
                    <span for="image" class="mb-1 block text-sm font-medium text-gray-900 dark:text-gray-300">Choose room photo</span>
                    <input type="hidden" name="size" value="1000000">
                    <input type="hidden" name="supImg" value="<?php echo $rowAllRoom['anh']; ?>">
                       <input id="image"  name="image" type="file" class="block w-full text-sm text-gray-500
                                       file:mr-4 file:py-2 file:px-4
                                       file:rounded-full file:border-0
                                       file:text-sm file:font-semibold
                                       file:bg-violet-50 file:text-violet-700
                                       hover:file:bg-violet-100
                                       " 
                                       />
                        <img style="height: 100px; margin-top: 3px;" src="../photo/room/<?php echo $rowAllRoom['anh']; ?>" alt="">
                </div>
                <div style="display: flex; margin-bottom: 8px !important;">
                    <button name="editRoom" onclick="return confirm('Are you sure you want to edit this room?')" class=" w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update Room</button>
                    <div name="cancel" class="cursor-pointer close-modal-room w-full ml-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Cancel</div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
<?php 
include('../components/handle/update.php');
?>
</script>

<script>
      if (window.history.replaceState) {
         window.history.replaceState(null, null, window.location.href);
      }
   </script>
</center>
<!-- end modal edit room -->
</body>
</html>