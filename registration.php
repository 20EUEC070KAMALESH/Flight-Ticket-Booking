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
    $sql_qry = "INSERT INTO users (user_name,email_id,mobile,address,adhar_id,passport_no,password) VALUES ('".$_POST['user_name']."','".$_POST['emai_id']."', ".$_POST['mobile'].",'".$_POST['address']."',".$_POST['adhar_id'].",'".$_POST['passport_no']."','".$hash."')";
       //$sql_qry = "SELECT *  FROM users where email_id = '".$email."' AND pass  = '".$pass_text."'";
      // print_r( $sql_qry);
        $result = $conn->query($sql_qry);

        $last_id = $conn->insert_id;
      
        if($result){
              $sql_qry = "SELECT *  FROM users";
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

      <form method="post" action="registration.php">
      <input type="hidden" id="flight_id" name="flight_id" value="<?php echo $_REQUEST['flight_id']; ?>/> 
    <h1 class="h3 mb-3 fw-normal">Registration Form</h1>
    <div class="form-floating">
      <input type="text" class="form-control" id="user_name" name="user_name" placeholder="" required>
      <label for="name">name<span style="color:red">*</span></label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
      <label for="password">Password<span style="color:red">*</span></label>
    </div>

    <div class="form-floating">
      <input type="text" class="form-control" id="email_id" name="emai_id" placeholder="" required>
      <label for="Email">Email<span style="color:red">*</span></label>
    </div>
    <div class="form-floating">
      <input type="num" class="form-control" id="mobile" name="mobile" placeholder="" required>
      <label for="mobile">mobile<span style="color:red">*</span></label>
    </div>
    <div class="form-floating">
      <input type="text" class="form-control" id="address" name="address" placeholder="" required>
      <label for="address">address<span style="color:red">*</span></label>
    </div>
    <div class="form-floating">
      <input type="num" class="form-control" id="adhar_id" name="adhar_id" placeholder="" required>
      <label for="adhar ">adhar<span style="color:red">*</span></label>
    </div>
    <div class="form-floating">
      <input type="text" class="form-control" id="passport_no" name="passport_no" placeholder="" required>
      <label for="passport">passport<span style="color:red">*</span></label>
    </div>
   

    
    <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
  </form>
</div>
<?php } ?>
<?php require_once("footer.php"); ?>