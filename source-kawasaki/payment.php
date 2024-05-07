<!-- include header.php -->
<?php include 'includes/header.php'; ?>

<?php
// include 'includes/slider.php'; 
error_reporting(0);
if (isset($_GET['cartid'])) {
    $cartid = $_GET['cartid'];
    $delpro = $cart->delete_cart($cartid);
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $cartId = $_POST['cartId'];
    $quantity = $_POST['quantity'];
    $update_quantity_cart = $cart->update_quantity_cart($quantity, $cartId);
}

if (isset($_GET['orderid']) && $_GET['orderid'] == 'order') {
    $customer_id = Session::get('customer_id');
    $insertOrder = $cart->insertOrder($customer_id);
    $delCart = $cart->delete_all_data_cart();
    header('Location:success.php');
}

?>

<div class="homeVehicles">
    <div class="container">
        <div class="container-header">
            <h3>PAYMENT</h3>
        </div>
        <?php
        if (isset($update_quantity_cart)) {
            echo $update_quantity_cart;
        }
        ?>
        <form action="" method="POST">
            <div class="row">
                <div class="col-md-7 px-md-4">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total Price</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $get_product_cart = $cart->get_product_cart();
                                    if ($get_product_cart) {
                                        $sub_total = 0;
                                        $i = 0;
                                        while ($result = $get_product_cart->fetch_assoc()) {
                                            $i++;
                                    ?>
                                            <tr>
                                                <td><?php echo $i ?></td>
                                                <td><?php echo $result['productName'] ?></td>
                                                <td><?php echo $result['price'] ?></td>
                                                <td>
                                                    <form action="" method="post">
                                                        <input type="hidden" name="cartId" value="<?php echo $result['cartId'] ?>">
                                                        <div class="input-group mb-3" style="max-width: 150px;">
                                                            <input type="number" name="quantity" value="<?php echo $result['quantity'] ?>" min="1" class="form-control">
                                                            <button type="submit" name="submit" class="btn btn-primary btn-sm">Update</button>
                                                        </div>
                                                    </form>
                                                </td>
                                                <td><?php echo $total = $result['price'] * $result['quantity'] ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-danger" onclick="window.location.href='?cartid=<?php echo $result['cartId'] ?>'">
                                                        Delete
                                                    </button>

                                                </td>
                                            </tr>
                                    <?php
                                            $sub_total += $total;
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="row justify-content-end" style="padding-right: 80px;">
                        <div class="col-md-4">
                            <table class="table">
                                <tr>
                                    <th>Sub total: </th>
                                    <td><?php echo $sub_total; ?></td>
                                </tr>
                                <tr>
                                    <th>VAT (5%): </th>
                                    <td><?php echo $VAT = $sub_total * 5 / 100; ?></td>
                                </tr>
                                <tr>
                                    <th>Total: </th>
                                    <td><?php echo $totalfinal = $sub_total + $VAT; ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-md-5 px-md-4">
                    <div class="row">
                        <?php
                        $id = Session::get('customer_id');
                        $get_customer = $customer->show_customer($id);
                        if ($get_customer) {
                            while ($result = $get_customer->fetch_assoc()) {
                        ?>
                                <div class="col-md-12">
                                    <div class="form-group mb-3">
                                        <label for="cusName" class="form-label">Name</label>
                                        <input type="text" name="name" placeholder="Enter name..." class="form-control" value="<?php echo $result['name'] ?>">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="cusCity" class="form-label">City</label>
                                        <input type="text" name="city" placeholder="Enter city...." class="form-control" value="<?php echo $result['city'] ?>">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="cusAddress" class="form-label">Address</label>
                                        <input type="text" name="address" placeholder="Enter address...." class="form-control" value="<?php echo $result['address'] ?>">
                                    </div>
                                    <div class="form-group mb-3 mr-3">
                                        <label for="cusCountry" class="form-label">Country</label>
                                        <input type="text" name="country" placeholder="Enter country...." class="form-control" value="<?php echo $result['country'] ?>">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="cusPhone" class="form-label">Phone</label>
                                        <input type="text" name="phone" placeholder="Enter phone" class="form-control" value="<?php echo $result['phone'] ?>">
                                    </div>
                                    <div class="form-group mb-3">
                                        <a href="profile.php" class="btn btn-primary">Change</a>
                                    </div>
                                </div>
                        <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-12 text-center"> <!-- Sử dụng text-center để căn giữa nội dung -->
                    <a href="?orderid=order" class="btn btn-primary btn-lg">Order now</a>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- include footer.php -->
<?php include 'includes/footer.php'; ?>