<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../helpers/format.php');
include_once ($filepath.'/../lib/database.php');
?>

<?php
class category
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new  Database();
        $this->fm = new Format();
    }
    public function insert_category($catName)
    {
        $catName = $this->fm->validation($catName);
        $catName = mysqli_real_escape_string($this->db->link, $catName);

        if (empty($catName)) {
            $warningAlert = '<div class="alert alert-warning alert-dismissible fade show" role="alert">Category must not be empty! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            return $warningAlert;
        } else {
            $query = "INSERT INTO tbl_category(catName) VALUES('$catName')";
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
    public function show_category()
    {
        $query = "SELECT * FROM tbl_category  ORDER BY catId DESC";
        $result = $this->db->select($query);
        
        return  $result;
    }

    //edit category
    public function update_category($catName, $id)
    {
        $catName = $this->fm->validation($catName);
        $catName = mysqli_real_escape_string($this->db->link, $catName);
        $id = mysqli_real_escape_string($this->db->link, $id);

        if (empty($catName)) {
            $warningAlert = '<div class="alert alert-warning" role="alert">Category must not be empty!</div>';
            return $warningAlert;
        } else {
            $query = "UPDATE tbl_category SET catName='$catName' WHERE catId='$id'";
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

    public function del_category($id)
    {
        $query = "DELETE FROM tbl_category WHERE catId = '$id'";
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

    public function getcatbyId($id)
    {
        $query = "SELECT * FROM tbl_category WHERE  catId='$id' ";
        $result = $this->db->select($query);
        return $result;
    }
    
}
?>