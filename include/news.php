<?php
include 'conn.php';  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["title"]. " " . $row["date"]. "" . $row["text"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?> 