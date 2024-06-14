<?php
    require_once("dbcon.php");

    if (isset($_GET['province'])) {
        $province = $_GET['province'];

        $sql = "SELECT * FROM philippine_cities WHERE province_code = '$province'";
        $query = mysqli_query($conn, $sql);
        $city = array();

        while ($row = mysqli_fetch_assoc($query)) {
            $city[] = $row;
        }

        if ($query) {
            echo json_encode($city);
        }
    }
?>
