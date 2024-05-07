<?php include 'inc/header.php'; ?>
<?php include '../classes/category.php'; ?>

<?php
$class = new category();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $catName = $_POST['catName'];

    $insertCat = $class->insert_category($catName);
}
?>

<div class='dashboard'>
    <?php include 'inc/sidebar.php'; ?>

    <div class='dashboard-app'>
        <header class='dashboard-toolbar'>
            <a href="#!" class="menu-toggle"><i class="fas fa-bars"></i></a>
            <h1 class="logo" style="font-family: 'Copperplat', fantasy;">KAWASAKI</h1>
        </header>

        <div class='dashboard-content dashboard-content-img'>
            <div class="container-fluid">
                <div class="row justify-content-center align-items-center" style="width: 100%;">
                    <div class="col-md-12">
                        <div class="card mt-3">
                            <div class="card-header">
                                <h4 class="card-title">Add New Category</h4>
                            </div>
                            <div class="card-body">
                                <?php
                                if (isset($insertCat)) {
                                    echo $insertCat;
                                }
                                ?>
                                <form action="catadd.php" method="post">
                                    <div class="mb-3">
                                        <label for="catName" class="form-label"><b>Category Name</b></label>
                                        <div class="col-md-6">
                                            <!-- <input type="text" name="catName" class="form-control" id="catName" placeholder="Enter Category Name..." /> -->
                                        </div>
                                        <input type="text" name="catName" class="form-control" id="catName" placeholder="Enter Category Name..." />
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-primary">Save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'inc/footer.php'; ?>