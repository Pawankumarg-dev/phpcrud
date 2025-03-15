<?php
$path = dirname(__DIR__);
require_once $path . '/connect.php';
//filter
$qry = '';
if (isset($_GET['search'])) {
    if (isset($_GET['name']) && !empty($_GET['name'])) {
        $name = trim($_GET['name']);
        $qry .= "and articles.name like '%" . $name . "%'";
    }
    if (isset($_GET['category']) && !empty($_GET['category'])) {
        $category = trim($_GET['category']);
        $qry .= " AND articles.category_id = '".$category."'";
    }

    if(isset($_GET['language']) && !empty($_GET['language'])){
        $language = trim($_GET['language']);
        $qry .= "AND articles.language_id = '".$language."'";
    }

    if(isset($_GET['user']) && !empty($_GET['user'])){
        $user = trim($_GET['user']);
        $qry .= "AND articles.user_id = '".$user."'";
    }
}
?>
<?php include('../static/header.php') ?>

<div class="container-fluid mt-4">
    <form action="" method="GET">
        <div class="card" p-2>
            <div class="row m-2">
                <div class="col-lg-2">
                    <input type="text" name="name" value="<?= @$_GET['name'] ?>" placeholder="Search by name" class="form-control">
                </div>

                <div class="col-lg-2">
                    <select name="category" class="form-control">
                        <option value="">Search by Category </option>
                        <?php
                        $catSql = "SELECT * FROM categories WHERE del_action='N'";
                        $catMysqlSet = mysqli_query($conn, $catSql);
                        while ($catRow = mysqli_fetch_assoc($catMysqlSet)) { ?>
                            <option value="<?= $catRow['id'] ?>"><?= $catRow['name']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-lg-2">
                    <select name="language" class="form-control">
                        <option value=""> Search by Language </option>
                        <?php
                        $sql = "SELECT * FROM language WHERE del_action='N'";
                        $mysqlSet = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($mysqlSet)) { ?>
                            <option value="<?= $row['id'] ?>"><?= $row['name']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-lg-2">
                    <select name="user" class="form-control">
                        <option value="">Search by user name</option>
                        <?php 
                        $userSql ="SELECT * FROM users WHERE del_action='N'";
                        $usermysqlSet = mysqli_query($conn,$userSql);
                        while($userRow = mysqli_fetch_assoc( $usermysqlSet)){ ?>
                            <option value="<?=$userRow['id']?>"><?= $userRow['name']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-lg-1">
                    <input type="submit" name="search" value="Search" class="form-control btn btn-primary">
                </div>
                <div class="col-lg-1 text-end">
                    <a href="articalRecord.php" class="btn btn-danger btn-sm">Reset</a>
                </div>
                <div class="col-lg-2 text-end">
                    <a href="registraction.php" class="btn btn-primary btn-sm ">Add artical</a>
                </div>
            </div>
        </div>
    </form>
    <div class="row">
        <div class="col-lg-12">
            <div class="card p-2">
                <div class="row">
                    <div class="col-lg-12">
                        <?php if (isset($_SESSION['message']) && !empty($_SESSION['message'])) { ?>
                            <div class="alert alert-<?= $_SESSION['status'] ?> alert-dismissible fade show" role="alert">
                                <?= $_SESSION['message'] ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php unset($_SESSION['message'], $_SESSION['status']);
                        } ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">

                    </div>
                    <div class="col-lg-6 text-end">

                    </div>
                </div>
                <table class="table  table-hover table-striped mt-3">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Image</th>
                            <th scope="col">Description</th>
                            <th scope="col">Category</th>
                            <th scope="col">language</th>
                            <th scope="col">User</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT users.name as user_name ,categories.name as category_name ,articles.id, articles.name , articles.description ,articles.image ,language.name as language_name  FROM articles left join users on articles.user_id = users.id left join categories on articles.category_id=categories.id left join language on articles.language_id=language.id where articles.del_action='N' $qry order by articles.id desc ";

                        $mysqliSet = mysqli_query($conn, $sql);
                        $sqlRow = mysqli_num_rows($mysqliSet);
                        ?>
                        <?php if ($sqlRow > 0) { ?>
                            <?php $i = 1; ?>
                            <tr>
                                <?php while ($row = mysqli_fetch_assoc($mysqliSet)) { ?>
                                    <th scope="row"><?= $i; ?></th>

                                    <td><?= $row['name'] ?></td>
                                    <td>
                                        <img src="uploads/<?= $row['image'] ?>" alt="" height="75" width="75" class="rounded-circle ">
                                    </td>
                                    <td><?= $row['description'] ?></td>
                                    <td>
                                    <a href="view.php?id=<?= $row['id']; ?>" style="text-decoration: none; color:black"><?= $row['category_name'] ?></a> 
                                  </td>
                                    <td><?= $row['language_name'] ?></td>
                                    <td><?= $row['user_name'] ?></td>
                                    <td>
                                        <a href="articleUpdate.php?id=<?= $row['id']; ?>" class="btn btn-primary" onclick="return confirm('Are you want update')">Edit</a>
                                        <a href="articleDelete.php?id=<?= $row['id']; ?>" class="btn btn-danger m-1" onclick="return confirm('Do you want to delete data?')">Delete</a>
                                    </td>
                            </tr>
                            <?php $i++; ?>
                        <?php } ?>

                    <?php } else { ?>
                        <tr>
                            <td class="text-danger text-center">Record is not found</td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>

            </div>
        </div>

    </div>
</div>
<?php include('../static/footer.php') ?>