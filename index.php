<?php include 'sharded/header.php'?>
<?php include 'general/function.php'?>
<?php 
$host="localhost";
$user="root";
$password="";
$dbname="register";
$conn=mysqli_connect($host,$user,$password,$dbname);

#=======================
$select="SELECT * FROM country";
$sqli=mysqli_query($conn,$select);
#=============================
$selectt="SELECT * FROM gender";
$sqlii=mysqli_query($conn,$selectt);
#=============================
if(isset($_POST['send'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $country=$_POST['country'];
    $gender=$_POST['gender'];
    $adress=$_POST['adress'];
    $insert=" INSERT INTO reg VALUES (NULL,'$name','$email','$password',$country,$gender,'$adress')";
    $sql=mysqli_query($conn,$insert);
    header ("location:/register/index.php");
    // sms($sql,"insert");
    
  }
  
?>
<?php
 $n="";
 $e="";
 $p="";
 $c="";
 $g="";
 $d="";
 $update= false;
if(isset($_GET['edit'])){
  $update= true;
  $id=$_GET['edit'];
  $s="SELECT * FROM reg WHERE id=$id";
  $sq=mysqli_query($conn , $s);
  $row=mysqli_fetch_assoc($sq);
  $n=$row['name'];
  $e=$row['email'];
  $p=$row['password'];
  $c=$row['countryid'];
  $g=$row['genderid'];
  $d=$row['aderss'];
  if(isset($_POST['update'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $country=$_POST['country'];
    $gender=$_POST['gender'];
    $adress=$_POST['adress'];
    $up="UPDATE reg  SET name='$name', email='$email' , password='$password',countryid=$country ,genderid=$gender , aderss='$adress' WHERE id=$id";
    mysqli_query($conn,$up);
    header ('location:http://localhost/register/list.php');
  }

}

?>

<div class="card mb-5 mt-5 container"  >
  <div class="row no-gutters">
    <div class="col-md-4">
      <img src="img\form-v7.jpg" class="img-fluid" alt="...">
    </div>

    <div class="col-md-8">
      <div class="card-body">
        <?php if($update):?>
      <h1 class="text-center">Update Form</h1>
      <?php else:?>

      <h1 class="text-center">Register Form</h1>
      <?php endif ;?>

      <div class="text-center mt-5 ">
 <!-- <label for="" class=""> FULLNAME</label> -->
 <div class="alert alert-danger none alert1" role="alert">
 Enter Valid Data!
 <button type="button" class="close close1" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>
</div>
<div class="alert alert-danger none alert2" role="alert">
 Enter More Than 2 Letter!
 <button type="button" class="close close2" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>
</div>

<div class="alert alert-success none alert3" role="alert">
<h5 class="">Well done! </h5>
<button type="button" class="close close3" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>
</div>
<form action="" method="post">
   <input type="text" placeholder="Your Name" class="input name" name="name" required min="3" value="<?php echo $n ?>"> 
 
 

   <input type="email" placeholder="Your Email"class="input email" name="email" required min="3" value="<?php echo $e ?>">
 
 
 
   <input type="password" placeholder="Password"class="input password" name="password" required min="3" value="<?php echo $p ?>">
 
 
 

 <select name="country" id="" placeholder="" class="input" required>
 <?php  foreach($sqli as $data){ ?>
     <!-- <option value="">COUNTRY</option> -->
     <option value="<?php echo $data['id']?>"><?php echo $data['name']?></option>
     <?php }?>
 </select>

 
 
 <select name="gender" id="" placeholder=""class="input" required>
 <?php  foreach($sqlii as $data){ ?>

     <option value="<?php echo $data['id']?>"><?php echo $data['name']?></option>
     <?php }?>

 </select>
 <input name="adress" type="text" placeholder="Adress"class="input adress" required min="3" max="20" value="<?php echo $d ?>">
 <?php if ($update) :?>
 <button  name="update" class="btn send text-center send">Update</button>
<?php else :?>
 <button  name="send" class="btn send text-center send">SEND</button>
 <?php endif;?>


 
    </div>
    </form>
  </div>
</div>




<!-- <script src="js/main.js"></script> -->
</body>
</html>