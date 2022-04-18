<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
  function clean_input($field){
    $field=trim($field);
    $field=stripslashes($field);
    $field=htmlspecialchars($field);
    return $field;
  }
  function validate_name(){
    $name=clean_input($_POST['name']);
    if(strlen($name)==0){
      echo "<p style='color:red;'>name cannot be empty</p>";
      return;
    }
    if (!preg_match("/^[A-Z ]*$/",$name)) {  
      echo "<p style='color:red;'>Only alphabets and white space are allowed</p>";  
      return;
  }  
  }
  function validate_cardnumber(){
    $cardnumber=clean_input($_POST['cardnumber']);
    if(strlen($cardnumber)!=16){
      echo "<p style='color:red;'>card number should be of 16 digit</p>";
      return;
    }
    if (!preg_match ("/^[0-9]*$/", $cardnumber) ) {  
        echo "<p style='color:red;'>Only numeric value is allowed.</p>";
        return;      
    }
   
  }
  function validate_month(){
    $month=($_POST['month']);
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
      
  }
  function validate_year(){
    $year1 = date("Y"); 
    $year=clean_input($_POST['year']);
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
  }
  function validate_CVV(){
    $CVV=clean_input($_POST['CVV']);
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
}
}

?>  
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="./css/style.css">

</head>
<body>

<div class="container">

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >

        <div class="row">


            <div class="col">

                <h3 class="title">payment</h3>

                
                <div class="inputBox">
                    <span>name on card :</span>
                    <input type="text" name="name" placeholder="Name" value="<?php echo isset($_POST["name"]) ? htmlentities($_POST["name"]) : ''; ?>" >
                    <?php
                    if($_SERVER["REQUEST_METHOD"]=="POST"){
                    validate_name();
                    }
                    ?>
                      </div>
                <div class="inputBox">
                    <span>credit card number :</span>
                    <input type="text" name="cardnumber" placeholder="16 Digit Number" value="<?php echo isset($_POST["cardnumber"]) ? htmlentities($_POST["cardnumber"]) : ''; ?>"  >
                    <?php
                    if($_SERVER["REQUEST_METHOD"]=="POST"){
                    validate_cardnumber();
                    }
                    ?>
                </div>
                <div class="inputBox">
                    <span>exp month :</span>
                    <input type="text"name="month" placeholder="01" value="<?php echo isset($_POST["month"]) ? htmlentities($_POST["month"]) : ''; ?>"  >
                    <?php
                    if($_SERVER["REQUEST_METHOD"]=="POST"){
                    validate_month();
                    }
                    ?>
                </div>

                <div class="flex">
                    <div class="inputBox">
                        <span>exp year :</span>
                        <input type="number"name="year" placeholder="2022" value="<?php echo isset($_POST["year"]) ? htmlentities($_POST["year"]) : ''; ?>"  >
                        <?php
                    if($_SERVER["REQUEST_METHOD"]=="POST"){
                    validate_year();
                    }
                    ?>
                    </div>
                    <div class="inputBox">
                        <span>CVV :</span>
                        <input type="text"name="CVV" placeholder="***" value="<?php echo isset($_POST["CVV"]) ? htmlentities($_POST["CVV"]) : ''; ?>"  >
                        <?php
                    if($_SERVER["REQUEST_METHOD"]=="POST"){
                    validate_CVV();
                    }
                    ?>
                    </div>
                </div>

            </div>
    
        </div>

        <input type="submit" value="proceed to pay" class="submit-btn">

    </form>

</div>    
    
</body>
</html>