<?php
$insert = false;
$update = false;
$delete = false;

//connect to Database
$servername = "localhost";
$username = "root";
$password = "";
$database = "facultyfeedback"; 
//Create a connection
$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn)
{
    die("Sorry we failed to connect: ". mysqli_connect_error());
}
if(isset($_GET['delete']))
{
    $sno = $_GET['delete'];
    $delete = true;
    $sql = "DELETE FROM `mock_data__1__1` WHERE `sno` = $sno";
    $result = mysqli_query($conn,$sql);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if(isset( $_POST['snoEdit']))
    {
        // Update the record
        $first_name = $_POST["first_nameEdit"];
        $last_name = $_POST["last_nameEdit"];
        $email = $_POST["emailEdit"];
        $gender = $_POST["genderEdit"];
        $section = $_POST["sectionEdit"];
        $subject = $_POST["subjecEdit"];
        $id = $_POST["idEdit"];
        $sno = $_POST["snoEdit"];

        // Sql query to be executed
        $sql = "UPDATE `mock_data__1__1` SET `first_name` = '$first_name' , `last_name` = '$last_name' , `email` = '$email' , `gender` = '$gender' , `section` = '$section' , `subjec` = '$subject' , `id` = '$id' WHERE  `mock_data__1__1`.`sno` = $sno";
        $result = mysqli_query($conn, $sql);
        if($result)
        {
            $update = true;
        }
        else
        {
            $update = false;
        }
    }
    else
    {
        $first_name = $_POST["first_name"];
        $last_name = $_POST["last_name"];
        $email = $_POST["email"];
        $gender = $_POST["gender"];
        $section = $_POST["section"];
        $subject = $_POST["subjec"];
        $id = $_POST["id"];

        // Sql query to be executed
        $sql = "INSERT INTO `mock_data__1__1` (`first_name`, `last_name`,`email`,`gender`,`section`,`subjec`,`id`) VALUES ('$first_name', '$last_name','$email','$gender','$section','$subject','$id')";
        $result = mysqli_query($conn, $sql);

        
        if($result)
        { 
            $insert = true;
        }
        else
        {
            echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
        }
    } 
}

?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    
    <title>Hello, ADMIN!</title>
    
    <style>
     body{
      background-color:darkgrey;
      padding-left:50px;
      padding-right:50px;
    }
    .container{
      text-align: center;
      padding-top:10px;
      text-decoration: underline;
      padding-bottom:10px;
      }
      .container1 h3{
        text-align:center;
        text-decoration: underline;
  
        
      }
    </style>
  </head>
  <body>
  <!-- Button Edit modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal">
Edit Modal
</button> -->

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Edit this </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form action="adminpage.php" method="POST">
        <div class="modal-body">
            
                <input type="hidden" name="snoEdit" id="snoEdit">
                <div class="form-group" >
                <label for="first_name">TEACHER'S FIRST NAME</label>
                <input type="text"  name="first_nameEdit" class="form-control" id="first_nameEdit" aria-describedby="first_name" placeholder="Enter first name">
                
                </div>
                <div class="form-group">
                <label for="last_name">TEACHER'S LAST NAME</label>
                <input type="text" class="form-control" name="last_nameEdit" id="last_nameEdit"  aria-describedby="last_name" placeholder="Enter last name">
                </div>
                <div class="form-group">
                <label for="email">Email address</label>
                <input type="email"  name="emailEdit" class="form-control" id="emailEdit" aria-describedby="emailHelp" placeholder="Enter email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                <label>GENDER </label>
                        <select id = "genderEdit" name="genderEdit">
                            <option  name="genderEdit" value = "MALE">MALE</option>
                            <option name="genderEdit"  value = "FEMALE">FEMALE</option>
                            
                        </select>
                </div>
                <div class="form-group">
                SECTION :  
                                        <select id = "sectionEdit" name="sectionEdit" required>  
                                            
                
                                            <option value="Select">Select</option>
    
                                            <option value="CSE-1">CSE-1</option>  
                                    <option value="CSE-2">CSE-2</option>  
                                    <option value="CSE-3">CSE-3</option>  
                                    <option value="CS-1">CS-1</option> 
                                    <option value="CS-2">CS-2</option> 
                                    <option value="CS-3">CS-3</option>
                                    <option value="CS/IT-1">CS/IT-1</option>
                                    <option value="CS/IT-2">CS/IT-2</option>
                                    <option value="CSIT-3">CSIT-3</option>
                                    <option value="IT-1">IT-1</option>  
                                    <option value="IT-2">IT-2</option>  
                                    <option value="IT-3">IT-3</option>  
                                    <option value="IT-4">IT-4</option>  
                                    <option value="ECE-1">ECE-1</option>
                                    <option value="ECE-2">ECE-2</option>
                                    <option value="ECE-3">ECE-3</option>
                                    <option value="EEE-1">EEE-1</option>
                                    <option value="EEE-2">EEE-2</option>
                                    <option value="EEE-3">EEE-3</option>
                                    <option value="ME-1">ME-1</option>
                                    <option value="ME-2">ME-2</option>
                                    <option value="ME-3">ME-3</option>
                                    <option value="CIVIL-1">CIVIL-1</option>
                                    <option value="CIVIL-2">CIVIL-2</option>
                                    <option value="CIVIL-3">CIVIL-3</option>
            
                                        </select>   
                </div>
                <div class="form-group">
                <label for="subject">Subject</label>
                <input type="text" name="subjecEdit" class="form-control" id="subjecEdit" placeholder="Enter the subject">
                </div>
                <div class="form-group">
                <label for="id">ID</label>
                <input type="number" name="idEdit"  class="form-control" id="idEdit" placeholder="Enter the id">
                </div>
            
        </div>
        <div class="modal-footer d-block mr-auto">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
    </form>
    </div>
  </div>
</div>


  

 
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="#">ADMINISTRATION <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
         <path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
        </svg>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
         
      </button>
        
      
         
</nav>
<?php
if($insert)
{
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success !</strong> Inserted Successfully !
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
    </button>
  </div>";
}
if($delete)
{
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success !</strong> Deleted Successfully !
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
    </button>
  </div>";
}
if($update)
{
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success !</strong> Updated Successfully !
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
    </button>
  </div>";
}
?>
    
<br>
<div class="container1">
  <h3>ADD A FACULTY<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-right-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-11.5.5a.5.5 0 0 1 0-1h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5z"/>
          </svg></h3>
          <form action="adminpage.php" method="POST">
  <div class="form-group" >
    <label for="first_name">TEACHER'S FIRST NAME</label>
    <input type="text"  name="first_name" class="form-control" id="first_name" aria-describedby="first_name" placeholder="Enter first name">

  </div>
  <div class="form-group">
    <label for="last_name">TEACHER'S LAST NAME</label>
    <input type="text" class="form-control" name="last_name" id="last_name"  aria-describedby="last_name" placeholder="Enter last name">
  </div>
  <div class="form-group">
    <label for="email">Email address</label>
    <input type="email"  name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
  <label>GENDER </label>
             <select id = "GENDER" name="gender">
               <option value = "1">MALE</option>
               <option value = "2">FEMALE</option>
              
             </select>
  </div>
  <div class="form-group">
  SECTION :  
                            <select name="section" required>  
								<option value="Select">Select</option>
  
                                <option value="CSE-1">CSE-1</option>  
                                <option value="CSE-2">CSE-2</option>  
                                 <option value="CSE-3">CSE-3</option>  
								<option value="CS-1">CS-1</option> 
								<option value="CS-2">CS-2</option> 
								<option value="CS-3">CS-3</option>
								<option value="CS/IT-1">CS/IT-1</option>
								<option value="CS/IT-2">CS/IT-2</option>
								<option value="CSIT-3">CSIT-3</option>
								<option value="IT-1">IT-1</option>  
								<option value="IT-2">IT-2</option>  
								<option value="IT-3">IT-3</option>  
								<option value="IT-4">IT-4</option>  
								<option value="ECE-1">ECE-1</option>
								<option value="ECE-2">ECE-2</option>
								<option value="ECE-3">ECE-3</option>
								<option value="EEE-1">EEE-1</option>
								<option value="EEE-2">EEE-2</option>
								<option value="EEE-3">EEE-3</option>
								<option value="ME-1">ME-1</option>
								<option value="ME-2">ME-2</option>
								<option value="ME-3">ME-3</option>
								<option value="CIVIL-1">CIVIL-1</option>
								<option value="CIVIL-2">CIVIL-2</option>
								<option value="CIVIL-3">CIVIL-3</option>

                            </select>   
  </div>
  <div class="form-group">
    <label for="subject">Subject</label>
    <input type="text" name="subjec" class="form-control" id="subjec" placeholder="Enter the subject">
  </div>
  <div class="form-group">
    <label for="id">ID</label>
    <input type="number" name="id"  class="form-control" id="id" placeholder="Enter the id">
  </div>

  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
<br>
<br>

<hr>

<div class="container">
  <h2>FACULTY FEEDBACK <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-right-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-11.5.5a.5.5 0 0 1 0-1h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5z"/>
          </svg></h2>
</div>




<div class="ta"> 

<table class="table" id="myTable">
  <thead>
    <tr>
      <th scope="col">S.NO.</th>
      <th scope="col">ST.NO.</th>
      <th scope="col">TEACHER</th>
      <th scope="col">RATE 1</th>
      <th scope="col">RATE 2</th>
      <th scope="col">RATE 3</th>
      <th scope="col">RATE 4</th>
      <th scope="col">RATE 5</th>
      <th scope="col">COMMENT</th>
     
    </tr>
  </thead>

  <tbody>
  <?php
//Die if connection was not successful
if (!$conn)
{	die("Sorry we failed to connect: ". mysqli_connect_error());	echo "die"; }
else
{
  
  $sql= "SELECT * FROM `teachers_rating` ";
  $result=mysqli_query($conn,$sql);
  $sno=0;
  while($row=mysqli_fetch_assoc($result))
  {
    $sno=$sno+1;
   
    $st=$row{'student_number'};
    $t=$row{'teacher'};
    $r1=$row{'rate1'};
    $r2=$row{'rate2'};
    $r3=$row{'rate3'};
    $r4=$row{'rate4'};
    $r5=$row{'rate5'};
    $co=$row{'comment'};
    
    
  
     echo "<tr>
     <th scope='row'>$sno</th>
    
     <td>$st</td>
     <td>$t</td>
     <td>$r1</td>
     <td> $r2</td>
     <td> $r3</td>
     <td>$r4</td>
     <td>$r5</td>
     <td>$co</td>
     
   </tr> ";
   

  }
}
?>
</tbody>
</table>


</div>

<hr>

<div class="container">
  <h2>FACULTY DETAILS <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-right-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-11.5.5a.5.5 0 0 1 0-1h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5z"/>
          </svg></h2>
</div>

    
<div class="tb"> 

<table class="table" id="mTable">
  <thead>
    <tr>
      <th scope="col">S.NO.</th>
      <th scope="col">FIRST NAME</th>
      <th scope="col">LAST NAME</th>
      <th scope="col">EMAIL</th>
      <th scope="col">GENDER</th>
      <th scope="col">SECTION</th>
      <th scope="col">SUBJECT</th>
      <th scope="col">ID</th>
      <th scope="col">ACTIONS</th>
      
    </tr>
  </thead>

  <tbody>
  <?php
//Die if connection was not successful
if (!$conn)
{	die("Sorry we failed to connect: ". mysqli_connect_error());	echo "die"; }
else
{
  
  $sql= "SELECT * FROM `mock_data__1__1` ";
  $result=mysqli_query($conn,$sql);
  $sno=0;
  while($row=mysqli_fetch_assoc($result))
  {
    $sno=$sno+1;
   
    $first_name=$row{'first_name'};
    $last_name=$row{'last_name'};
    $email=$row{'email'};
    $gender=$row{'gender'};
    $section=$row{'section'};
    $subject=$row{'subjec'};
    $id=$row{'id'};

     echo "<tr>
     <th scope='row'>$sno</th>
    
     <td>$first_name</td>
     <td>$last_name</td>
     <td>$email</td>
     <td> $gender</td>
     <td> $section</td>
     <td>$subject</td>
     <td>$id</td>
     
     <td><button class='editing btn btn-sm btn-primary'  id=".$row['sno']. "  >Edit</button>  <button class='delete btn btn-sm btn-primary'  id=d".$row['sno']. "  >Delete</button></td>
   </tr> ";

  }
}
?>
</tbody>
</table>


</div>
    

      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src= "//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
     <script>  
    $(document).ready( function () {
    $('#myTable').DataTable();
     } );
    </script>
      <script>  
    $(document).ready( function () {
    $('#mTable').DataTable();
     } );
    </script>
    <script>
        edits=document.getElementsByClassName('editing');
        Array.from(edits).forEach((element)=>
        {
            element.addEventListener("click",(e)=>
            {
                console.log("edit ");
                tr=e.target.parentNode.parentNode;
                firstname=tr.getElementsByTagName("td")[0].innerText;
                lastname= tr.getElementsByTagName("td")[1].innerText;
                email=tr.getElementsByTagName("td")[2].innerText;
                gender=tr.getElementsByTagName("td")[3].innerText;
                section=tr.getElementsByTagName("td")[4].innerText;
                subject=tr.getElementsByTagName("td")[5].innerText;
                console.log(firstname,lastname,email,gender,section,subject);
                first_nameEdit.value=firstname;
                last_nameEdit.value=lastname;
                emailEdit.value=email;
                genderEdit.value=gender;
                sectionEdit.value=section;
                subjecEdit.value=subject;
               
                snoEdit.value = e.target.id;
                console.log(e.target.id)
                $('#editModal').modal('toggle');

            })
        })

        deletes=document.getElementsByClassName('delete');
        Array.from(deletes).forEach((element)=>
        {
            element.addEventListener("click",(e)=>
            {
                console.log("edit ");
                sno = e.target.id.substr(1,);
                if(confirm("Are You Sure You Want To Delete?"))
                {
                    console.log("Yes");
                    window.location = `adminpage.php?delete=${sno}`;
                }
                else
                {
                    console.log("No");
                }
                

            })
        })
        </script>
  </body>
</html>
