<?php require_once("header.php"); ?>
    <div class="container text-center border">
    <?php if($_POST){ ?>
      <?php 
       print_r($_POST);
       
//echo $pass_text;
    
$sql_qry = "SELECT 
fs.flight_name, fs.flight_shortcode,fs.id as flight_id, fd.depature_date, fd.depature_time, fd.arrival_date,fd.arrival_time,
fd.total_hours,fd.id as detail_id, dep_dest.city_shortcode as dep_city, arr_dest.city_shortcode as arr_city, fare.fare_amount 
FROM flights_details fd 
LEFT join flights fs on fs.id = fd.flight_id 
LEFT JOIN destinations as dep_dest on dep_dest.id = fd.depature_id 
LEFT JOIN destinations as arr_dest on arr_dest.id = fd.arrival_id 
LEFT JOIN fare_details as fare on fare.flight_id = fd.flight_id
WHERE depature_id = ".$_POST['depature_id']." AND arrival_id = ".$_POST['arrival_id']." AND fd.depature_date ='".$_POST['depature_date']."' and HOUR(depature_time) >= '".$_POST['depature_time']."' and 
HOUR(arrival_time) <= '".$_POST['arrival_time']."' group by fd.flight_id , fd.depature_date order by fd.depature_date , fd.depature_time ";
      // print_r( $sql_qry);
        $result = $conn->query($sql_qry);
      
        if($result){             


              if ($result->num_rows > 0) {
                $i=1;
                // output data of each row
                while($row = $result->fetch_assoc()) { ?>

                <table class="table">
                <thead>
                        <th>#</th>
                        <th>Dep. date</th>
                        <th>Flight Name</th>
                        <th>from</th>
                        <th>To</th>
                        <th>Dep. Time</th>
                        <th>Arr. time</th>
                        <th>Total Hrs(HH:mm)</th>
                        <th>Fare</th>
                        <th>Action</th>
                </thead>
                <tbody>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $row['depature_date']; ?></td>
                    <td><?php echo $row['flight_name']; ?></td>
                    <td><?php echo $row['dep_city']; ?></td>
                    <td><?php echo $row['arr_city']; ?></td>
                    <td><?php echo $row['depature_time']; ?></td>
                    <td><?php echo $row['arrival_time']; ?></td>
                    <td><?php echo $row['total_hours']; ?></td>
                    <td><?php echo $row['fare_amount']; ?></td>
                    <td><a href="booking.php?flight_id=<?php echo $row['flight_id']; ?>&det_id=<?php echo $row['detail_id']; ?>&amt=<?php echo $row['fare_amount']; ?>"> Book</a></td>
                </tbody>
            </table>
                  
                <?php
                $i++;
                }
              } else {
                echo "0 results";
                print_r($conn->error);
              }
        }
        else{
            echo "Your Search is Empty";
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
     //   echo"<pre>";
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
      <form method="post" action="search.php">
      
    <h1 class="h3 mb-3 fw-normal">Flights</h1>
    <div class="form-floating">
    <select class="form-control form-control-lg"id="depature_id" name="depature_id" >
  <option>select Boarding</option>
  <?php foreach($Flight_cities as $detail)
  {
    echo "<option value=".$detail["id"].">".$detail["city"]."-".$detail["city_shortcode"]."</option>";
  }
  ?>
</select>
      <label for="FROM">FROM<span style="color:red">*</span></label>
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
      <label for="TO">TO<span style="color:red">*</span></label>
    </div>
  
    <div class="form-floating">
    <input type="date" class="form-control" id="depature_date" min ='<?php echo date('Y-m-d');?>'max="2099-12-31" name="depature_date" required>
      <label for="Date">Date<span style="color:red">*</span></label>
    </div>
    <div class="form-floating">
      <input type="time" class="form-control" id="depature_time" min ='<?php echo date('H:I');?>' name="depature_time" placeholder="" required>
      <label for="Depature Time">Depature Time<span style="color:red">*</span></label>
    </div>
    <div class="form-floating">
      <input type="time" class="form-control" id="arrival_time" min ='<?php echo date('H:I');?>' name="arrival_time" placeholder="">
      <label for="Arrival Time">Arrival Time</label>
    </div>

    
    <button class="w-100 btn btn-lg btn-primary" type="submit">SEARCH</button>
  </form>
</div>
<?php } ?>
<?php require_once("footer.php"); ?>