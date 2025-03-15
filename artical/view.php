<?php 
$path = dirname(__DIR__);
require_once $path . '/connect.php';
$pkId = isset($_GET['id']) ? $_GET['id'] : '';
$sql = "SELECT users.name as user_name ,categories.name as category_name ,articles.id, articles.created_at, articles.name , articles.description ,articles.image ,language.name as language_name  FROM articles left join users on articles.user_id = users.id left join categories on articles.category_id=categories.id left join language on articles.language_id=language.id where articles.id='".$pkId."' ";
$sqlSet=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($sqlSet);
?>
<?php include('../static/header.php') ;?>
<div class="container mt-3">
    <div class="row">
        <div class="col-12">
            <h2 class="fw-bold"><?= $row['name'] ?></h2>
        </div>
    </div>

    <div class="row align-items-center">
        <div class="col-lg-9">
            <p class="text-muted">
                <i class="bi bi-calendar"></i> <?= date('F d, Y', strtotime($row['created_at'])) ?>
            </p>
            <p class="fs-5"><?= $row['description'] ?></p>
        </div>
        <div class="col-lg-3">
            <img src="uploads/<?= $row['image'] ?>" alt="" class="img-fluid rounded shadow">
        </div>
    </div>

    <!-- Additional Info -->
    <div class="row mt-3">
        <p><strong>User:</strong> <?= $row['user_name'] ?></p>
        <p><strong>Language:</strong> <?= $row['language_name'] ?></p>
        <p><strong>Category:</strong> <?= $row['category_name'] ?></p>
    </div>
</div>

<?php include('../static/footer.php') ?>