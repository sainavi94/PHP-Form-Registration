

<?php 
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'crud');

	// initialize variables
	$firstname = "";
	$lastname = "";
    $id = 0;
	$update = false;

	if (isset($_POST['save'])) {
		$firstname = $_POST['firtname'];
		$lastname = $_POST['lastname'];

		mysqli_query($db, "INSERT INTO info (firstname, lastname VALUES ('$firstname', '$lastname')"); 
		$_SESSION['message'] = "firstname saved";
        $_SESSION['message'] = "lastname saved"; 
		header('location: index.php');
	}
    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
    
        mysqli_query($db, "UPDATE info SET firstname='$firstname', lastname='$lastname' WHERE id=$id");
        $_SESSION['message'] = "firstname updated!"; 
        $_SESSION['message'] = "lastname updated!"; 
        header('location: index.php');
    }
    if (isset($_GET['del'])) {
        $id = $_GET['del'];
        mysqli_query($db, "DELETE FROM info WHERE id=$id");
        $_SESSION['message'] = "firstname deleted!"; 
        $_SESSION['message'] = "lastname deleted!"; 
        header('location: index.php');
    }