
<?php
include_once 'db-inc.php';
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="HandheldFriendly" content="true">
  <meta charset="utf-8">
  <title>Joe's Coaches</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div class="nav-wrapper">
    <nav>
      <ul class="nav-list">
        <img id="icon" src="img/icon2.png" alt="">
        <li class="nav-item"><a href="index.html">Account</a></li>
        <li><a href="#">Logout</a></li>
      </ul>
    </nav>
  </div>
  <div class="employees">
    <h2>Employees</h2>
    <div class="employee-list">
      <?php
      $sqlStatement = 'select employees.firstName, employees.lastName, employees.jobTitle,departments.departmentName,employees.email,employees.salary from employees join departments on employees.departmentCode = departments.departmentCode;';

      $queryResult = mysqli_query($dbConnection,$sqlStatement);
      $resultCheck = mysqli_num_rows($queryResult);

      $currency = "£";


// select employees.firstName, employees.lastName, employees.jobTitle,departments.departmentName,employees.email,employees.salary
// from employees
// join departments on employee.employeeNumber = departments.departmentCode;

      if($resultCheck>0){
        while($row=mysqli_fetch_assoc($queryResult)){
          // echo $row["productCode"].' '.$row["productName"].' '.$row["productPrice"].' '.$row["categoryCode"].' '.$row["productDescription"].'<br>';
          echo "<li>
            <div class='employee-card'>
              <img class='user-img' src='img/default.png' alt=''>
              <span>
                <div class='employment-details'>
                  <span class='name-format'>".$row['firstName']."</span>
                  <span class='name-format'>".$row['lastName']."</span>
                  <br>
                  <span>".$row['jobTitle']."</span>
                  <br>
                  <span>".$row['departmentName']."</span>
                  <br>
                  <span>".$row['email']."</span>
                  <br>
                  <span>".$currency.$row['salary']."</span>
                </div>
              </span>
            </div>
          </li>";
        }
      }
       ?>
    </div>


  </div>

  <div class="interviews">
    <h2>Upcoming Interviews</h2>
    <!-- <div class="interviews-card"> -->

      <li>
        <div class="list-item">
          <h3>Marketing</h3>
          <p>Social Media Content Specialist</p>
          <button class="accept-btn" type="button" name="button">Accept</button>
          <button class="reject-btn" type="button" name="button">Reject</button>
      </div>
    </li>

    <li>
      <div class="list-item">
        <h3>Driver</h3>
        <p>Advanced Coach Driver</p>
       <button class="accept-btn"type="button" name="button">Accept</button>
       <button class="reject-btn" type="button" name="button">Reject</button>
    </div>
  </li>

  <li>
    <div class="list-item">
      <h3>Sofware Developer</h3>
      <p>Full-stack Developer</p>
     <button class="accept-btn"type="button" name="button">Accept</button>
     <button class="reject-btn" type="button" name="button">Reject</button>
  </div>
</li>

    </div>

    <!-- MODAL -->
  <div id="employeeModal" class="modal">
    <div class="modal-content">
      <header class="modal-header">
        <!-- <span onclick="document.getElementById('quoteModal').style.display='none'" class="w3-button w3-display-topright">X</span> -->
        <div class="modal-header-content">


          <span>Add employee</span>
        </div>

      </header>
      <div class="modal-container">
        <form action="submit.php" method="POST">
          <label for="empnum">Employee Number</label>
          <input type="text" name="employee-number" id="name">
          <br>
          <label for="fname">First Name</label>
          <input type="text" name="first-name" id="name">
          <br>
          <label for="lname">Last Name</label>
          <input id="surname" name="last-name" type="text">
          <br>
          <label for="pos">Position</label>
          <input id="position" name="position" type="text" >
          <br>
          <label for="dep">Department</label>
          <input id="department" name="department" type="text" >
          <br>
          <label for="email">Email</label>
          <input id="email" name="email" type="text">
          <br>
          <label for="sal">Salary</label>
          <input id="salary" name="salary" type="text">
          <br>


          <button id="confirmBtn" type="submit" name="button" onclick="addEmployee()">Confirm</button>
        </form>

      </div>
      <footer class="modal-footer">

      </footer>
    </div>
  </div>






  <!-- /////////////////////////// -->
  <!-- MODAL -->
<div id="interviewModal" class="modal">
  <div class="modal-content">
    <header class="modal-header">
      <!-- <span onclick="document.getElementById('quoteModal').style.display='none'" class="w3-button w3-display-topright">X</span> -->
      <div class="modal-header-content">


        <span>Add interview</span>
      </div>

    </header>
    <div class="modal-container">


        <label for="fname">Department</label>
        <input type="text" id="int-department">
        <br>
        <label for="fname">Position</label>
        <input id="int-position" type="text">
        <br>


        <button id="confirmIntBtn" type="button" name="button" onclick="addInterview()">Confirm</button>



    </div>
    <footer class="modal-footer">

    </footer>
  </div>
</div>


  <!-- ////////////////////////// -->

  <button class="btn" type="button" name="button" onclick="showAddIntModal()">Add Interview</button>
  <button class="btn" type="button" name="button" onclick="showAddEmpModal()">Add Employee</button>

<?php


?>


<script type="text/javascript" src="js/main.js">

</script>
</body>

</html>
