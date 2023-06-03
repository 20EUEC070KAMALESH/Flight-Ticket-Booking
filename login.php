<?php require_once("header.php"); ?>
    <div class="container text-center border">
    <?php if($_POST){ ?>
      <?php 

         $pass_text = $_POST['password'];
        $email = $_POST['email'];
       
//echo $pass_text;

        $sql_qry = "SELECT *  FROM users where email_id = '".$email."' AND pass  = '".$pass_text."'";
        $result = $conn->query($sql_qry);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
              echo "id: " . $row["id"]. " - Name: " . $row["user_name"]. " " . $row["email_id"]. "<br>";
              $role_id = $row['role_id'];
            }
          } else {
            echo "0 results";
          }
        print_r($role_id); 
        die;
    ?>
    

   <?php  } else { ?>

      <form method="post" action="login.php">
      
    <h1 class="h3 mb-3 fw-normal">Please Login</h1>

    <div class="form-floating">
      <input type="text" class="form-control" id="email" name="email" placeholder="email" required>
      <label for="Email">Email<span style="color:red">*</span></label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
      <label for="password">Password<span style="color:red">*</span></label>
    </div>

    
    <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
    
  </form>
</div>
<?php } ?>
<?php require_once("footer.php"); ?>