<?php include('connect.php');
if(isset($_POST['url'])) {$url = $_POST['url'];
$sql_query = "UPDATE url SET url='".$url."' WHERE id=1";
if ($sql_connect->query($sql_query) === TRUE) {
	echo 'Done!';
} else {
    echo "Error updating record: " . $sql_connect->error;
}
$conn->close();
}