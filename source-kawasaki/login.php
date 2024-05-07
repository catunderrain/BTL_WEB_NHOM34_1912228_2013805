<!-- include header.php -->
<?php include 'includes/header.php'; ?>

<?php 
    $login_check = Session::get('customer_login');
    if ($login_check) {
        header('Location:cart.php');
    }
?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" &&  isset($_POST['submit'])) {

    $insertCustomer = $customer->insert_customer($_POST);
}
?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" &&  isset($_POST['login'])) {

    $loginCustomer = $customer->login_customer($_POST);
}
?>

<div class="homeVehicles">
    <div class="container">
        <div class="row">
            <div class="col-md-4 px-md-4">
                <div class="login_panel">
                    <h3>Existing Customers</h3>
                    <p>Sign in with the form below.</p>
                    <?php
                        if (isset($loginCustomer)) {
                            echo $loginCustomer;
                        }
                    ?>
                    <form action="" method="POST">
                        <div class="form-group mb-3">
                            <input name="name" type="text" class="form-control field" placeholder="Enter name...">
                        </div>
                        <div class="form-group mb-3">
                            <input name="password" type="password" class="form-control field" placeholder="Enter password...">
                        </div>
                        <p class="note">If you forgot your password just enter your email and click <a href="#">here</a></p>
                        <div class="buttons">
                            <div><button class="btn btn-primary" type="submit" name="login">Sign In</button></div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-md-8 px-md-4">
                <div class="register_account">
                    <h3>Register New Account</h3>
                    <?php
                        if (isset($insertCustomer)) {
                            echo $insertCustomer;
                        }
                    ?>
                    <form action="" method="POST">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <input type="text" name="name" placeholder="Enter name..." class="form-control mr-3">
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" name="city" placeholder="Enter city...." class="form-control mr-3">
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" name="zipcode" placeholder="Enter zipcode...." class="form-control mr-3">
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" name="email" placeholder="Enter email...." class="form-control mr-3">
                                </div>
                            </div>
                            <div class="col-md-6 px-md-3">
                                <div class="form-group mb-3">
                                    <input type="text" name="address" placeholder="Enter address...." class="form-control mr-3">
                                </div>
                                <div class="form-group mb-3 mr-3">
                                    <select id="country" name="country" class="form-control frm-field required">
                                        <option value="null">Select a Country</option>
                                        <option value="AF">Vietnam</option>
                                        <option value="AL">Cambodia</option>
                                        <option value="AL">Laos</option>
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" name="phone" placeholder="Enter phone" class="form-control">
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" name="password" class="form-control" placeholder="Password">
                                </div>
                            </div>
                        </div>
                        <div class="search">
                            <div><button class="btn btn-primary" type="submit" name="submit">Create Account</button></div>
                        </div>
                        <p style="margin-top: 10px;">By clicking 'Create Account' you agree to the <a href="#">Terms &amp; Conditions</a>.</p>
                        <div class="clear"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- include footer.php -->
<?php include 'includes/footer.php'; ?>
