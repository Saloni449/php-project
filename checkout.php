
<?php
require("mysqli_connect.php");
session_start();
if(!isset($_GET["bid"])){
    if(!$_SESSION["bid"]){
        echo "<br>Book id is not set!!!!<br>";
       
    }
  }
else{
    $_SESSION["bid"] =  $_GET["bid"];
// echo "<br>bookid is set<br>";

$SESSION_ID = intval($_SESSION['bid']);
// echo $SESSION_ID;

if($_SERVER['REQUEST_METHOD'] =='POST'){

    if(empty($_POST["firstname"]) || empty($_POST["lastname"]) || empty($_POST["email"]) || empty($_POST["card_number"])) {

        echo "<span style='color:red; font-size:2em'>Please fill required fields....!!</span>";
    }
    else{
        $firstname= $_POST["firstname"];
        $lastname= $_POST["lastname"];
        $email= $_POST["email"];
        $card_number= $_POST["card_number"];
    
    // Get Product details----------------------------------------------------
    
        $collectOrder = "SELECT * FROM bookinventory WHERE id = {$SESSION_ID}";
        $getItem = @mysqli_query($dbc, $collectOrder);
        $itemsGot = @mysqli_fetch_array($getItem);
        $i_id = $itemsGot["id"];
        $i_name = $itemsGot["name"];
      
    // Insert into Order Table---------------------------------------------
     $orderQuery = "INSERT INTO `bookinventoryorder`(`orderid`,`id`,`firstname`, `lastname`, `cardnumber`, `email`)
           VALUES (null,'{$i_id}','{$firstname}','{$lastname}','{$card_number}','{$email}')";
      
    

        $order_item = @mysqli_query($dbc,$orderQuery);
        // $orderedItem = @mysqli_fetch_array($order_item);

        echo "  <br><b><span style='color:red;font-size:2em'>". $i_name ." Book Ordered !!</span>";
    // Update Quantiy of perticular item in inventory table-----------------
        $updateQuery = "UPDATE bookinventory SET quantity = quantity - 1 WHERE id= {$SESSION_ID}";
        $update_table = @mysqli_query($dbc, $updateQuery);

        unset ($_SESSION['bid']);
        session_destroy();

    }
}
}   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <title>BookStore</title>
</head>
<body>
<form role="form" action= "checkout.php?bid=<?php echo $SESSION_ID ;?>" method="post" style="margin:auto;width:50%;margin-top:20px">
        <div class="form-group row">
            <label for="inputEmail" class="col-sm-2 col-form-label">first name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="" name="firstname" placeholder="firstname">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputEmail" class="col-sm-2 col-form-label">lastname</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="" name="lastname" placeholder="lastname">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="" name="email" placeholder="Email">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputEmail" class="col-sm-2 col-form-label">Card Number</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="" name="card_number" placeholder="card_number" maxlength="12">
            </div>
        </div>
        <div class="form-group row">
        <div class="offset-sm-2 col-sm-10 text-center">
          <input type="submit" value="Purchase" name="submit" class="btn btn-primary"/>
        </div>
      </div>
       
    </form>

</body>
</html>