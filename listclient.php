<!DOCTYPE>
<html>
<head>
	<head>
    <meta charset="UTF-8">
    <link type="text/css" rel="stylesheet" href="assets/css/bootstrap.css">
    <link type="text/css" rel="stylesheet" href="assets/css/style.css">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>listclient</title>
</head>
</head>
<body>
  
  <h1>LA LISTE DE TOUS LES EMPLOYES</h1>
  <?php
  require_once 'centee.php';
  ?>
  <?php 
if (isset($_SESSION['message'])):
  ?>
<div class="alert alert-<?=$_SESSION['msg_type']?>">
     <?php
           echo $_SESSION['message'];
           unset($_SESSION['message']);
    ?>


</div>
<?php endif ?>



  <div class="container">
  <?php
      $mysqli = new mysqli('localhost', 'root', 'papepol1', 'wordpress') or die(mysqli_error($mysqli));
      $result = $mysqli->query("SELECT * FROM employe") or die($mysqli->error);

            //pre_r($result);
            //pre_r($result->fetch_assoc());
            //pre_r($result->fetch_assoc());  
  ?>
  
    <table class="table">
       <thead>
             <tr>
                  <th>MATRICULE</th>
                  <th>NOM</th>
                  <th>PRENOM</th>
                  <th>E_MAIL</th>
                  <th>TELEPHONE</th>
                  <th>ADRESS</th>
                  <th>SALAIRE</th>
                   <th>ACTION</th>
                  
              </tr> 

       </thead>
    <?php
         while ($row = $result->fetch_assoc()):  
    ?>
  <tr>
    <td><?php echo $row['matricule']; ?></td>
  <td><?php echo $row['nom']; ?></td> 
 
 <td><?php echo $row['prenom']; ?></td>
 <td><?php echo $row['e_mail']; ?></td>
 <td><?php echo $row['telephone']; ?></td>
 <td><?php echo $row['adress']; ?></td>
 <td><?php echo $row['salaire']; ?></td>
 
            <td><a href="client.php?edit=<?php echo $row['id']; ?>"
              class="btn btn-info" style="width:80;height: 40; font-size:15">Editer</a>
              <a href="centee.php?delete=<?php echo $row['id']; ?>"
              class="btn btn-danger"  style="width:80;height: 40; font-size:15">Delete</a>
              </td>
      
      


  </tr>
<?php endwhile; ?>
   





   

    </table>


  




  <?php





            function pre_r( $array){
            echo '<pre>';
            print_r($array);
            echo '</pre>';
      }
  ?>

</body>
</html>  