<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./public/style.css">


    <title>Flats</title>
</head>
<body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="/">Liton's Flat</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-item nav-link" href="/">Home</a>
                    </div>
                </div>
        </nav>




<?php
$servername = "localhost";
$username = "root";
$password = "root";
$password = "root";
$dbname="litonFlat";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$location = $_POST["location"];
$flatSize= $_POST["flat_size"];



$sql = "SELECT * FROM allFlats WHERE location='$location' AND flatSize='$flatSize'";
$result = $conn->query($sql);

echo "<div class='allFlats'>";
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

        echo "<div class=card'>";
        echo "<img class='card-img-top' src='".$row['imageURL']."'>";
        echo '<div class="card-body">';
        echo  "<h5 class='card-title'>".$row["flatSize"]."</h5>";
        echo  "<p class='card-text'>".$row["configaration"]."</p>";
        echo  "<p class='card-text'>".$row["location"]."</p>";
        echo  "<a  class='btn btn-primary'>".$row["rent"]."</a>";
        echo "</div>";
        echo "</div>";

        // echo "<div class='card'>";
        //     echo "".$row["rent"];
        // echo "</div>";
        // echo "" . $row["rent"]. " - flatSize: " . $row["flatSize"]. " postedBy" . $row["postedBy"]. "<br>";
    }
} else {
    echo "Sorry, No flat available";
}
echo "</div>";

$conn->close();

?> 

</body>
</html>