<?php include 'inc/header.php'; ?>
<?php include '../classes/customer.php'; ?>
<?php include_once '../helpers/format.php'; ?>

<?php
$customer = new customer();

if (!isset($_GET['customerid']) || $_GET['customerid'] == NULL) {
    echo "<script>window.location='inbox.php'</script>";
    exit();
} else {
    $id = $_GET["customerid"];
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
                                <h4 class="card-title">Customer</h4>
                            </div>
                            <div class="card-body">
                                <?php
                                $get_customer = $customer->show_customer($id);
                                if ($get_customer) {
                                    while ($result = $get_customer->fetch_assoc()) {
                                ?>
                                        <form action="" method="post">
                                            <div class="mb-3">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group mb-3">
                                                            <label for="cusName" class="form-label"><b>Name</b></label>
                                                            <input type="text" class="form-control" value="<?php echo $result['name'] ?>" readonly>
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <label for="cusCity" class="form-label"><b>City</b></label>
                                                            <input type="text" class="form-control" value="<?php echo $result['city'] ?>" readonly>
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <label for="cusZipcode" class="form-label"><b>Zip code</b></label>
                                                            <input type="text" class="form-control" value="<?php echo $result['zipcode'] ?>" readonly>
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <label for="cusEmail" class="form-label"><b>Email</b></label>
                                                            <input type="text" class="form-control" value="<?php echo $result['email'] ?>" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 px-md-3">
                                                        <div class="form-group mb-3">
                                                            <label for="cusAddress" class="form-label"><b>Address</b></label>
                                                            <input type="text" class="form-control" value="<?php echo $result['address'] ?>" readonly>
                                                        </div>
                                                        <div class="form-group mb-3 mr-3">
                                                            <label for="cusCountry" class="form-label"><b>Country</b></label>
                                                            <input type="text" class="form-control" value="<?php echo $result['country'] ?>" readonly>
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <label for="cusPhone" class="form-label"><b>Phone</b></label>
                                                            <input type="text" class="form-control" value="<?php echo $result['phone'] ?>" readonly>
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <label for="cusPassword" class="form-label"><b>Password</b></label>
                                                            <input type="text" class="form-control" value="<?php echo $result['password'] ?>" readonly>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
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
        // Lấy tham chiếu đến nút "Close"
        var closeButton = document.getElementById("closeButton");

        // Thiết lập sự kiện click cho nút "Close"
        closeButton.addEventListener("click", function() {
            // Chuyển hướng về trang catlist.php
            window.location.href = 'inbox.php';
        });
    });
</script>