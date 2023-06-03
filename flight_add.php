<?php require_once("header.php"); ?>
    <div class="container text-center border">
    <?php if($_POST){ ?>
      <?php 
       print_r($_POST);
       $pass_text = $_POST['password'];
       $hash = password_hash($pass_text, 
       PASSWORD_DEFAULT);
       print_r($hash);
      
       
//echo $pass_text;
    $sql_qry = "INSERT INTO flights(flight_name,flight_shortcode,company_name,no_of_seats) VALUES ('".$_POST['flight_name']."','".$_POST['flight_shortcode']."', '".$_POST['company_name']."',".$_POST['no_of_seats'].")";
       //$sql_qry = "SELECT *  FROM users where email_id = '".$email."' AND pass  = '".$pass_text."'";
      // print_r( $sql_qry);
        $result = $conn->query($sql_qry);
      //  print_r( $result);
//        print_r($conn->error);
        //die;
        if($result){
              $sql_qry = "SELECT *  FROM flights";
              $results=$conn->query($sql_qry);

              if ($results->num_rows > 0) {
                // output data of each row
                while($row = $results->fetch_assoc()) {
                  echo "id: " . $row["id"]. " - Name: " . $row["user_name"]. " " . $row["email_id"]. "<br>";
                  $role_id = $row['role_id'];
                }
              } else {
                echo "0 results";
                print_r($conn->error);
              }
        }
        else{
            echo "NOT INSERTED";
            print_r($conn->error);
          
        }
      
        print_r($role_id); 
        die;
    ?>
    

   <?php  } else { ?>

      <form method="post" action="flight_add.php">
      
    <h1 class="h3 mb-3 fw-normal">Add Flights</h1>
    <div class="form-floating">
      <input type="text" class="form-control" id="flight_name" name="flight_name" placeholder="" required>
      <label for="flight name">flight name<span style="color:red">*</span></label>
    </div>
    
    <div class="form-floating">
      <input type="text" class="form-control" id="flight_shortcode" name="flight_shortcode" placeholder="" required>
      <label for="flight shortcode">flight shortcode<span style="color:red">*</span></label>
    </div>
    <div class="form-floating">
      <input type="text" class="form-control" id="company_name" name="company_name" placeholder="" required>
      <label for="company name">company name<span style="color:red">*</span></label>
    </div>
    <div class="form-floating">
      <input type="num" class="form-control" id="no_of_seats" name="no_of_seats" placeholder="" required>
      <label for="number of seats ">number of seats<span style="color:red">*</span></label>
    </div>
  
   

    
    <button class="w-100 btn btn-lg btn-primary" type="submit">ADD</button>
  </form>
</div>
<?php } ?>
<?php require_once("footer.php"); ?>