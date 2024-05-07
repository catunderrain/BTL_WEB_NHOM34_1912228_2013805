<?php include 'inc/header.php'; ?>
<?php include '../classes/cart.php'; ?>
<?php include_once '../helpers/format.php'; ?>

<?php
$fm = new Format();

$cart = new cart();
if (isset($_GET['shiftid'])) {
    $id = $_GET['shiftid'];
    $time = $_GET['time'];
    $price = $_GET['price'];
    $shifted = $cart->shifted($id, $time, $price);
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
                                <h4 class="card-title">Inbox</h4>
                            </div>
                            <div class="card-body">
                                <?php
                                if (isset($shifted)) {
                                    echo $shifted;
                                }
                                ?>
                                <table class="table table-striped" id="example">
                                    <thead>
                                        <tr>
                                            <th>Serial No.</th>
                                            <th>Order time</th>
                                            <th>Product</th>
                                            <th>Image</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Customer ID</th>
                                            <th>Address</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $cart = new cart();
                                        $get_inbox_cart = $cart->get_inbox_cart();
                                        if ($get_inbox_cart) {
                                            $i = 0;
                                            while ($result = mysqli_fetch_array($get_inbox_cart)) {
                                                $i++;
                                        ?>
                                                <tr>
                                                    <th><?php echo $i ?></th>
                                                    <td><?php echo $fm->formatDate($result['date_order']) ?></td>
                                                    <td><?php echo $result['productName'] ?></td>
                                                    <td>
                                                        <img src="<?php echo $result['image']; ?>" alt="Product Image" style="max-width: 200px; max-height: 100px;">
                                                    </td>
                                                    <td><?php echo $result['quantity'] ?></td>
                                                    <td><?php echo $result['price'] ?></td>
                                                    <td><?php echo $result['customer_id'] ?></td>
                                                    <td>
                                                        <button type="button" class="btn btn-primary" onclick="window.location.href='customer.php?customerid=<?php echo $result['customer_id'] ?>'">
                                                            View Address
                                                        </button>

                                                    </td>
                                                    <td>
                                                        <?php
                                                        if ($result['status'] == 0) {
                                                        ?>
                                                            <button type="button" class="btn btn-warning" onclick="window.location.href='?shiftid=<?php echo $result['id'] ?>&price=<?php echo $result['price'] ?>&time=<?php echo $result['date_order'] ?>'">
                                                                Pending
                                                            </button>
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <button type="button" class="btn btn-success">
                                                                Finish
                                                            </button>
                                                        <?php
                                                        }
                                                        ?>

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