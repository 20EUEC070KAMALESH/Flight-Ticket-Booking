<?php require_once("header.php"); ?>
    <div class="container text-center border">
    <?php if($_POST){ ?>
      <?php 
       print_r($_POST);
       
//echo $pass_text;
    $sql_qry = "INSERT INTO fare_details(flight_id,fare_amount,depature_date) VALUES (".$_POST['flight_id'].",".$_POST['fare_amount'].", '".$_POST['depature_date']."')";
       //$sql_qry = "SELECT *  FROM users where email_id = '".$email."' AND pass  = '".$pass_text."'";
      // print_r( $sql_qry);
        $result = $conn->query($sql_qry);
      //  print_r( $result);
//        print_r($conn->error);
        //die;
        if($result){
              $sql_qry = "SELECT *  FROM fare_details";
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
    ?>
    

    <?php  } else { 
        $i=1;

      $flights="Select * from flights";
      $res=$conn->query($flights);

      if ($res->num_rows > 0) {
        // output data of each row
        $i=1;
        $Fli_cities=array();
        while($row = $res->fetch_assoc()) {
            $Fli_cities[$i]["id"]=$row["id"];
            $Fli_cities[$i]["flight_name"]=$row["flight_name"];
            $Fli_cities[$i]["flight_shortcode"]=$row["flight_shortcode"];
            $i++;

        }
        echo"<pre>";
        //print_r($Flight_cities);
        
      } else {
        echo "0 resul";
        print_r($conn->error);
      }
    //print_r($resul);
    
    ?>
      <form method="post" action="fair_details.php">
      
    <h1 class="h3 mb-3 fw-normal">Fair Details</h1>
    <div class="form-floating"  >
    <select class="form-control form-control-lg" id="flight_id" name="flight_id">
      
  <option>Flight Name</option>
  <?php foreach($Fli_cities as $detail)
  {
    echo "<option value=".$detail["id"].">".$detail["flight_name"]."-".$detail["flight_shortcode"]."</option>";
  }
  ?>
</select>

      <label for="flight name">flight name<span style="color:red">*</span></label>
    </div>
    
    <div class="form-floating">
      <input type="num" step=0.01 class="form-control" id="fare_amount" name="fare_amount" placeholder="" required>
      <label for="Flight Fare">Flight Fare<span style="color:red">*</span></label>
    </div>
    <div class="form-floating">
    <input type="date" class="form-control" id="depature_date" min ='<?php echo date('Y-m-d');?>' max="2099-12-31" name="depature_date" required>
      <label for="Date">Depature Date<span style="color:red">*</span></label>
    </div>
  
   

    
    <button class="w-100 btn btn-lg btn-primary" type="submit">ADD</button>
  </form>
</div>
<?php } ?>
<?php require_once("footer.php"); ?>