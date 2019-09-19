<!DOCTYPE>
<html>
  <head>
    <meta charset="UTF-8">
   <style>
body {
  background-image: url("vente.jpg");
        background-repeat:no-repeat;
       background-size:cover;
} 

</style>
    <link type="text/css" rel="stylesheet" href="assets/css/bootstrap.css">
    <link type="text/css" rel="stylesheet" href="assets/css/style.css">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>

  
  <h1 style="color:red;">LES EMPLOYES SONT TOUJOURS PRESENTS EN ENTREPRISE</h1>
  <br><br>
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
  <?php





            function pre_r( $array){
            echo '<pre>';
            print_r($array);
            echo '</pre>';
      }
  ?>
<div class="row justify-content-center">
  <div class="form-style-3">


 <form method="POST" action="centee.php"> 
   <fieldset><legend>Un employe doit etre enregistrer </legend><br><br>

     <p><strong><span style="color: #ff0000;">*</span> :</strong><label>MATRICULE
  <input type="text" name="matricule" placeholder="EM0001" class="form-control" value="<?php echo $matricule; ?>"placeholder="matricule" required>
 
  </label></p>
 
  <p><strong><span style="color: #ff0000;">*</span> :</strong><label>NOM
  <input type="text" name="nom" class="form-control"  value="<?php echo $nom; ?>"placeholder="nom" required>
 
  </label></p>
   <p><strong><span style="color: #ff0000;">*</span> :</strong><label>PRENOM
  <input type="text" name="prenom" class="form-control"  value="<?php echo $prenom; ?>"placeholder="prenom" required>
   
  </label></p>
  <p><strong><span style="color: #ff0000;">*</span> :</strong><label>E-MAIL
  <input type="text" name="e_mail" class="form-control"  value="<?php echo $e_mail; ?>"placeholder="e-mail" required>
   
  </label></p>
  <p><strong><span style="color: #ff0000;">*</span> :</strong><label>TELEPHONE
   
  <input type="telephone" 
  id="telephone" name="telephone" class="form-control"  value="<?php echo $telephone; ?>"placeholder="telephone" required>
  
  </label></p>
  <p><strong><span style="color: #ff0000;">*</span> :</strong><label>ADRESS
  <input type="text" name="adress" class="form-control"  value="<?php echo $adress; ?>"placeholder="adress" required>
  
  </label></p>
  <p><strong><span style="color: #ff0000;">*</span> :</strong><label>SALAIRE

  <input type="salaire" id="salaire" name="salaire" min="75000" max="500000" class="form-control"  value="<?php echo $salaire; ?>" placeholder="salaire" required>
   

  </label></p>
  
    </div>
    <div class="form-groupe"> <br><br>
           <?php
           if ($update == true): 
            ?>
<button type="submit" class="btn btn-info" name="update" style="width:80;height: 40; font-size:15">Update</button>
<?php else: ?>

  <button type="submit" class="btn btn-primary" name="enregistrer">enregistrer</button>
<?php endif; ?>
   </div>
</form>
</div>
</div><br><br><br><br>




      
</body>
 </html>  