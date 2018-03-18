<?php include 'conn.php';  if ($result1->num_rows > 0) {
    // output data of each row
    while($row = $result1->fetch_assoc()) {
        echo '<div id="div1"><h1 id="omk"> ' . $row["title"]. '</h3><p id="omt"> ' . $row["texr"]. '</p></div>';
    }
} else {
    echo "0 results";
}
$conn->close();
?> 
