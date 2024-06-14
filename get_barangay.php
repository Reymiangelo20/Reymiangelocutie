<?php
    require_once("dbcon.php");

    if (isset($_GET['city'])) {
        $city = $_GET['city'];

        $sql = "SELECT * FROM philippine_barangays WHERE city_municipality_code = '$city'";
        $query = mysqli_query($conn, $sql);
        $barangay = array();

        while ($row = mysqli_fetch_assoc($query)) {
            $barangay[] = $row;
        }

        if ($query) {
            echo json_encode($barangay);
        }
    }
?>
