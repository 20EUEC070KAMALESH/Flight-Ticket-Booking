<?php require_once("header.php"); ?>
        <?php //if(!isset($_REQUEST['user_id'])){
           // print_r($_POST);
            if($_POST){
           $sqrt= "INSERT INTO bookings(user_id,flight_id,no_of_tickets,mode_of_payment,amount,flight_detail_id) VALUES ('".$_POST['user_id']."',".$_POST['flight_id'].",".$_POST['no_of_tickets'].", '".$_POST['mode_of_payment']."',".$_POST['total'].",".$_POST['det_id'].")";
           $result = $conn->query($sqrt);

           if($result){
                $last_id = $conn->insert_id;

                $url = "my_bookings.php?user_id=".$last_id;              
                header("Location: $url");
           
            } else{
                echo "Booking not done";
                $url = "search.php";              
                header("Location: $url");                
            }
        }
             ?>

        <!-- <div class="container text-center" >
            <h5><a href="login.php?flight_id=<?php echo $_REQUEST['flight_id']; ?>">Already Have an Account Login</a></h5>
            <h5><a href="registration.php?flight_id=<?php echo $_REQUEST['flight_id']; ?>">New User Register here</a></h5>
        </div> -->

     <?php   if(!$_POST){

       $result= "Select * from users where role_id!=1";
       //echo $result;
       $results = $conn->query($result);
       print_r($results);
       
       if ($results->num_rows > 0) {
        $i=1;
        // output data of each row        
        $users=array();
        while($row = $results->fetch_assoc()) {
            $users[$i]["id"]=$row["id"];
            $users[$i]["user_name"]=$row["user_name"];
            $i++;

        }

        //echo"<pre>";
      //  print_r($users);
        
      } else {
        echo "0 resul";
        print_r($conn->error);
      }

   ?>
  <form method="post" action="booking.php">
      
  <input type="hidden" value="<?php echo $_REQUEST['flight_id']; ?>" id="flight_id" name="flight_id"/>
  <input type="hidden" value="<?php echo $_REQUEST['det_id']; ?>" id="det_id" name="det_id"/>
  <input type="hidden" value="<?php echo $_REQUEST['amt']; ?>" id="amt" name="amt"/>
  <input type="hidden" value="" id="total" name="total"/>
    <h1 class="h3 mb-3 fw-normal">Flight Details ADD</h1>

    <div class="form-floating">
    <select class="form-control form-control-lg"id="user_id" name="user_id" >
  <option>select User</option>
  <?php foreach($users as $detail)
  {
    echo "<option value=".$detail["id"].">".$detail["user_name"];
  }
  ?>
</select>
      <label for="USER">USER<span style="color:red">*</span></label>
    </div>
    
    <div class="form-floating">
    <input type="number" class="form-control" id="no_of_tickets" max=5  name="no_of_tickets" required>
      <label for="TICKET COUNT">TICKET COUNT<span style="color:red">*</span></label>
    </div>
    <div class="form-floating">
    <select class="form-control form-control-lg"id="mode_of_payment" name="mode_of_payment" >
  <option value="cash">CASH</option>
  <option value="online">ONLINE PAYMNET</option>
   
</select>
      <label for="PAYMENT TYPE">PAYMENT TYPE<span style="color:red">*</span></label>
    </div>
   
   Total : <span id="total_disp" name="total_disp"></span>

    
    <button class="w-100 btn btn-lg btn-primary" type="submit">BOOK</button>
  </form>
</div>


     <?php   }?>

     <script>
document.getElementById("no_of_tickets").addEventListener("blur", myFunction);

function myFunction() {
  //alert("Input field lost focus.");
  var tick = document.getElementById("no_of_tickets").value;
  var amt = document.getElementById("amt").value;

  var total = tick * amt;
  document.getElementById("total_disp").innerHTML = total;
  document.getElementById("total").value = total;
}
</script>