<?php
require_once  __DIR__ . '/connect.php';
$submitBtn = isset($_POST['submit']) ? $_POST['submit'] : "";
$nameError = $emailError = $usernameError = $passwordError = $genderError = $languageError = $ageError = $educationError = $profileError =$roleError= '';
$oldName = '';

if (isset($submitBtn) and !empty($submitBtn)) {
    $name = trim($_POST['name']);
    $oldName = trim($_POST['name']);
    if ($name == '') {
        $nameError = "Name Field is required";
    }
    $email = trim($_POST['email']);

    if ($email == '') {
        $emailError = "Email filed is required ";
    }
    $username = trim($_POST['username']);
    if ($username == '') {
        $usernameError = "Username field is required";
    }
    $password = trim($_POST['password']);
    $hashed_password = md5($password);
    if ($password == '') {
        $passwordError = "Password field is required";
    }
    $gender = @$_POST['gender'];
    if ($gender == '') {
        $genderError = "Gender field is required";
    }
    $language = trim($_POST['language']);
    if ($language == '') {
        $languageError = "language field is required";
    }

    $education = @$_POST['education'];
    if ($education == '') {
        $educationError = "Education field is required";
    }

    if (is_array($education)) {
        $selected_education = implode(",", $education);
    }
    $age = trim($_POST['age']);
    if ($age == '') {
        $ageError = "Age field is required";
    }

    $newFileName = '';

    $folderName = 'uploads/';
    $profile = $_FILES['profile']['name'];
    if ($profile == '') {
        $profileError = "Profile field is required ";
    }
    if (!empty($profile)) { 
        $temp_name = $_FILES['profile']['tmp_name'];
        $ext = pathinfo($profile, PATHINFO_EXTENSION);
        // echo($ext);
        $newFileName = "photo" . rand() . "." . $ext;
        //  echo $newFileName;
        move_uploaded_file($temp_name, $folderName . $newFileName);
    }
    $role =$_POST['role'];
    if($role==''){
        $roleError = "Role filed is required";
    }
    if ($role!==''&& $name != '' && $email != '' && $username != '' && $hashed_password != '' && $gender != '' && $age != '' && $language != '' && $selected_education != '' && $newFileName != '') {
        $sql = "INSERT INTO users(role_id , name , email , username , password , gender , profile , language_id , education , age ) values ('".$role."','" . $name . "','" . $email . "', '" . $username . "','" . $hashed_password . "', '" . $gender . "', '" . $newFileName . "','" . $language . "' ,'" . $selected_education . "', '" . $age . "')";
        if (mysqli_query($conn, $sql)) {
            header("location:record.php");
            $_SESSION['message'] = "Insert data successfully";
            $_SESSION['status'] = "success";
        } else {
            echo "not insert data";
        }
    }
}
?>

<?php include('static/header.php') ?>


<div class="container">
    <div class="row mt-3 ">
        <div class="col-lg-3"></div>
        <div class="col-lg-6 p-4 card">
            <form action="" method="POST" enctype="multipart/form-data">
                <h3 class="text-center text-danger">Registration Form</h3>
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" value="<?= $oldName ?>" />
                    <span class="text-danger"><?= $nameError ?></span>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" />
                    <span class="text-danger"><?= $emailError ?></span>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Username</label>
                    <input type="email" name="username" class="form-control" />
                    <span class="text-danger"><?= $usernameError ?></span>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" />
                    <span class="text-danger"><?= $passwordError ?></span>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Gender</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="1">
                        <label class="form-check-label" for="inlineRadio1">Male</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="0">
                        <label class="form-check-label" for="inlineRadio2">Female</label>
                    </div> </br>
                    <span class="text-danger"><?= $genderError ?></span>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label"> Profile</label>
                    <input type="file" name="profile" accept="image/*" class="form-control">
                    <span class="text-danger"><?= $profileError ?></span>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Language</label>
                    <select name="language" class="form-control">
                        <option value="">-- Select Language --</option>
                        <?php
                        $sql = "SELECT * FROM language WHERE del_action='N'"; 
                        $mysqlSet = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($mysqlSet)) { ?>
                                <option value="<?=$row['id'] ?>">
                                    <?=$row['name']; ?>
                                </option>
                        <?php } ?>
                    </select>
                    <span class="text-danger"><?= $languageError ?></span>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Role</label>
                    <select name="role" class="form-control">
                        <option value="">-- Select Role --</option>
                        <?php
                        $roleSql = "SELECT * FROM roles"; 
                        $roleMysqlSet = mysqli_query($conn, $roleSql);
                            while ($roleRow = mysqli_fetch_assoc($roleMysqlSet)) { ?>
                                <option value="<?=$roleRow['role_id'] ?>"> <?=$roleRow['name']; ?></option>
                            <?php } ?>
                    </select>
                  <span class="text-danger"><?=$roleError;?></span>
                </div>

                <div class="mb-3">
                    <label for="">Education</label> </br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" name="education[]" type="checkbox" id="inlineCheckbox1" value="10th">
                        <label class="form-check-label" for="inlineCheckbox1">10th</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" name="education[]" type="checkbox" id="inlineCheckbox1" value="12th">
                        <label class="form-check-label" for="inlineCheckbox1">12th</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" name="education[]" type="checkbox" id="inlineCheckbox1" value="Polytechnic">
                        <label class="form-check-label" for="inlineCheckbox1">Polytechnic</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" name="education[]" type="checkbox" id="inlineCheckbox1" value="B.tech">
                        <label class="form-check-label" for="inlineCheckbox1">B.tech</label>
                    </div> </br>
                    <span class="text-danger"><?= $educationError ?></span>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label"> Age</label>
                    <input type="tel" name="age" class="form-control" />
                    <span class="text-danger"><?= $ageError ?></span>
                </div>
                <div class="mb-3">
                    <input type="submit" name="submit" class="form-control btn btn-primary">
                </div>
            </form>
        </div>
        <div class="col-lg-3"></div>
    </div>
</div>

<?php include('static/footer.php') ?>