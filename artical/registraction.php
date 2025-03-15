<?php
$path = dirname(__DIR__);
require_once $path . '/connect.php';
$subtn = @$_POST['submit'];
$nameError = $messageError = $profileError = $categoryError = $languageError = '';
if (isset($subtn) && !empty($subtn)) {
    $name = trim($_POST['name']);
    $message = trim($_POST['message']);
    $newFileName = '';
    $folderName = 'uploads/';
    $profile = $_FILES['image']['name'];
    if (!empty($profile)) {
        $tmp_name = $_FILES['image']['tmp_name'];
        $txt = @pathinfo($profile, PATHINFO_EXTENSION);
        $newFileName = "photo" . rand() . "." . $txt;
        move_uploaded_file($tmp_name, $folderName . $newFileName);
    }
    $userId = $_SESSION['id'];
    $category = trim($_POST['category']);
    $language = trim($_POST['language']);
    if ($name == '') {
        $nameError = "Name filed is required";
    }
    if ($message == '') {
        $messageError = "Message filed is required";
    }
    if ($profile == '') {
        $profileError = "Profile filed is required";
    }

    if ($category == '') {
        $categoryError = "Category filed is required";
    }
    if ($language == '') {
        $languageError = "Language filed is required";
    }
    if ($name != '' && $message != '' && $profile != '' && $userId != '' && $category != '' && $language != '') {
        $sql = "INSERT into articles(category_id, user_id, language_id, name, description, image) values('" . $category . "','" . $userId . "','" . $language . "','" . $name . "','" . $message . "','" . $newFileName . "') ";
        if (mysqli_query($conn, $sql)) {
            header("location:articalRecord.php");
            $_SESSION['message'] = "Data Update successfully";
            $_SESSION['status'] = "success";
        } else {
            echo "Data not insert";
        }
    }
}

?>
<?php include('../static/header.php') ?>
<div class="container">
    <div class="row mt-3 ">
        <div class="col-lg-3"></div>
        <div class="col-lg-6 p-4 card">
            <form action="" method="POST" id="myform" enctype="multipart/form-data">
                <h3 class="text-center text-danger">Description</h3>
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" />
                    <span class="text-danger"><?= $nameError; ?></span>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Image</label>
                    <input type="file" name="image" accept="image/*" class="form-control" />
                    <span class="text-danger"><?= $profileError; ?></span>
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Description</label>
                    <textarea id="summernote" class="form-control" name="message"></textarea>
                    <span class="text-danger"><?= $messageError; ?></span>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Language</label>
                    <select name="language" class="form-control">
                        <option value="">-- Select Language --</option>
                        <?php
                        $sql = "SELECT * FROM language WHERE del_action='N'";
                        $mysqlSet = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($mysqlSet)) { ?>
                            <option value="<?= $row['id'] ?>"><?= $row['name']; ?></option>
                        <?php } ?>
                    </select>
                    <span class="text-danger"><?= $languageError; ?></span>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Category</label>
                    <select name="category" class="form-control">
                        <option value="">-- Select Category --</option>
                        <?php
                        $catSql = "SELECT * FROM categories WHERE del_action='N'";
                        $catMysqlSet = mysqli_query($conn, $catSql);
                        while ($catRow = mysqli_fetch_assoc($catMysqlSet)) { ?>
                            <option value="<?= $catRow['id'] ?>"><?= $catRow['name']; ?></option>
                        <?php } ?>
                    </select>
                    <span class="text-danger"><?= $categoryError; ?></span>
                </div>
                <div class="mb-3">
                    <input type="submit" name="submit" class="form-control btn btn-primary">
                </div>
            </form>
        </div>
        <div class="col-lg-3"></div>
    </div>
</div>

<?php include('../static/footer.php') ?>
<script>
    $("#myform").validate({
        rules: {
            name: "required",
            email: {
                required: true,
                email: true
            }
        },
        messages: {
            name: "Please specify your name",
            email: {
                required: "We need your email address to contact you",
                email: "Your email address must be in the format of name@domain.com"
            }
        }
    });
</script>