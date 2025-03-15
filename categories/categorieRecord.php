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
                <div class="row">
                    <div class="col-lg-12">
                    <?php
                if(isset($_SESSION['message']) && !empty($_SESSION['message'])){ ?>
                    <div class="alert alert-<?=$_SESSION['status']?> alert-dismissible fade show" role="alert"> 
                        <?=$_SESSION['message'] ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
               <?php unset($_SESSION['message'],$_SESSION['status']);  } ?>
                    </div>
                </div>
                    <div class="row">
                        <div class="col-lg-6">
                            
                        </div>
                        <div class="col-lg-6 text-end">
                            <a href="registraction.php" class="btn btn-primary btn-sm ">Add categories</a>
                        </div>
                    </div>
                <table class="table  table-hover table-striped mt-3">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Categories</th>
                            <th scope="col">Add By</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                   $sql = "SELECT users.name as user_name ,categories.name, categories.id  FROM categories left join users on categories.user_id = users.id where categories.del_action='N'";
        
                   $mysqliSet = mysqli_query($conn, $sql);
                        $sqlRow = mysqli_num_rows($mysqliSet);
                        ?>
                        <?php if ($sqlRow > 0){?>
                            <?php $i = 1; ?>
                            <tr>
                                <?php while ($row = mysqli_fetch_assoc($mysqliSet)) { ?>
                                    <th scope="row"><?= $i; ?></th>

                                    <td><?= $row['name'] ?></td>
                                    <td><?= $row['user_name'] ?></td>
                                    <td>
                                        <a href="categorieUpdate.php?id=<?=$row['id'];?>" class="btn btn-primary" onclick="return confirm('Are you want update')">Edit</a>
                                        <a href="categoriesDelete.php?id=<?=$row['id']; ?>" class="btn btn-danger m-1" onclick="return confirm('Do you want to delete data?')">Delete</a>
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