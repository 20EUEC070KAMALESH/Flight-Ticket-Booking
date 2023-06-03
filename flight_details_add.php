<?php require_once("header.php"); ?>
    <div class="container text-center border">
    <?php if($_POST){ ?>
      <?php 

      $total_hours = calculate_hours($_POST['depature_time'] , $_POST['arrival_time']);

       print_r($total_hours);  

      
       
//echo $pass_text;
    $sql_qry = "INSERT INTO flights_details(depature_id,arrival_id,flight_id,depature_date,arrival_date,depature_time,arrival_time,total_hours) VALUES (".$_POST['depature_id'].",".$_POST['arrival_id'].", ".$_POST['flight_id'].",'".$_POST['depature_date']."','".$_POST['arrival_date']."','".$_POST['depature_time']."','".$_POST['arrival_time']."',".$total_hours.")";
       //$sql_qry = "SELECT *  FROM users where email_id = '".$email."' AND pass  = '".$pass_text."'";
      // print_r( $sql_qry);
        $result = $conn->query($sql_qry);
      //  print_r( $result);
//        print_r($conn->error);
        //die;
        if($result){
              $sql_qry = "SELECT *  FROM flights_details";
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
      
    ?>
    

   <?php  } else { 
    $s="SELECT *  FROM destinations";
    $resul=$conn->query($s);
   
    
    $i=1;

    if ($resul->num_rows > 0) {
        // output data of each row        
        $Flight_cities=array();
        while($row = $resul->fetch_assoc()) {
            $Flight_cities[$i]["id"]=$row["id"];
            $Flight_cities[$i]["city"]=$row["city"];
            $Flight_cities[$i]["city_shortcode"]=$row["city_shortcode"];
            $i++;

        }
        echo"<pre>";
        //print_r($Flight_cities);
        
      } else {
        echo "0 resul";
        print_r($conn->error);
      }

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

      <form method="post" action="flight_details_add.php">
      
    <h1 class="h3 mb-3 fw-normal">Flight Details ADD</h1>
    <div class="form-floating">
    <select class="form-control form-control-lg"id="depature_id" name="depature_id" >
  <option>select Boarding</option>
  <?php foreach($Flight_cities as $detail)
  {
    echo "<option value=".$detail["id"].">".$detail["city"]."-".$detail["city_shortcode"]."</option>";
  }
  ?>
</select>
      <label for="Boarding city">Boarding city<span style="color:red">*</span></label>
    </div>
    
    <div class="form-floating">
    <select class="form-control form-control-lg" id="arrival_id" name="arrival_id" >
  <option value="">select Destination</option>
  <?php foreach($Flight_cities as $detail)
  {
    echo "<option value=".$detail["id"].">".$detail["city"]."-".$detail["city_shortcode"]."</option>";
  }
  ?>
</select>
      <label for="Destination">Destination<span style="color:red">*</span></label>
    </div>
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
    <input type="date" class="form-control" id="depature_date" min ='<?php echo date('Y-m-d');?>'max="2099-12-31"  name="depature_date" required>
      <label for="Depature Date">Depature Date<span style="color:red">*</span></label>
    </div>
    <div class="form-floating">
    <input type="date" class="form-control" id="arrival_date" min ='<?php echo date('Y-m-d');?>'max="2099-12-31" name="arrival_date" required>
      <label for="Arrival Date">Arrival Date<span style="color:red">*</span></label>
    </div>
    <div class="form-floating">
      <input type="time" class="form-control" id="depature_time" min ='<?php echo date('H:I');?>' name="depature_time" placeholder="" required>
      <label for="Depature Time">Depature Time<span style="color:red">*</span></label>
    </div>
    <div class="form-floating">
      <input type="time" class="form-control" id="arrival_time" min ='<?php echo date('H:I');?>' name="arrival_time" placeholder="" required>
      <label for="Arrival Time">Arrival Time<span style="color:red">*</span></label>
    </div>
  
   

    
    <button class="w-100 btn btn-lg btn-primary" type="submit">Search</button>
  </form>
</div>
<?php } 
function calculate_hours($start, $end){
  //print_r($start);
  //print_r($end);
  $day1hours = $start;
  $day2hours = $end;
$day1 = explode(":", $day1hours);
$day2 = explode(":", $day2hours);

$totalmins = 0;
$totalmins = $day1[1]  - $day2[1];
$diff_hrs = $day2[0] - $day1[0];


 
$totalmins = ($diff_hrs*60)+$totalmins;

return $totalmins;   
}
?>
<?php require_once("footer.php"); ?>