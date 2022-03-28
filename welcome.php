<?php
// Initialize the session
session_start();
 
 
require_once "config.php";
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;

$username = "";
$acc_err = "";




}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
    <h1 class="my-5">Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to our Bank's site.</h1>
    
	
	
	
	
	
	<form action = "" method = "post">
	
		
	
	
	</form>
	<?php
		/* require_once "config.php";
		$sql = "SELECT balance FROM users WHERE username = ?";
		if($stmt = mysqli_prepare($link, $sql))
		{
			mysqli_stmt_bind_param($stmt, "s", $username);
			 if(mysqli_stmt_execute($stmt))
			{
				 mysqli_stmt_store_result($stmt);
				  mysqli_stmt_bind_result($stmt, $balance);
				 if(mysqli_stmt_num_rows($stmt) == 1){
                    if(mysqli_stmt_fetch($stmt)){
					$balance = $balance;}
					else
						$balance = 4000;
                } else{
					if(mysqli_stmt_fetch($stmt))
					{
                    $balance = $balance;
					}
					else
						$balance = 5000;
                }
				echo 'YOUR BALANCE IS '.$balance;
			}
		} */
		
		/*$connection = mysqli_connect("localhost", "root", "","demo"); // Establishing Connection with Server
		$db = mysqli_select_db("demo", $connection); // Selecting Database
		//MySQL Query to read data
		$query = mysqli_query("select balance from users where username = ".$username, $connection);
		while ($row = mysqli_fetch_array($query)) 
		{
			echo "{$row['balance']}";
		}*/
	
        $dbhost = 'localhost';
        $dbuser = 'ajay';
        $dbpass = '';
        $dbname = 'demo';
		
        $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
		 
        if($conn->connect_errno) {
           printf("Connect failed: %s<br />", $mysqli->connect_error);
           exit();
        }
		$username = htmlspecialchars($_SESSION["username"]);
        printf('Connected successfully.<br />');
		$sqlx = "SELECT balance FROM users where username = ".$username;
		$result = $conn->query($sqlx);
		if ($result->num_rows == 1) {
			while($row = $result->fetch_assoc()) 
				echo "<h3 class=\"my-4\">"."The balance is ".$row["balance"]."</h3>";
		}
	?>
	<for
	<br/>
	<p>
        <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
        <a href="logout.php" class="btn btn-danger ml-3">Sign Out of Your Account</a>
    </p>
</body>
</html>