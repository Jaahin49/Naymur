<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
<?php include "./header.php"; ?>
<?php 
require_once "config.php";

$user = isset($_GET['user'])? $_GET['user'] : $_SESSION["username"];
$sql = "SELECT image_id, mime FROM `uploads` WHERE username = '".$user."' ORDER by upload_time DESC";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
	echo "<div class='photo_container'>";
	$ph = 1;
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$mime = 'jpg';
		if ($row['mime']=='image/jpeg'){
			$mime = 'jpg';
		} else if ($row['mime']=='image/png'){
			$mime = 'png';
		} else if ($row['mime']=='image/gif'){
			$mime = 'gif';
		}
		echo "<div class='item item".$ph."'>";
		echo "<a href='./photo.php?id=".$row["image_id"]."'>";
        echo "<img src='./img/uploads/" . $row["image_id"].".".$mime."' ></a></div>";
    }
	echo "</div>";
} else {
    echo "0 results";
}
$mysqli->close();

?>

<?php include "./footer.php"; ?>