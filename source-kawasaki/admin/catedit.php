<?php include 'inc/header.php'; ?>
<?php include '../classes/category.php'; ?>

<?php
$cat = new category();

if (!isset($_GET['catId']) || $_GET['catId'] == NULL) {
    echo "<script>window.location='catlist.php'</script>";
    exit();
} else {
    $id = $_GET["catId"];
}

// Lấy giá trị ban đầu của tên danh mục
$originalCatName = "";
$get_cat_name = $cat->getcatbyId($id);
if ($get_cat_name) {
    $result = $get_cat_name->fetch_assoc();
    $originalCatName = $result['catName'];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $catName = $_POST['catName'];
    $updateCat = $cat->update_category($catName, $id);
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
                                <h4 class="card-title">Edit Category</h4>
                            </div>
                            <div class="card-body">
                                <?php
                                if (isset($updateCat ) && $catName != $originalCatName) {
                                    echo $updateCat;
                                }
                                ?>
                                <?php
                                $get_cat_name = $cat->getcatbyId($id);
                                if ($get_cat_name) {
                                    while ($result = $get_cat_name->fetch_assoc()) {
                                ?>
                                        <form action="" method="post">
                                            <div class="mb-3">
                                                <label for="catName" class="form-label">Category Name</label>
                                                <input type="text" name="catName" class="form-control" id="catName" value="<?php echo $result['catName'] ?>" />
                                            </div>
                                            <button type="submit" name="submit" class="btn btn-primary">Update</button>
                                            <button type="button" class="btn btn-secondary" id="cancelButton">Cancel</button>
                                            <button type="button" class="btn btn-secondary" id="closeButton">Close</button>
                                        </form>
                                <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'inc/footer.php'; ?>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Lấy tham chiếu đến trường nhập liệu tên danh mục
        var catNameInput = document.getElementById("catName");

        // Lưu giá trị ban đầu của tên danh mục khi trang tải
        catNameInput.dataset.originalValue = catNameInput.value;

        // Lấy tham chiếu đến nút "Cancel"
        var cancelButton = document.getElementById("cancelButton");

        // Thiết lập sự kiện click cho nút "Cancel"
        cancelButton.addEventListener("click", function() {
            // Đặt lại giá trị của trường nhập liệu về giá trị ban đầu
            catNameInput.value = catNameInput.dataset.originalValue;
        });
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Lấy tham chiếu đến nút "Close"
        var closeButton = document.getElementById("closeButton");

        // Thiết lập sự kiện click cho nút "Close"
        closeButton.addEventListener("click", function() {
            // Chuyển hướng về trang catlist.php
            window.location.href = 'catlist.php';
        });
    });
</script>