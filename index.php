<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="./css/style.css">

</head>
<body>

<div class="container">

    <form method="post" action="connection2.php <?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >

        <div class="row">


            <div class="col">

                <h3 class="title">payment</h3>

                
                <div class="inputBox">
                    <span>name on card :</span>
                    <input type="text" name="name" placeholder="Name" value="<?php echo isset($_POST["name"]) ? htmlentities($_POST["name"]) : ''; ?>" >
                    
                </div>
                <div class="inputBox">
                    <span>credit card number :</span>
                    <input type="text" name="cardnumber" placeholder="16 Digit Number" value="<?php echo isset($_POST["cardnumber"]) ? htmlentities($_POST["cardnumber"]) : ''; ?>" >
                    
                </div>
                <div class="inputBox">
                    <span>exp month :</span>
                    <input type="text"name="month" placeholder="01" value="<?php echo isset($_POST["month"]) ? htmlentities($_POST["month"]) : ''; ?>" >
                    
                </div>

                <div class="flex">
                    <div class="inputBox">
                        <span>exp year :</span>
                        <input type="number"name="year" placeholder="2022" value="<?php echo isset($_POST["year"]) ? htmlentities($_POST["year"]) : ''; ?>" >
                        
                    </div>
                    <div class="inputBox">
                        <span>CVV :</span>
                        <input type="text"name="CVV" placeholder="***" value="<?php echo isset($_POST["CVV"]) ? htmlentities($_POST["CVV"]) : ''; ?>" >
                        
                    </div>
                </div>

            </div>
    
        </div>

        <input type="submit" value="proceed to pay" class="submit-btn">

    </form>

</div>    
    
</body>
</html>