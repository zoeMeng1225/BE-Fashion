<?php

function print_p($v) {
  echo "<pre>",print_r($v),"</pre>";
}

$filename = "data/json_notes.json";
$file = file_get_contents($filename);
$data = json_decode($file);

// file_put_contents, json_encode

// print_p($_GET);
// print_p($_POST);



$empty_user = (object) array(
  "name"=>"",
  // "type"=>"",
  "role"=>"",
  "gender"=>"",
  "email"=>""
);



//  LOGIC
if(isset($_GET['action'])) {
  if($_GET['action']=="update") {
    $data->users[$_GET['id']]->name = $_POST['name'];
    $data->users[$_GET['id']]->role = $_POST['role'];
    $data->users[$_GET['id']]->gender = $_POST['gender'];
    $data->users[$_GET['id']]->email = $_POST['email'];

    file_put_contents($filename,json_encode($data));

  // body("location:?id=".$_GET['id']);
  
  }

  else
  if($_GET['action']=="create") {
    $empty_user->name = $_POST['name'];
    $empty_user->type = $_POST['role'];
    $empty_user->gender = $_POST['gender'];
    $empty_user->email =$_POST['email'];

    $newid = count($data->users);

    // array_push
    $data->users[] = $empty_user;

  file_put_contents($filename,json_encode($data));

  header("location:?id=$newid");
  
  }
  else
  if($_GET['action']=="delete") {
    array_splice($data->users,$_GET['id'],1);

    file_put_contents($filename,json_encode($data));
    
    header("location:user_admin1.php");
  }
}


function makeGender($g) {
  return "
  <input type='radio' name='gender' value='0' class='hidden custom-radio' ".($g==="0"?'checked':'')." id='gender-0'>
  <label class='custom-radio-label' for='gender-0'>Male</label>
  <input type='radio' name='gender' value='1' class='hidden custom-radio' ".($g==="1"?'checked':'')." id='gender-1'>
  <label class='custom-radio-label' for='gender-1'>Female</label>
  ";
}


function showUser($user) {

$gender = makeGender($user->gender);
$id = $_GET['id'];
$action = $id=="new"?"create":"update";
$delete = $id=="new"?"":"<a href='?id={$_GET['id']}&action=delete'>Delete</a>";

echo <<<HTML
<h2>Edit User</h2>
<div>$delete</div>
<form class="user-form" method="post" action="?id=$id&action=$action">
  <div class="form-control">
    <label class="form-label">Name</label>
    <input class="form-input" name="name" value="$user->name" placeholder="Type a User Name">
  </div>
  <div class="form-control">
    <label class="form-label">Role</label>
     <select class="form-select" value="$user->role">
       <option>password user</option>
        <option>password auditor</option>
         <option>user_admin</option>
     </select>
  </div>
  <div class="form-control">
    <label class="form-label">Gender</label>
    $gender
  </div>
  <div class="form-control">
    <label class="form-label">Email</label>
    <input class="form-input" name="classes" value="$user->email" placeholder="Type your email address">
  </div>
  <div class="form-control flex-parent" style="margin-top:3em">
    <div class="flex-child" style="width:50%">
      <a href='user_admin1.php'>Back</a>
    </div>
    <div class="flex-child" style="width:50%">
      <input class="form-button" type="submit" value="Save Changes">
    </div>
  </div>
</form>
HTML;
}


?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>User Administrator</title>

  <?php include "parts/head.html" ?>
</head>
<body>
  
 <header>
    <?php include "parts/header.html" ?>
  </header>

<br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

 <div class="container main-user">
       
     <div class='card side-bar'>
      <div class="part">
        <i class="material-icons">apps</i>
         <p>DASHBOARD</p>
      </div>
    <div class="part">
      <i class="material-icons">supervisor_account</i>
      <p>USERS</p>
    </div>
    <div class="part">
        <i class="material-icons">build</i>
         <p>SETTING</p>
      </div>
      <div class="part">
        <i class="material-icons">notification_important</i>
         <p>ALERT</p>
      </div>
  </div>

  <div class='card main-panel'>
   <div class="admin-top">
    <div class="back"><a href="main.php">HOMEPAGE</a><i class="material-icons" id="arrow1">keyboard_arrow_left</i>USER ADMINISTRATOR</div>
    <br>
    <br>
    <br>

    <form action="user_admin1.php?id=new" method="post">
    <div class="cqud-area">
      <a href="user_admin1.php"><input class="cqud-button" type ="button" value="List"></a>
       <a href="user_admin1.php?id=new"><input class="cqud-button" type ="button" value="Add User"></a>

    </div>
    



  <div class="admin-content"> 
  
  <?php

  if(isset($_GET['id'])) {

    showUser(
      ($_GET['id']=="new") ?
      $empty_user :
      $data->users[$_GET['id']]
    
    );
    

  } else {
     
    echo "<table border='1px' id='ediTable' class='collapsed' cellpadding='2' cellspacing='0' width='100%'>";

    foreach($data->users as $i=>$user) {
             echo "<tr><td align='center' width='20%' border='1' class='title1'><a href='?id=$i'>$user->name</a></td>";
             echo "<td width='30%' align='center' border='1' class='title1'><a href='?id=$i'>$user->role</a></td>";
             echo "<td width='30%' align='center' border='1' class='title1'><a href='?id=$i'>$user->email</a></td>";
             echo "<td width='30%' align='center' border='1' class='title1'>
             <i class='material-icons'>perm_identity</i>
             <div class='visit'><a href='?id=$i'>Visit</a></div></td></tr>
       
             <tbody id='tbody'></tbody>";
        
      
    }
       
    echo  "</table>";

  }

  ?>
  </div>
  </div>

<style>
a{
  color:black;
 }
a:hover
{
  color:green;
}
a:visited
  {
    color:gray;
  }
 .checkbox
 {
  text-align: center;
 }
td,tr{
  text-align: center;
 }
 
  
</style>

</body>
</html>