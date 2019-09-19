<?php
 		session_start();//messa

				$mysqli = new mysqli('localhost', 'root', 'papepol1', 'wordpress') or die(mysqli_error($mysqli));// Connectee a la base de donnee
?>

    

<?php
 
				$mysqli = new mysqli('localhost', 'root', 'papepol1', 'wordpress') or die(mysqli_error($mysqli));
			      
			    $id = 0;
			    $update = false; 
			    $matricule='';
			    $nom='';
			    $prenom='';
			    $e_mail='';
			    $telephone='';
			    $adress='';
			    $salaire='';
			   




				if (isset($_POST['enregistrer'])){
					$matricule=$_POST['matricule'];
					$nom=$_POST['nom'];
					$prenom=$_POST['prenom'];
					$e_mail=$_POST['e_mail'];
					$telephone=$_POST['telephone'];
					$adress=$_POST['adress'];
					$salaire=$_POST['salaire'];
									

					$mysqli->query("INSERT INTO employe (matricule,nom, prenom, e_mail, telephone, adress, salaire) VALUES('$matricule','$nom', '$prenom', '$e_mail', 
					'$telephone', '$adress', '$salaire')")  or  
					die($mysqli->error);
					$_SESSION['message'] = "votre enregistrement est bien reuisi";//mes sage reuisi
					$_SESSION['msg_type'] = "success";//message reuisi
					header("location: client.php");

				}
if (isset($_GET['delete'])){
	$id = $_GET['delete'];
	$mysqli->query("DELETE FROM employe WHERE id=$id") or die($mysqli->error());
	$_SESSION['message'] = "votre suppretion est bien reuisi";//message reuisi
	$_SESSION['msg_type'] = "danger";//message reuisi
	header("location: listclient.php");
	}
							if (isset($_GET['edit'])){
								$id = $_GET['edit'];
								$update = true;
								$result = $mysqli->query("SELECT * FROM employe WHERE id=$id") or die($mysqli->error());
								  { 
								  	$row = $result->fetch_array();
								  	$matricule = $row['matricule'];
								  	$nom = $row['nom'];
								  	$prenom=$row['prenom'];
									$e_mail=$row['e_mail'];
									$telephone=$row['telephone'];
									$adress=$row['adress'];
									$salaire=$row['salaire'];
									
								  }
							}

if (isset($_POST['update'])){ 
	$id = $_POST['id'];
	$matricule = $_POST['matricule'];
	$nom = $_POST['nom'];
	$prenom=$_POST['prenom'];
	$e_mail=$_POST['e_mail'];
	$telephone=$_POST['telephone'];
	$adress=$_POST['adress'];
	$salaire=$_POST['salaire'];
	

	$mysqli->query("UPDATE employe SET nom='$nom' WHERE id='$id'")
	or die($mysqli->error);

	$_SESSION['message'] = "update est bien reuisi";//mes sage reuis'i
	$_SESSION['msg_type'] = "warning";//message reuisi
	header("location: client.php");


}

 
?>
     