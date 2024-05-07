<?php include 'inc/header.php'; ?>
<?php include '../classes/category.php'; ?>

<?php
$cat = new category();

if (isset($_GET['delid'])) {
    $delCat = $cat->del_category($_GET['delid']);
}
?>

<div class='dashboard'>
    <?php include 'inc/sidebar.php'; ?>

    <div class='dashboard-app'>
        <header class='dashboard-toolbar'>
            <button class="btn menu-toggle"><i class="fas fa-bars"></i></button>
            <h1 class="logo" style="font-family: 'Copperplat', fantasy;">KAWASAKI</h1>
        </header>

        <div class='dashboard-content'>
            <div class="container-fluid">
                <div class="row justify-content-center align-items-center" style="width: 100%;">
                    <div class="col-md-12">
                        <div class="card mt-3">
                            <div class="card-header">
                                <h4 class="card-title">Category List</h4>
                            </div>
                            <div class="card-body">
                                <?php
                                if (isset($delCat)) {
                                    echo $delCat;
                                }
                                ?>
                                <table class="table table-striped" id="example">
                                    <thead>
                                        <tr>
                                            <th>Serial No.</th>
                                            <th>Category Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $categories = $cat->show_category();
                                        if ($categories) {
                                            $i = 0;
                                            while ($result = mysqli_fetch_array($categories)) {
                                                $i++;
                                        ?>
                                                <tr>
                                                    <th scope="row" class="category_id"><?php echo $i ?></th>
                                                    <td><?php echo $result['catName'] ?></td>
                                                    <td>
                                                        <a href="catedit.php?catId=<?php echo $result['catId'] ?>" class="btn btn-info text-decoration-none edit_data">Edit</a>
                                                        <!-- Nút Delete kích hoạt modal xác nhận xóa -->
                                                        <button type="button" class="btn btn-danger text-decoration-none" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal<?php echo $result['catId'] ?>">
                                                            Delete
                                                        </button>

                                                        <!-- CONFIRM DELETE PRODUCT -->
                                                        <div class="modal fade" id="confirmDeleteModal<?php echo $result['catId'] ?>" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="confirmDeleteModalLabel">Confirm Delete</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        Are you sure you want to delete this category?
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                                        <!-- Nút Delete xóa category -->
                                                                        <a href="?delid=<?php echo $result['catId'] ?>" class="btn btn-danger">Delete</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- CONFIRM DELETE PRODUCT -->
                                                    </td>
                                                </tr>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'inc/footer.php'; ?>