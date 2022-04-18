<?php
	$name = $_POST['name'];
	$cardnumber = $_POST['cardnumber'];
	$month = $_POST['month'];
	$year = $_POST['year'];
	$CVV = $_POST['CVV'];

	if($_SERVER["REQUEST_METHOD"]=="POST"){

    if(strlen($name)==0){
	echo "<p style='color:red;'>name cannot be empty</p>";
	return;
    }
    if (!preg_match("/^[A-Z ]*$/",$name)) {  
	echo "<p style='color:red;'>Only capital alphabets and white space are allowed</p>";  
	return;
	}  
	if(strlen($cardnumber)!=16){
	echo "<p style='color:red;'>card number should be of 16 digit</p>";
	return;
	}
	if (!preg_match ("/^[0-9]*$/", $cardnumber) ) {  
	echo "<p style='color:red;'>Only numeric value is allowed.</p>";
	return;      
	}
	if(strlen($month)!=2){
	echo "<p style='color:red;'>month should be of 2 digit</p>";
	return;
	}
	if (!preg_match ("/^[0-9]*$/", $month) ) {  
	echo "<p style='color:red;'>Only numeric value is allowed.</p>";
	return;      
	}
	if($month<1 || $month>12){
	echo "<p style='color:red;'>month should lie between 1-12</p>";
	return;
	}
	$year1 = date("Y"); 
	if(strlen($year)!=4){
	echo "<p style='color:red;'>year should be of 4 digit</p>";
	return;
	}
	if (!preg_match ("/^[0-9]*$/", $year) ) {  
	echo "<p style='color:red;'>Only numeric value is allowed.</p>";
	return;      
	}
	if($year < $year1){
	echo "<p style='color:red;'>year should be from ".$year1." onwards</p>";
	return;
	}
	if(strlen($CVV)==0){
	echo "<p style='color:red;'>CVV cannot be empty</p>";
	return;
	}
	if(strlen($CVV)!=3){
	echo "<p style='color:red;'>CVV should be of 3 numbers</p>";
	return;
	}
	if (!preg_match ("/^[0-9]*$/", $CVV) ) {  
	echo "<p style='color:red;'>Only numeric value is allowed.</p>";
	return;      
	}
    $conn = new mysqli('localhost','root','','payment');
	if($conn->connect_error){
	echo "$conn->connect_error";
	die("Connection Failed : ". $conn->connect_error);
	}
    else {
		$stmt = $conn->prepare("insert into record(name, cardnumber, month, year, CVV) values(?, ?, ?, ?, ?)");
		$stmt->bind_param("siiii", $name, $cardnumber, $month, $year, $CVV);
		$execval = $stmt->execute();
		echo $execval;
		echo "payment successfully...";
		$stmt->close();
		$conn->close();
	}
	}
?>