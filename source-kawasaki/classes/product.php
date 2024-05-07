<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../helpers/format.php');
include_once($filepath . '/../lib/database.php');
?>


<?php
class product
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new  Database();
        $this->fm = new Format();
    }

    public function insert_product($data, $files)
    {
        $productName = mysqli_real_escape_string($this->db->link, $data['productName']);
        $category = mysqli_real_escape_string($this->db->link, $data['category']);
        $productPrice = mysqli_real_escape_string($this->db->link, $data['productPrice']);
        $productType = mysqli_real_escape_string($this->db->link, $data['productType']);
        $productDesc = mysqli_real_escape_string($this->db->link, $data['productDesc']);

        $imageUrls = array(); // Mảng để lưu trữ URL của các hình ảnh

        // Lặp qua từng file hình ảnh
        foreach ($files as $key => $file) {
            if (isset($file['tmp_name']) && !empty($file['tmp_name'])) {
                // Đọc dữ liệu từ file ảnh
                $imageData = file_get_contents($file["tmp_name"]);

                // Gửi yêu cầu upload ảnh đến Imgur API
                $client_id = "6109543d7295e4c"; // Thay YOUR_CLIENT_ID bằng client id của ứng dụng bạn đăng ký trên Imgur
                $api_url = 'https://api.imgur.com/3/image';
                $headers = array("Authorization: Client-ID $client_id");
                $postData = array('image' => base64_encode($imageData));

                $curl = curl_init();
                curl_setopt_array($curl, array(
                    CURLOPT_URL => $api_url,
                    CURLOPT_TIMEOUT => 30,
                    CURLOPT_POST => true,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_HTTPHEADER => $headers,
                    CURLOPT_POSTFIELDS => $postData
                ));

                $response = curl_exec($curl);
                $err = curl_error($curl);
                curl_close($curl);

                if ($err) {
                    $failureAlert = '<div class="alert alert-danger alert-dismissible fade show" role="alert">Failed to upload image. <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                    return $failureAlert;
                } else {
                    $responseData = json_decode($response, true);
                    $imageUrls[$key] = $responseData['data']['link']; // Lưu URL của hình ảnh vào mảng
                }
            } elseif ($key === 'productImage') {
                $failureAlert = '<div class="alert alert-danger alert-dismissible fade show" role="alert">Image not found in file data. <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                return $failureAlert;
            }
        }

        if ($productName == "" || $category == "" || $productPrice == "" || $productType == "" || $productDesc == "" || empty($imageUrls)) {
            $warningAlert = '<div class="alert alert-warning alert-dismissible fade show" role="alert">Product must not be empty! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            return $warningAlert;
        } else {
            // Lấy URL của ảnh đầu tiên (productImage)
            $imageUrl = $imageUrls['productImage'];

            // Tạo chuỗi SQL cho việc chèn dữ liệu
            $query = "INSERT INTO tbl_product (productName, catId, productPrice, productType, productDesc, productImage";

            // Thêm các cột hình ảnh phụ nếu có
            for ($i = 1; $i <= 6; $i++) {
                if (isset($imageUrls["productImage_$i"])) {
                    $query .= ", productImage_$i";
                }
            }

            $query .= ") VALUES ('$productName', '$category', '$productPrice', '$productType', '$productDesc', '$imageUrl'";

            // Thêm các URL hình ảnh phụ vào chuỗi SQL
            for ($i = 1; $i <= 6; $i++) {
                if (isset($imageUrls["productImage_$i"])) {
                    $query .= ", '" . $imageUrls["productImage_$i"] . "'";
                }
            }

            $query .= ")";

            // Thực thi truy vấn
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

    public function show_product()
    {
        $query = "SELECT tbl_product.*, tbl_category.catName FROM tbl_product INNER JOIN tbl_category ON tbl_product.catId = tbl_category.catId ORDER BY tbl_product.productId DESC";
        $result = $this->db->select($query);

        return  $result;
    }
    public function update_product($data, $files, $id)
    {
        $productName = mysqli_real_escape_string($this->db->link, $data['productName']);
        $category = mysqli_real_escape_string($this->db->link, $data['category']);
        $productPrice = mysqli_real_escape_string($this->db->link, $data['productPrice']);
        $productType = mysqli_real_escape_string($this->db->link, $data['productType']);
        $productDesc = mysqli_real_escape_string($this->db->link, $data['productDesc']);
        $id = mysqli_real_escape_string($this->db->link, $id);

        // Initialize an empty array to store image URLs
        $imageUrls = array();

        // Check if additional product images are uploaded
        for ($i = 1; $i <= 6; $i++) {
            if (!empty($files["productImage_$i"]['tmp_name'])) {
                // Read image data from the file
                $imageData = file_get_contents($files["productImage_$i"]["tmp_name"]);

                // Send the image upload request to Imgur API
                $client_id = "6109543d7295e4c"; // Replace YOUR_CLIENT_ID with your actual client ID from Imgur
                $api_url = 'https://api.imgur.com/3/image';
                $headers = array("Authorization: Client-ID $client_id");
                $postData = array('image' => base64_encode($imageData));

                // Send the image upload request to Imgur API
                $curl = curl_init();
                curl_setopt_array($curl, array(
                    CURLOPT_URL => $api_url,
                    CURLOPT_TIMEOUT => 30,
                    CURLOPT_POST => true,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_HTTPHEADER => $headers,
                    CURLOPT_POSTFIELDS => array('image' => base64_encode($imageData))
                ));

                $response = curl_exec($curl);
                $err = curl_error($curl);
                curl_close($curl);

                if ($err) {
                    $failureAlert = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>Failed to upload additional image $i. <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
                    return $failureAlert;
                } else {
                    $responseData = json_decode($response, true);
                    $imageUrls["productImage_$i"] = $responseData['data']['link']; // Store the URL of additional image $i
                }
            }
        }

        // Check if any product information is empty
        if ($productName == "" || $category == "" || $productPrice == "" || $productType == "" || $productDesc == "") {
            $warningAlert = '<div class="alert alert-warning alert-dismissible fade show" role="alert">Product information must not be empty! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            return $warningAlert;
        } else {
            // Construct the SQL query to update product information
            $query = "UPDATE tbl_product SET 
                    productName='$productName',
                    catId = '$category',
                    productPrice = '$productPrice',
                    productType= '$productType',
                    productDesc='$productDesc'";

            // Add URLs of main and additional images to the SQL query if they are uploaded
            foreach ($imageUrls as $key => $url) {
                $query .= ", $key='$url'";
            }

            $query .= " WHERE productId='$id'";

            // Execute the SQL query
            $res = $this->db->update($query);

            if ($res == true) {
                $successAlert = '<div class="alert alert-success alert-dismissible fade show" role="alert">Updated successfully. <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                return $successAlert;
            } else {
                $failureAlert = '<div class="alert alert-danger alert-dismissible fade show" role="alert">Failed to update. <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                return $failureAlert;
            }
        }
    }

    public function del_product($id)
    {
        $query = "DELETE FROM tbl_product WHERE productId = '$id'";
        $res = $this->db->delete($query);

        if ($res == true) {
            $successAlert = '<div class="alert alert-success alert-dismissible fade show" role="alert" id="deleteAlert">
                                Deleted Successfully. 
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';

            return $successAlert;
        } else {
            $failureAlert = '<div class="alert alert-danger alert-dismissible fade show" role="alert" id="deleteAlert">
                                Failed to Delete. 
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            return $failureAlert;
        }
    }
    public function getproductbyId($id)
    {
        $query = "SELECT * FROM tbl_product WHERE  productId='$id' ";
        $result = $this->db->select($query);
        return $result;
    }

    public function getproduct_feathered()
    {
        $query = "SELECT * FROM tbl_product WHERE  productType='1' ";
        $result = $this->db->select($query);
        return $result;
    }

    public function getproduct_ninja()
    {
        $query = "SELECT * FROM tbl_product WHERE  catId='11' ";
        $result = $this->db->select($query);
        return $result;
    }
    public function getproduct_z()
    {
        $query = "SELECT * FROM tbl_product WHERE  catId='2' ";
        $result = $this->db->select($query);
        return $result;
    }
    public function getproduct_vulcan()
    {
        $query = "SELECT * FROM tbl_product WHERE  catId='1' ";
        $result = $this->db->select($query);
        return $result;
    }
}
?>