<?php
include("developer.php");
include_once 'header.php';
?>
<link rel="stylesheet" href="css/style.css">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<style>
body {
  background-color: #333333;
}
.wrapper {
  width: 900px;
  margin: 0 auto;
}
nav {
  width: 100%;
  height: 60px;
  background-color: #dd7926;

}

nav .wrapper {
  height: 100%;
  display: flex;
  justify-content: space-between;
  align-items: center;
  background-color: #dd7926;
  text-align: center;
}

nav img {
  width: 60px;
}

nav ul {
}

nav ul li {
  list-style: none;
  float: left;
}

nav ul li a {
  font-family: "Roboto", sans-serif;
  font-weight: 500;
  font-size: 16px;
  color: #ffffff;
  text-decoration: none;
  padding: 0 16px;
  text-transform: uppercase;
}

nav ul li a:hover {
  color: #fff;
}
nav
</style>
<body>
<div class="container">
 <div class="row">
   <div class="col-sm-8">
    <?php echo $deleteMsg??''; ?>
    <div class="table-responsive">
      <table class="table table-bordered">
       
         <th>Email</th>
         <th>Day 1 Pick One</th>
         <th>Day 1 Pick Two</th>
    </thead>
    <tbody>
  <?php
      if(is_array($fetchData)){      
      $sn=1;
      foreach($fetchData as $data){
    ?>
      <tr>
      <td><?php echo $data['usersEmail']??''; ?></td>
      <td><?php echo $data['pickOne']??''; ?></td>
      <td><?php echo $data['pickTwo']??''; ?></td>
     </tr>
     <?php
      $sn++;}}else{ ?>
      <tr>
        <td colspan="8">
    <?php echo $fetchData; ?>
  </td>
    <tr>
    <?php
    }?>
    </tbody>
     </table>
   </div>
</div>
</div>
</div>
  </body>