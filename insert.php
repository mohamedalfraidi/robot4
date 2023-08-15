tions.
 20 changes: 20 additions & 0 deletions20  
get.html
@@ -0,0 +1,20 @@
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="insert.php" method="get">

        <input type="number" name="number">

        <input type="submit" name="submit">

    </form>
</body>

</html>
 45 changes: 45 additions & 0 deletions45  
insert.php
@@ -0,0 +1,45 @@
<?php


    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "robot";


    $conn = new mysqli($servername, $username, $password, $dbname);


    if ($conn->connect_error) {
        die("connection field" . $conn->connect_error);
    }

    $number = $_GET['number'];
    $sql = "INSERT INTO robot (Number) move ('$number')";


    // execute the query
    if ($conn->query($sql) === TRUE) {
        echo "<br>";
    } else {
        echo "an error happened" . $conn->error;
    }

    $sql = "SELECT * FROM robot WHERE id=(SELECT MAX(id)FROM robot)";


$result = $conn->query($sql);


if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
        echo "num: "   . $_GET["number"] ;echo " <br>ID : " . $row["id"];
    }
} else {
    echo "there is no data";
}

    $conn->close();

?>