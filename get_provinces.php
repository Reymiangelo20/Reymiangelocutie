<?php
    require_once("dbcon.php");

    if (isset($_GET['region'])) {
        $region = $_GET['region'];

        $sql = "SELECT * FROM philippine_provinces WHERE region_code = '$region'";
        $query = mysqli_query($conn, $sql);
        $provinces = array();

        while ($row = mysqli_fetch_assoc($query)) {
            $provinces[] = $row;
        }

        if ($query) {
            echo json_encode($provinces);
        }
    }
?>
