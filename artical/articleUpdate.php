<?php
$path = dirname(__DIR__);
require_once $path . '/connect.php';
$pkId = isset($_GET['id']) ? $_GET['id'] : '';
$article = "SELECT * FROM articles where id ='" . $pkId . "'";
$articleMysqlSet = mysqli_query($conn, $article);
$articleRow = mysqli_fetch_assoc($articleMysqlSet);
$subtn=@$_POST['submit'];
$nameError = $messageError = $profileError = $categoryError = $languageError = '';
if (isset($subtn) && !empty($subtn)) {
    $name = trim($_POST['name']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);
    $oldImage=$_POST['oldImage'];
    $newFileName =$oldImage;
    $profile = $_FILES['image']['name'];
    if (!empty($profile)) {
        $folderName = 'uploads/';
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
    

    if ($category == '') {
        $categoryError = "Category filed is required";
    }
    if ($language == '') {
        $languageError = "Language filed is required";
    }
    if ($name != '' && $message != ''  && $userId != '' && $category != '' && $language != '') {
        // $sql = "INSERT into articles(category_id, user_id, language_id, name, description, image) values('" . $category . "','" . $userId . "','" . $language . "','" . $name . "','" . $message . "','" . $newFileName . "') ";
        $sql="UPDATE articles set name='".$name."' ,image='".$newFileName."',description='".$message."', user_id='".$userId."', category_id='".$category."', language_id='".$language."' where id='".$pkId."' and del_action='N' ";
        if (mysqli_query($conn, $sql)) {
            header("location:articalRecord.php");
            $_SESSION['message']="Data Update successfully";
            $_SESSION['status']="warning";
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
            <form action="" method="POST" enctype="multipart/form-data">
                <h3 class="text-center text-danger">Description</h3>
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" value="<?= $articleRow['name']; ?>" class="form-control" />
                    <span class="text-danger"><?= $nameError; ?></span>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Image</label>
                    <input type="hidden" name="oldImage" value="<?= $articleRow['image']; ?>">
                    <input type="file" name="image" accept="image/*" class="form-control"/>
                    <img src="uploads/<?=$articleRow['image']; ?>" alt="Profile Image"width="75" height="75">
                    <span class="text-danger"><?= $profileError; ?></span>
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Description</label>
                    <textarea class="form-control" id="summernote" name="message" rows="5"><?=$articleRow['description']; ?></textarea>
                    <span class="text-danger"><?=$messageError; ?></span>
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label">Language</label>
                    <select name="language" class="form-control">
                        <option value="">-- Select Language --</option>
                        <?php
                        $languageSql = "SELECT * FROM language WHERE del_action='N'";
                        $languageMysqlSet = mysqli_query($conn,  $languageSql);
                        while ($languageRow = mysqli_fetch_assoc( $languageMysqlSet)) { ?>
                            <option value="<?= $languageRow['id'] ?>"<?=$languageRow['id']==$articleRow['language_id']?'selected':'';?>><?= $languageRow['name']; ?></option>
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
                            <option value="<?= $catRow['id'] ?>" <?=$catRow['id']==$articleRow['category_id']?'selected':'';?>><?= $catRow['name']; ?></option>
                        <?php } ?>
                    </select>
                    <span class="text-danger"><?= $categoryError; ?></span>
                </div>
                <div class="mb-3">
                    <input type="submit" name="submit" value="Update" class="form-control btn btn-primary">
                </div>
            </form>
        </div>
        <div class="col-lg-3"></div>
    </div>
</div>

<?php include('../static/footer.php') ?>