<?php
require_once __DIR__ . '/connect.php';

// filter name wise
$qury = '';
if (isset($_GET['search'])) {
    if (isset($_GET['name']) && $_GET['name'] != '') {
        $name = trim($_GET['name']);
        $qury .= "and name like '%" . $name . "%'";
    }
}

//Pagination 
$record = 5;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$start = ($page - 1) * $record;

//echo $start;
$sqlTotal = "SELECT COUNT(*) as totalCount from users  where del_action='N' $qury";
$result = mysqli_query($conn, $sqlTotal);
$row = mysqli_fetch_assoc($result);
$total_record = $row['totalCount'];
$total_page = ceil($total_record / $record);
?>
<?php include('static/header.php') ?>

<div class="container mt-4">
    <form action="" method="GET">
        <div class="card p-2">
            <div class="row">

                <div class="col-lg-2">
                    <input type="text" name="name" placeholder="Search by name" value="<?= @$_GET['name'] ?>" class="form-control">
                </div>
                <div class="col-lg-2">
                    <input type="submit" name="search" value="search" class="btn btn-primary btn-sm">
                </div>
                <div class="col-lg-2">
                    <a href="record.php" class="btn btn-danger btn-sm">Reset</a>
                </div>
    </form>
    <div class="col-lg-6 text-end">
        <a href="registraction.php" class="btn btn-success btn-sm">Add data</a>
    </div>
</div>
</div>
<div class="card p-2 mt-2">
    <?php if (isset($_SESSION['message']) && !empty($_SESSION['message'])) { ?>
        <div class="alert alert-<?= $_SESSION['status'] ?> alert-dismissible fade show" role="alert">
            <?= $_SESSION['message'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php unset($_SESSION['message'], $_SESSION['status']);
    } ?>
    <table class="table  table-hover table-striped mt-3">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Role</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Username</th>
                <th scope="col">Gender</th>
                <th scope="col">Profile</th>
                <th scope="col">Language</th>
                <th scope="col">Education</th>
                <th scope="col">age</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
         $sql = "SELECT roles.name as role_name, users.name ,users.id, users.email, users.username , users.gender , users.profile , language.name as language_name , users.education , users.age from users left join language on language.id = users.language_id left join roles on roles.role_id=users.role_id where users.del_action='N' $qury order by users.id desc limit $start ,$record "; 
          $mysqliSet = mysqli_query($conn, $sql);
            $sqlRow = mysqli_num_rows($mysqliSet);
            //echo $sqlRow;
            ?>
            <?php if ($sqlRow > 0) { ?>
                <?php $i = $start + 1; ?>
                <tr>
                    <?php while ($row = mysqli_fetch_assoc($mysqliSet)) { ?>
                        <th scope="row"><?= $i; ?></th>
                        <td><?= $row['role_name'] ?></td>
                        <td><?= $row['name'] ?></td>
                        <td><?= $row['email'] ?></td>
                        <td><?= $row['username'] ?></td>
                        <td><?=$row['gender']=='1'? 'Male':'Female' ?></td>
                        <td>
                            <img src="uploads/<?= $row['profile'] ?>" alt="Profile Image" class="img-fluid rounded-circle" width="75" height="75">
                        </td>

                        <td><?= $row['language_name'] ?></td>
                        <td><?= $row['education'] ?></td>
                        <td><?= $row['age'] ?></td>
                        <td>
                            <a href="update.php?id=<?= $row['id']; ?>" class="btn btn-success" onclick="return confirm('Do you want update')">Edit</a>
                            <a href="delete.php?id=<?= $row['id']; ?>" class="btn btn-danger m-1" onclick="return confirm('Do you want to delete data?')">Delete</a>
                        </td>
                </tr>
                <?php $i++; ?>
            <?php } ?>

        <?php } else { ?>
            <tr>
                <td class="text-danger">Record is not found</td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    <div class="row">
        <div class="col-lg-6">
            <a href="export.php" class="btn btn-success btn-sm">Export</a>
        </div>
        <div class="col-lg-6">
            <!-- Pagination -->
            <nav aria-label="Page navigation ">
                <ul class="pagination float-end">

                    <li class="page-item <?php if ($page <= 1) {
                                                echo 'disabled';
                                            } ?>">
                        <a class="page-link" href="<?php if ($page > 1) {
                                                        echo "?page=" . ($page - 1);
                                                    } ?>" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>

                    <?php for ($i = 1; $i <= $total_page; $i++) { ?>
                        <li class="page-item <?php if ($page == $i) {
                                                    echo 'active';
                                                } ?>">
                            <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                        </li>
                    <?php } ?>


                    <li class="page-item <?php if ($page >= $total_pages) {
                                                echo 'disabled';
                                            } ?>">
                        <a class="page-link" href="<?php if ($page < $total_pages) {
                                                        echo "?page=" . ($page + 1);
                                                    } ?>" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
</div>
<?php include('static/footer.php') ?>