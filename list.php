<?php include 'sharded/header.php'?>
<?php include 'general/function.php'?>
<?php 
$host="localhost";
$user="root";
$password="";
$dbname="register";
$conn=mysqli_connect($host,$user,$password,$dbname);

#=======================
$select="SELECT reg.id,reg.name,email,password,country.name AS country,gender.name AS gender , aderss  FROM reg 
JOIN country ON reg.countryid =country.id 
JOIN gender ON reg.genderid=gender.id";
$sql=mysqli_query($conn,$select);
#=============================
if(isset($_GET['delete'])){
    $id=$_GET['delete'];
    $d="DELETE FROM  reg WHERE id=$id";
    mysqli_query($conn,$d);
}
#=============================

  
?>

<div class="card mb-5 mt-5 container"  >
<h1 class="text-center">List</h1>
 <!-- <label for="" class=""> FULLNAME</label> -->
 <table class="table table-dark ">
  <thead>
     
    <tr>
      <th scope="col">id</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Pasword</th>
      <th scope="col">Country</th>
      <th scope="col">Gender</th>
      <th scope="col">Address</th>
      <th scope="col" colspan="2">Actions</th>




    </tr>
 
  </thead>
  <tbody>
      
      <?php foreach($sql as $data){?>
    <tr>
      <th scope="row"> <?php echo $data['id']?></th>
      <td><?php echo $data['name']?></td>
      <td><?php echo $data['email']?></td>
      <td><?php echo $data['password']?></td>
      <td><?php echo $data['country']?></td>
      <td><?php echo $data['gender']?></td>
      <td><?php echo $data['aderss']?></td>
      <td><a href="list.php?delete=<?php echo $data['id']?>" class='btn btn-danger'>Remove</a></td>
      <td><a href="index.php?edit=<?php echo $data['id']?>" class='btn btn-success'>Edit</a></td>



    </tr>
  
    <?php }?>
  </tbody>
</table>



  </div>





<script src="js/main.js"></script>
</body>
</html>