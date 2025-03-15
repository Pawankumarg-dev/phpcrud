<?php
$path = dirname(__DIR__);
require_once $path . '/connect.php';
?>

<?php include('../static/header.php') ?>

<div class="container mt-4">
   
    <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-6">
            <div class="card p-2">
                <?php
                if(isset($_SESSION['message']) && !empty($_SESSION['message'])){ ?>
                    <div class="alert alert-<?=$_SESSION['status']?> alert-dismissible fade show" role="alert"> 
                        <?=$_SESSION['message'] ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
               <?php unset($_SESSION['message'],$_SESSION['status']);  } ?>
                    <div class="row">
                        <div class="col-lg-6"></div>
                        <div class="col-lg-6 text-end">
                            <a href="registraction.php" class="btn btn-primary btn-sm ">Add language</a>
                        </div>
                    </div>
                <table class="table  table-hover table-striped mt-3">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Language</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM language where del_action='N'";
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
                                        <a href="languageUpdate.php?id=<?= $row['id']; ?>"  onclick="return confirm('Are you want update')">Edit</a>
                                        <a href="languageDelete.php?id=<?= $row['id']; ?>" onclick="return confirm('Are you want delete')">Delete</a>
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
        <div class="col-lg-3"></div>
    </div>
</div>
<?php include('../static/footer.php') ?>