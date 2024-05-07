<!-- include header.php -->
<?php include 'includes/header.php'; ?>

<?php
$login_check = Session::get('customer_login');
if ($login_check == false) {
    header('Location:login.php');
}
?>

<?php
$id = Session::get('customer_id');
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {

    $updateCustomer = $customer->update_customer($_POST, $id);
}
?>

<div class="homeVehicles">
    <div class="container">
        <div class="container-header">
            <h3>Information Account</h3>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-11 px-md-4">
                <div class="infor_account">
                    <?php
                    if (isset($updateCustomer)) {
                        echo $updateCustomer;
                    }
                    ?>

                    <form action="" method="POST" id="updateForm">
                        <div class="row">
                            <?php
                            $id = Session::get('customer_id');
                            $get_customer = $customer->show_customer($id);
                            if ($get_customer) {
                                while ($result = $get_customer->fetch_assoc()) {

                            ?>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="cusName" class="form-label">Name</label>
                                            <input type="text" name="name" placeholder="Enter name..." class="form-control" value="<?php echo $result['name'] ?>">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="cusCity" class="form-label">City</label>
                                            <input type="text" name="city" placeholder="Enter city...." class="form-control" value="<?php echo $result['city'] ?>">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="cusZipcode" class="form-label">Zip code</label>
                                            <input type="text" name="zipcode" placeholder="Enter zipcode...." class="form-control" value="<?php echo $result['zipcode'] ?>">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="cusEmail" class="form-label">Email</label>
                                            <input type="text" name="email" placeholder="Enter email...." class="form-control" value="<?php echo $result['email'] ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6 px-md-3">
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
                                            <label for="cusPassword" class="form-label">Password</label>
                                            <input type="text" name="password" class="form-control" placeholder="Password" value="<?php echo $result['password'] ?>">
                                        </div>
                                    </div>
                        </div>
                            <button type="submit" name="update" class="btn btn-primary">Update</button>
                            <button type="button" class="btn btn-secondary" id="cancelButton">Cancel</button>
                    <?php
                                }
                            }
                    ?>
                <div class="clear"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('cancelButton').addEventListener('click', function() {
        document.getElementById('updateForm').reset();
    });
</script>

<!-- include footer.php -->
<?php include 'includes/footer.php'; ?>
