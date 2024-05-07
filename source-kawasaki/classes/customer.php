<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../helpers/format.php');
include_once ($filepath.'/../lib/database.php');
?>

<?php
class customer
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new  Database();
        $this->fm = new Format();
    }    

    public function insert_customer($data)
    {
        $name = mysqli_real_escape_string($this->db->link, $data['name']);
        $city = mysqli_real_escape_string($this->db->link, $data['city']);
        $zipcode = mysqli_real_escape_string($this->db->link, $data['zipcode']);
        $email = mysqli_real_escape_string($this->db->link, $data['email']);
        $address = mysqli_real_escape_string($this->db->link, $data['address']);
        $country = mysqli_real_escape_string($this->db->link, $data['country']);
        $phone = mysqli_real_escape_string($this->db->link, $data['phone']);
        $password = mysqli_real_escape_string($this->db->link, $data['password']);

        if ($name == "" || $city == "" || $zipcode == "" || $email == "" || $address == "" || $country == "" || $phone == "" || $password == "") {
            $warningAlert = '<div class="alert alert-warning alert-dismissible fade show" role="alert">Information must not be empty! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            return $warningAlert;
        } else {
            $query = "INSERT INTO tbl_customer(name, city, zipcode, email, address, country, phone, password) 
                        VALUES('$name', '$city', '$zipcode', '$email', '$address', '$country', '$phone', '$password')";
            $res = $this->db->insert($query);
            if ($res == true) {
                $successAlert = '<div class="alert alert-success alert-dismissible fade show" role="alert">Inserted Successfully. <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                return $successAlert;
            } else {
                $failureAlert = '<div class="alert alert-danger alert-dismissible fade show" role="alert">Failed to Insert. <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                return $failureAlert;
            }
        }
    }

    public function login_customer($data)
    {
        $name = mysqli_real_escape_string($this->db->link, $data['name']);
        $password = mysqli_real_escape_string($this->db->link, $data['password']);

        if ($name == "" || $password == "") {
            $warningAlert = '<div class="alert alert-warning alert-dismissible fade show" role="alert">Information must not be empty! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            return $warningAlert;
        } else {
            $query = "SELECT * FROM `tbl_customer` WHERE `name`='$name' AND `password`='$password' LIMIT 1 ";

            $result = $this->db->select($query);

            if ($result != false) {
                $value = $result->fetch_assoc();   //fetch data from database
                Session::set('customer_login', true);
                Session::set('customer_id', $value['id']);
                Session::set('customer_name', $value['name']);
                header('Location: cart.php');
            } else {
                $failureAlert = '<div class="alert alert-danger alert-dismissible fade show" role="alert">Name or password is wrong. <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                return $failureAlert;
            }
        }
    }

    public function show_customer($id)
    {
        $query = "SELECT * FROM tbl_customer WHERE id='$id'";
        $result = $this->db->select($query);
        
        return  $result;
    }

    public function update_customer($data, $id)
    {
        $name = mysqli_real_escape_string($this->db->link, $data['name']);
        $city = mysqli_real_escape_string($this->db->link, $data['city']);
        $zipcode = mysqli_real_escape_string($this->db->link, $data['zipcode']);
        $email = mysqli_real_escape_string($this->db->link, $data['email']);
        $address = mysqli_real_escape_string($this->db->link, $data['address']);
        $country = mysqli_real_escape_string($this->db->link, $data['country']);
        $phone = mysqli_real_escape_string($this->db->link, $data['phone']);
        $password = mysqli_real_escape_string($this->db->link, $data['password']);

        if ($name == "" || $city == "" || $zipcode == "" || $email == "" || $address == "" || $country == "" || $phone == "" || $password == "") {
            $warningAlert = '<div class="alert alert-warning alert-dismissible fade show" role="alert">Information must not be empty! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            return $warningAlert;
        } else {
            $query = "UPDATE tbl_customer SET name='$name', city='$city', zipcode='$zipcode', email='$email', 
                                                address='$address', country='$country', phone='$phone', password='$password' WHERE id='$id'";
            $res = $this->db->update($query);
            if ($res == true) {
                $successAlert = '<div class="alert alert-success alert-dismissible fade show" role="alert">Updated Successfully. <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                return $successAlert;
            } else {
                $failureAlert = '<div class="alert alert-danger alert-dismissible fade show" role="alert">Failed to Update. <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                return $failureAlert;
            }
        }
    }
}
?>