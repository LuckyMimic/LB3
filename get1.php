<?php
include('connect.php');

$vendor_id = $_GET['vendor'];

try {
    $sqlSelect = "SELECT items.name, items.price, items.quantity, items.quality, category.c_name 
                  FROM items 
                  JOIN category ON items.FID_Category = category.ID_Category 
                  WHERE items.FID_Vendor = ?";

    $stmt = $dbh->prepare($sqlSelect);

    $stmt->bindValue(1, $vendor_id);
    $stmt->execute();
    $res = $stmt->fetchAll();

    echo "<table border='1'>";
    echo "<thead><tr><th>Name</th><th>Price</th><th>Quantity</th><th>Quality</th><th>Category</th></tr></thead>";
    echo "<tbody>";

    foreach($res as $row)
    {
        echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td></tr>";
    }
    
    echo "</tbody>";
    echo "</table>";
}
catch(PDOException $ex) {
    echo $ex->GetMessage();
}

$dbh = null;
?>
