<?php 
    include "header.php";
    include "connection.php";
    $flag = true;
    $fname = $lname = $email = $pass = $address_1 = $address_2 = $contact = $birthdate = $city = $pincode = $status = $role = $fees = $profile ='';
    $fname_error = $lname_error = $email_error = $pass_error = $address_1_error = $address_2_error = $contact_error = $birthdate_error = $city_error = $pincode_error = $status_error = $role_error = $profile_error = '';
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        # code...
        
        #Code for field validation

        if(empty($_POST['fname'])){
            $fname_error = "Please! Enter Your First Name.";
        }else{
            $fname = $_POST['fname'];
            $flag = false;
        }
        if(empty($_POST['lname'])){
            $lname_error = "Please! Enter Your Last Name.";
        }else{
            $lname = $_POST['lname'];
            $flag = false;
        }
        if(empty($_POST['email'])){
            $email_error = "Please! Enter Your Email.";
        }else{
            $email = $_POST['email'];
            $flag = false;
        }
        if(empty($_POST['pass'])){
            $pass_error = "Please! Enter Your Password.";
        }else{
            $pass = md5($_POST['pass']);
            $flag = false;
        }
        if(empty($_POST['address_1'])){
            $address_1_error = "Please! Enter Your Address 1.";
        }else{
            $address_1 = $_POST['address_1'];
            $flag = false;
        }
        if(empty($_POST['address_2'])){
            $address_2_error = "Please! Enter Your Address 2.";
        }else{
            $address_2 = $_POST['address_2'];
            $flag = false;
        }
        if(empty($_POST['contact'])){
            $contact_error = "Please! Enter Your Contact Number.";
        }else{
            $contact = $_POST['contact'];
            $flag = false;
        }
        if(empty($_POST['birthdate'])){
            $birthdate_error = "Please! Choose Your Birthdate.";
        }else{
            $birthdate = $_POST['birthdate'];
            $flag = false;
        }
        if(empty($_POST['city'])){
            $city_error = "Please! Choose Your City.";
        }else{
            $city = $_POST['city'];
            $flag = false;
        }
        if(empty($_POST['pincode'])){
            $pincode_error = "Please! Enter Your Pincode.";
        }else{
            $pincode = $_POST['pincode'];
            $flag = false;
        }
        if(empty($_POST['status'])){
            $status_error = "Please! Choose User status.";
        }else{
            $status = $_POST['status'];
            $flag = false;
        }
        if(empty($_POST['role'])){
            $role_error = "Please! Choose User Role.";
        }else{
            $role = $_POST['role'];
            $flag = false;
        }
        if(empty($_POST['profile'])){
          $profile_error = "Please! Choose User profile.";
          $flag = false;
        }else{
            $profile = $_POST['profile'];
            // $flag = false;
            // $uploadDirectory = 'uploads/';
            // // $targetPath = $uploadDirectory . $_FILES['profile']['name'];
            // $tmp_name = $_FILES["profile"]["tmp_name"];
            // print_r($tmp_name);
            // $name = $_FILES["profile"]["name"];
            // print_r($name);
            // move_uploaded_file($tmp_name, "$uploadDirectory/$name");
        }
        $register_date = date('Y-m-d H:i:s');
        $fees = $_POST['fees'];
        // die();
       

          # code...
          #Code for insert data
          $sql = "INSERT INTO student_mst (fname,lname,email,pass,address_1,address_2,contact,birthdate,pincode,city,status,role,register_date)
          VALUES ('$fname','$lname','$email','$pass','$address_1','$address_2','$contact','$birthdate','$pincode','$city','$status', '$role', '$register_date' )";
          if(mysqli_query($conn, $sql)){
            $last_id = mysqli_insert_id($conn);
            $query = "INSERT INTO  std_fees (std_id,fees,profile) VALUES ($last_id,'$fees','$profile')";  
            if (mysqli_query($conn, $query)) {
              # code...
              header('Location:users.php');
            }else{
              echo "Data Not Inserted ";
            }
          }
        
        
        
        
    }
?>
<style>
    .error{
  color: red;
  font-size: 16px;
  
}
</style>
<div class="container-fluid">
<form method="POST" enctype="multipart/form-data>
    <h1 class="text-center">User Register</h1>&nbsp;
  <div class="form-row">
    <div class="form-group col-md-3">
      <label for="inputEmail4">First Name</label>
      <input type="text" class="form-control" id="inputEmail4" placeholder="First Name" name="fname" >
      <span class="error"><?php echo $fname_error; ?></span>
    </div>
    <div class="form-group col-md-3">
      <label for="inputEmail4">Last Name</label>
      <input type="text" class="form-control" id="inputEmail4" placeholder="Last Name" name="lname" >
      <span class="error"><?php echo $lname_error; ?></span>
    </div>
    <div class="form-group col-md-3">
      <label for="inputEmail4">Email</label>
      <input type="email" class="form-control" id="inputEmail4" placeholder="Email" name="email" >
      <span class="error"><?php echo $email_error; ?></span>
    </div>
    <div class="form-group col-md-3">
      <label for="inputPassword4">Password</label>
      <input type="password" class="form-control" id="inputPassword4" placeholder="Password" name="pass" >
      <span class="error"><?php echo $pass_error; ?></span>
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Address</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="address_1" >
    <span class="error"><?php echo $address_1_error; ?></span>
  </div>
  <div class="form-group">
    <label for="inputAddress2">Address 2</label>
    <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor" name="address_2" >
    <span class="error"><?php echo $address_2_error; ?></span>
  </div>
  <div class="form-row">
    <div class="form-group col-md-3">
      <label for="inputCity">Contact Number</label>
      <input type="number" class="form-control" id="inputCity" placeholder="Contact Number" name="contact" >
      <span class="error"><?php echo $contact_error; ?></span>
    </div>
    <div class="form-group col-md-3">
      <label for="inputCity">Birth Date</label>
      <input type="date" class="form-control" id="inputCity" placeholder="Birth Date" name="birthdate" >
      <span class="error"><?php echo $birthdate_error; ?></span>
    </div>
    <div class="form-group col-md-3">
      <label for="inputCity">City</label>
      <input type="text" class="form-control" id="inputCity" placeholder="City" name="city" >
      <span class="error"><?php echo $city_error; ?></span>
    </div>
    <div class="form-group col-md-3">
      <label for="inputZip">Pincode</label>
      <input type="text" class="form-control" id="inputZip" placeholder="Pincode" name="pincode" >
      <span class="error"><?php echo $pincode_error; ?></span>
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">Status</label>
      <select id="inputState" class="form-control" name="status" >
        <option disabled selected>Choose Status</option>
        <option>Draft</option>
        <option>Publish</option>
      </select>
      <span class="error"><?php echo $status_error; ?></span>
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">Role</label>
      <select id="inputState" class="form-control" name="role" >
        <option disabled selected>Choose Role</option>
        <option>Administrator</option>
        <option>User</option>
      </select>
      <span class="error"><?php echo $role_error; ?></span>
    </div>
    <div class="form-group col-md-3">
      <label for="inputCity">Fees</label>
      <input type="text" class="form-control" id="inputCity" placeholder="City" name="fees" value="INR 5000" readonly>
      <!-- <span class="error"><?php //echo $city_error; ?></span> -->
    </div>
    <div class="form-group col-md-3">
      <label for="inputCity">Profile Picture</label>
      <input type="File" class="form-control" id="inputCity" placeholder="Profile" name="profile">
      <span class="error"><?php echo $profile_error; ?></span>
    </div>
  </div>
  <div class="form-group">
  </div>
  <button type="submit" class="btn btn-primary" name="submit">Register</button>
</form>&nbsp;
</div>
<?php 
    include "footer.php";
?>