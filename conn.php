
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bootstrap Site</title>
  <link rel="stylesheet" href="bootstrap.css">
  <link rel="stylesheet" href="p2css.css">
  
</head>
<body>
<?php
if(isset($_POST['Submit3']))
        {
          $fn=$_POST['first'];
          $ln=$_POST['last'];
          $email=$_POST['email'];
          $phone=$_POST['phone'];
          $top=$_POST['topic'];
           
            $servername="localhost";
            $username="root";
            $password="";
            $db="project";
            $conn=mysqli_connect($servername,$username,$password,$db);
            $sql="INSERT INTO `contacr`( `first`, `last`, `email`, `phone`, `topic`) VALUES ('$fn','$ln','$email','$phone','$top')";
            $result=mysqli_query($conn,$sql);
            if($result>0)
            {
              
              echo'
                <div class="container">
                  <div class="row">
            <div class="col-12 section-head text-center p-3"><h1>Your Date</h1></div><br><p class="text-center">Your data has been bring from our database.</p><br><br><br>
                    <div class="col-12"><table class="table">
                      <thead>
                        <tr>
                          <th>First Name</th>
                          <th>Last Name</th>
                          <th>Email</th>
                          <th>Phone</th>
                          <th>Topic</th>

                        </tr>
                      </thead>
                      <tbody>
                        <tr>';
                        
                        echo"<td>".$fn."</td>";
                        echo"<td>".$ln."</td>";
                        echo"<td>".$email."</td>";
                        echo"<td>".$phone."</td>";
                        echo"<td>".$top."</td>";
                          
                       echo' </tr>
                      </tbody>
                    </table></div>
                    
                    <div class="col-12 pt-2">
                    <a href="index1.html#form"><button type="button" name="" id="" class="btn btn-primary main-butt1">Back</button></a>    
                    <a href="db.php"><button type="button" name="" id="" class="btn btn-primary main-butt">Show  Database</button></a>
                    </div>
                  </div>
                </div>';
                
            }
            

        }



        if(isset($_POST['Submit2']))
    {
      $servername="localhost";
      $username="root";
      $password="";
      $db="project";
      $conn=mysqli_connect($servername,$username,$password,$db);
      $un=$_POST['un'];
      $pass=$_POST['pass'];
      $sql="SELECT * FROM `auth` WHERE  user='$un' and password='$pass'";
      $result=mysqli_query($conn,$sql);
      if(mysqli_num_rows($result)>0)
      {
        header('Location:index1.html#home');
        die;
      }
      else
      {
        header('Location:index.html');
        exit;
      }
    }



    if(isset($_POST['Submit1']))
    {
    $servername="localhost";
    $username="root";
    $password="";
    $db="project";
   $conn=mysqli_connect($servername,$username,$password,$db);
    $user = $_POST['un'];
    $pass = $_POST['pass'];
    $sql="INSERT INTO auth VALUES ('$user','$pass')";
    $result=mysqli_query($conn,$sql);
    if($result>0)
      {
        
        header('Location:index1.html');
        exit;
      }
    else
    {
        header('Location:sign.php');
        exit;
    }
  }
        ?>


    
 <?php
            if(isset($_POST['Submit4']))
            {
                            $servername="localhost";
                            $username="root";
                            $password="";
                            $db="project";
                            $conn=mysqli_connect($servername,$username,$password,$db);
                            $sql=" SELECT `first`, `last`, `email`, `phone`, `topic`, `uid` FROM `contacr`";
                            $result=mysqli_query($conn,$sql);
                            if(mysqli_num_rows($result)>0)
                            {
                              
                              echo'
                                <div class="container">
                                  <div class="row">
                            <div class="col-12 section-head text-center p-3"><h1>Your Date</h1></div><br><p class="text-center">Your data has been succesfully stored in our database.</p><br><br><br>
                                    <div class="col-12"><table class="table">
                                      <thead>
                                        <tr>
                                          <th>Uid</th>
                                          <th>First Name</th>
                                          <th>Last Name</th>
                                          <th>Email</th>
                                          <th>Phone</th>
                                          <th>Topic</th>
                
                                        </tr>
                                      </thead>
                                      <tbody>';
                                        while($i=mysqli_fetch_array($result))
                                        {
                                        echo"<tr>";
                                        echo"<td>".$i["uid"]."</td>";
                                        echo"<td>".$i["first"]."</td>";
                                        echo"<td>".$i["last"]."</td>";
                                        echo"<td>".$i["email"]."</td>";
                                        echo"<td>".$i["phone"]."</td>";
                                        echo"<td>".$i["topic"]."</td>";
                                       echo' </tr>';
                            }
                                      echo'</tbody>
                                    </table></div>
                                    
                                    <div class="col-12 pt-2">
                                    <a href="index.html"><button type="button" name="" id="" class="btn btn-primary main-butt1">Back</button></a>    
                                   
                                    </div>
                                  </div>
                                </div>';
                                
                            }
                          }
                            ?>

</script>
</body>
</html>