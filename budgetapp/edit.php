<?php
$servername = "localhost";
$databasename = "budgetapp_db";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password, $databasename);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";
?>


<?php
if (isset($_GET['id'])) {
	$selectedid=$_GET['id'];
	
}
	
		
	elseif (isset($_POST['btn_update'])) {
          $id=$_POST['id'];
          $itemname=$_POST['itemname'];
           $itemcost=$_POST['itemcost'];

          $query="UPDATE budgetitem_tbl SET itemname='{$itemname}',
          itemcost='{$itemcost}'

          WHERE id=$id";
          $result=mysqli_query($conn,$query ) or die(mysqli_error($conn));
	    header("Location: edit.php");
	}
	else{header("Location: index.php?success=true&$selectedid=id");}
   
      $query="SELECT* FROM budgetitem_tbl WHERE id=$selectedid";
      $result= mysqli_query($conn,$query);
		 while($row=mysqli_fetch_array($result)){
    	$itemname=$row['itemname'];
    	$itemcost=$row['itemcost'];

    }
	
	

?>
<!DOCTYPE html>
<html>
<head>
	<title>form</title>
		<link rel="stylesheet" href="css/bootstrap.min.css">
		
</head>
<body style="background-image: url(images/budget.jpg);
  background-repeat: no-repeat;
  background-size: cover;
  color:#fff;">
<div class="container-fluid">
<div class="row">
<div class="col-md-2"></div>
<div class="col-md-8">
<?php
if (isset($_GET['success'])) {
  # code...

?>

<div class="alert alert-success alert ">
    
    <strong>Success!</strong> 
  </div>
<?php
}
?>

<form action="edit.php" method="POST">


<input type="hidden" name="id" class="form-control" value="<?php echo $selectedid;

?>"><br>
<label>Item name</label>
<input type="text" name="itemname" class="form-control" ><br>
<label>Item cost</label>
<input type="text" name="itemcost" class="form-control" ><br>

<input type="submit" name="btn_update"  class="btn btn-primary" value="UPDATE" style="width: 100%;margin-bottom: 15px;"><br>
<input type="submit" name="btn_cancel"  class="btn btn-danger" value="CANCEL" style="width: 100%;">
        

		

	</form>
	</div>
	<div class="col-md-2"></div>
	</div>
	</div>
	</body>
	</html>