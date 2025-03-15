<?php
require_once __DIR__ . '/connect.php';
$pkid = isset($_GET['id']) ? $_GET['id'] : '';
$sql = "SELECT * FROM users  where id ='" . $pkid . "'";
$mysqlSet = mysqli_query($conn, $sql);
//update code 
$submitBtn = isset($_POST['submit']) ? $_POST['submit'] : "";
$nameError = $emailError = $usernameError = $genderError = $languageError = $ageError = $educationError = $profileError =$roleError= '';

if (isset($submitBtn) and !empty($submitBtn)) {

    $name = trim($_POST['name']);
    $id = $_POST['id'];

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
    $oldImage = trim($_POST['oldImage']);
    $newFileName = $oldImage;
    if (!empty($_FILES['profile']['name'])){
        $folderName = 'uploads/';
        $profile = $_FILES['profile']['name'];
       
        $temp_name = $_FILES['profile']['tmp_name'];
        $ext = pathinfo($profile, PATHINFO_EXTENSION);  
      $newFileName = "photo" . rand() . "." . $ext;
        move_uploaded_file($temp_name, $folderName . $newFileName);
    }
    $role=$_POST['role'];
    if($role==''){
        $roleError="This filed is required";
    }
  if ($role!='' && $name != '' && $email != '' && $username != ''  && $gender != '' && $age != '' && $language != '' && $selected_education != '') {
        //   $sql = "INSERT INTO users(name , email , username , password , gender , profile , language , education , age ) values ('" . $name . "','" . $email . "', '" . $username . "','" . $hashed_password . "', '" . $gender . "', '" . $newFileName . "','" . $language . "' ,'" . $selected_education . "', '" . $age . "')";
        $sql = "UPDATE users set role_id='".$role."' , name = '" . $name . "' , email = '" . $email . "' , username = '" . $username . "' , gender = '" . $gender . "', profile= '".$newFileName."',  language_id = '" . $language . "', education ='" . $selected_education . "' , age='" . $age . "' , del_action='N'  where id = '" . $id . "'";

        if (mysqli_query($conn, $sql)) {
            header("location:record.php");
            $_SESSION['message']="Record is update successfully";
            $_SESSION['status']="warning";
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
                    <?php $row = mysqli_fetch_assoc($mysqlSet) ?>
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" value="<?= $row['name'] ?>" />
                        <input type="hidden" name="id" class="form-control" value="<?= $row['id'] ?>" />
                        <span class="text-danger"><?=$nameError ?></span>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Email</label>
                        <input type="email" name="email" value="<?= $row['email'] ?>" class="form-control" />
                        <span class="text-danger"><?=$emailError ?></span>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Username</label>
                        <input type="email" value="<?= $row['username'] ?>" name="username" class="form-control" />
                        <span class="text-danger"><?=$usernameError ?></span>
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">Gender</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="1" <?= $row['gender'] == 1 ? 'checked' : '' ?>>
                            <label class="form-check-label" for="inlineRadio1">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="0" <?= $row['gender'] == 0 ? 'checked' : '' ?>>
                            <label class="form-check-label" for="inlineRadio2">Female</label>
                        </div> </br>
                        <span class="text-danger"><?=$genderError ?></span>
                    </div>
                    <div class="mb-3">
                        <input type="hidden" name="oldImage" value="<?= $row['profile'] ?>">
                        <label for="name" class="form-label"> Profile</label>
                        <input type="file" name="profile" accept="image/*" class="form-control">
                        <img src="uploads/<?= $row['profile'] ?>" alt="Profile Image" class="img-fluid rounded-circle" width="75" height="75">

                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label"> Language</label>
                        <select name="language" class="form-control">
                        <option value="">-- Select Language --</option>
                        <?php
                        $lang_sql = "SELECT * FROM language WHERE del_action='N'"; 
                        $lang_query = mysqli_query($conn, $lang_sql);
                            while ($lang_row = mysqli_fetch_assoc($lang_query)) { ?>
                                <option value="<?=$lang_row['id'];?>" <?= $row['language_id'] == $lang_row['id'] ? 'selected' : '' ?>><?=$lang_row['name'];?></option>
                        <?php } ?>
                    </select>
                        <span class="text-danger"><?=$languageError ?></span>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label"> Language</label>
                        <select name="role" class="form-control">
                        <option value="">-- Select Role --</option>
                        <?php
                        $role_sql = "SELECT * FROM roles"; 
                        $role_query = mysqli_query($conn, $role_sql);
                            while ($role_row = mysqli_fetch_assoc($role_query)) { ?>
                                <option value="<?=$role_row['role_id'];?>" <?= $row['role_id'] == $role_row['role_id'] ? 'selected' : '' ?>><?=$role_row['name'];?></option>
                        <?php } ?>
                    </select>
                        <span class="text-danger"><?=$roleError ?></span>
                    </div>
                    <?php
                    $educationArray = explode(',', $row['education']);

                    ?>
                    <div class="mb-3">
                        <label for="">Education</label> </br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="education[]" type="checkbox" id="inlineCheckbox1" value="10th" <?php if (in_array("10th", $educationArray)) {
                                                                                                                                        echo "checked";
                                                                                                                                    } ?>>
                            <label class="form-check-label" for="inlineCheckbox1">10th</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="education[]" type="checkbox" id="inlineCheckbox1" value="12th" <?php if (in_array("12th", $educationArray)) {
                                                                                                                                        echo "checked";
                                                                                                                                    } ?>>
                            <label class="form-check-label" for="inlineCheckbox1">12th</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="education[]" type="checkbox" id="inlineCheckbox1" value="Polytechnic" <?php if (in_array("Polytechnic", $educationArray)) {
                                                                                                                                            echo "checked";
                                                                                                                                        } ?>>
                            <label class="form-check-label" for="inlineCheckbox1">Polytechnic</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="education[]" type="checkbox" id="inlineCheckbox1" value="B.tech" <?php if (in_array("B.tech", $educationArray)) {
                                                                                                                                        echo "checked";
                                                                                                                                    } ?>>
                            <label class="form-check-label" for="inlineCheckbox1">B.Tech</label>
                        </div> </br>
                        <span class="text-danger"><?=$educationError ?></span>                                                                                                                
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label"> Age</label>
                        <input type="tel" name="age" class="form-control" value="<?= $row['age'] ?>" />
                        <span class="text-danger"><?=$ageError ?></span>                                                                                                               
                    </div>
                    <div class="mb-3">
                        <input type="submit" name="submit" value="submit" class="form-control btn btn-primary">
                    </div>

                </form>
            </div>
            <div class="col-lg-3"></div>
        </div>
    </div>
<?php include('static/footer.php') ?>