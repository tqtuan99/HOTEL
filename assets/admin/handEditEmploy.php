<?php
include('../components/handle/configDB.php');
$gender = '';
$rowAllEmploy = '';
if (isset($_GET['idEmploy']) && !empty($_GET['idEmploy'])) {
    $idE = $_GET['idEmploy'];
    $query = 'SELECT * FROM nhanvien WHERE idnhanvien = ' . $_GET['idEmploy'];
    $result = $conn->query($query);
    $rowAllEmploy = $result->fetch_assoc();
    $gender = $rowAllEmploy['gioitinh'];
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
        <!--begin modal edit employ -->
        <div aria-hidden="true" class="overflow-y-auto overflow-x-hidden fixed z-50 justify-center items-center h-modal md:h-full inset-0 bg-gray-600 bg-opacity-50">
            <div class="relative w-full max-w-lg md:h-auto">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <div class="flex justify-end">
                        <a href="../admin/adminHome.php?q=employ"><button type="button" class="close-modal-employ text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="authentication-modal">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                            </button></a>
                    </div>
                    <form class="px-6 pb-2 space-y-6 lg:px-8 " action="#" method="POST" enctype="multipart/form-data">
                        <h3 class="text-4xl text-center font-medium text-gray-900 dark:text-white">Edit Employee</h3>
                        <div>
                            <input type="hidden" name="idE" value="<?php echo $idE ?>">
                            <label for="name" class="mb-1 block text-sm font-medium text-gray-900 dark:text-gray-300">Full name</label>
                            <input type="text" name="name" id="name" value="<?php echo $rowAllEmploy['hotennv'] ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Nguyen Van A" required>
                        </div>
                        <div style="display: flex; align-items: center; margin-top: 12px;">
                            <label class="block text-sm font-medium text-gray-900 dark:text-gray-300">Gender:</label>

                            <input type="radio" name="gender" <?php echo $gender == 'male' ? 'checked' : ''; ?> value="male" id="gender" class="bg-gray-50 border w-40 -mr-6 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                            <label class="block text-sm text-gray-900 dark:text-gray-300">Male</label>

                            <input type="radio" name="gender" <?php echo $gender == 'female' ? 'checked' : ''; ?> value="female" id="gender" class="bg-gray-50 border w-40 -mr-6 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                            <label class="block text-sm text-gray-900 dark:text-gray-300">Female</label>

                            <input type="radio" name="gender" <?php echo $gender == 'other' ? 'checked' : ''; ?> value="other" id="gender" class="bg-gray-50 border w-40 -mr-6 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                            <label class="block text-sm text-gray-900 dark:text-gray-300">Other</label>
                        </div>
                        <div style="display: flex; align-items: center; margin-top: 12px;">
                            <label class="block text-sm font-medium text-gray-900 dark:text-gray-300">Position:</label>

                            <input type="radio" name="position" <?php echo $rowAllEmploy['chucvu'] == '1' ? 'checked' : ''; ?> value="1" id="position" class="bg-gray-50 border w-40 -mr-12 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                            <label class="block text-sm text-gray-900 dark:text-gray-300">Admin</label>

                            <input type="radio" name="position" <?php echo $rowAllEmploy['chucvu'] == '0' ? 'checked' : ''; ?> value="0" id="position" class="bg-gray-50 border w-40 -mr-12 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                            <label class="block text-sm text-gray-900 dark:text-gray-300">Employee</label>

                        </div>
                        <div style="margin-top: 8px !important">
                            <label for="phone" class="mb-1 block text-sm font-medium text-gray-900 dark:text-gray-300">Phone</label>
                            <input type="text" value="<?php echo $rowAllEmploy['sodienthoai']; ?>" name="phone" id="phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="033456789" required>
                        </div>
                        <div style="margin-top: 8px !important">
                            <label for="id" class="mb-1 block text-sm font-medium text-gray-900 dark:text-gray-300">ID</label>
                            <input type="text" name="id" value="<?php echo $rowAllEmploy['socccd']; ?>" id="id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="0123456789" required>
                        </div>
                        <div style="margin-top: 8px !important">
                            <label for="dob" class="mb-1 block text-sm font-medium text-gray-900 dark:text-gray-300">Day of birth</label>
                            <input type="date" name="dob" value="<?php echo $rowAllEmploy['ngaysinh']; ?>" id="dob" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="01-01-2000" required>
                        </div>
                        <div style="margin-top: 8px !important">
                            <label for="email" class="mb-1 block text-sm font-medium text-gray-900 dark:text-gray-300">Email</label>
                            <input type="email" name="email" value="<?php echo $rowAllEmploy['email']; ?>" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="name@company.com" required>
                        </div>
                        <div style="margin-top: 8px !important">
                            <label for="address" class="mb-1 block text-sm font-medium text-gray-900 dark:text-gray-300">Address</label>
                            <input type="text" name="address" value="<?php echo $rowAllEmploy['diachi']; ?>" id="address" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="name@company.com" required>
                        </div>

                        <div style="margin-top: 8px !important">
                            <span for="image" class="mb-1 block text-sm font-medium text-gray-900 dark:text-gray-300">Choose avatar</span>
                            <input type="hidden" name="size" value="1000000">
                            <input type="hidden" name="supImg" value="<?php echo $rowAllEmploy['avatar']; ?>">
                            <input id="image" name="image" type="file" class="block w-full text-sm text-gray-500
                                       file:mr-4 file:py-2 file:px-4
                                       file:rounded-full file:border-0
                                       file:text-sm file:font-semibold
                                       file:bg-violet-50 file:text-violet-700
                                       hover:file:bg-violet-100
                                       " />
                            <img style="height: 100px; margin-top: 3px;" src="../photo/avatar/<?php echo $rowAllEmploy['avatar']; ?>" alt="">
                        </div>

                        <div style="display: flex; margin-bottom: 8px !important;">
                            <button type="submit" name="editEmploy" id="" onclick="return confirm('Are you sure you want to update this employee?'); getLocation2(1)" class=" w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update Employ</button>
                            <div type="submit" name="cancel" class="close-modal-employ cursor-pointer w-full text-white ml-3 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Cancel</div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- end modal edit employ -->
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
</body>

</html>