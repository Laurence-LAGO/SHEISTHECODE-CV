
<?php include('connexion.php');
	$msg="";
	if (isset($_POST['btnValider'])){
		/*echo '<pre>';
		print_r ($_FILES['image']);die();*/
		if (move_uploaded_file($_FILES['image']['tmp_name'], 'upload/'.$_FILES['image']['name'])) {
			$sql= "INSERT INTO codeuses
			 (nom,prenoms,date de naissance,resume,email,telephone,mot de passe,image,id_codeuses)
			 VALUES ('".$_POST['nom']."',
			 		  '".$_POST['prenoms']."',
			 		  '".$_POST['date de naissance']."',
			 		  '".$_POST['resume']."',
			 		  '".$_POST['email']."',
			 		  '".$_POST['telephone']."',
			 		  '".$_POST['mot de passe']."',
			 		  '".$_FILES['image']['name']."',
	                  '".$_POST['id_codeuses']."')";
			$result=mysqli_query($link	,$sql);
			if ($result) {
				$msg='Insertion reussie';
			}else{
				$msg=mysqli_error($link);
			}
		}

	}

			if (isset($_GET['id']))
	{
		$update="SELECT * FROM codeuses WHERE id=".$_GET['id'];
		$res=mysqli_query($link,$update);
		$dataU=mysqli_fetch_array($res);
	}

if (isset($_GET['sup']))
	{
		$delete="DELETE  FROM codeuses WHERE id=".$_GET['sup'];
		$res=mysqli_query($link,$delete);
	}
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
	<meta name="description" content="c'est une application de gestion de CV">
	<meta name="author" content="codeuse promo2">
	<link rel="icon" href="../../../..favicon.ico">
	<title>Modifier le profil</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

	<nav class="navbar navbar-inverse navbar-fixed-top navbar-transparent" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only"> Menu </span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			<ul class="nav navbar-nav">
      			<li> Sheisthecode CV</li>
      		</ul>
			</div>
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class=" nav navbar-nav navbar-right">
						<li><a href="apropos.php">A propos</a></li>
						<li class="dropdown"> 
							<a href="" class="dropdown-toggle" data-toggle="dropdown"> User <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li> <a href=""> Nom </a> </li>
								<li> <a href=""> Prénoms</a></li>
								<li> <a href=""> Email</a></li>
								<li> <a href=""> Mot de passe </a></li>
							</ul>
						</li>
					</ul>

				</div>
			</div>
		</div>
	</nav> <br> <br> <br> <br>

	<div class="container-fluid">
	<div class="row">
						
		<div class="col-md-6"> 
			<a href="modifierprofil.php"> Modifier Profil</a> <br>
			<a href="creercv.php"> Créer Cv </a> <br>
			<a href="consulter.php"> Afficher Votre CV</a> <br>
			<a href="ajouterexperience.php">Ajouter Expérience</a> <br>
			<a href="ajouterdiplome.php">Ajouter Diplôme</a> <br>
			<a href="ajoutercentredinteret.php">Ajouter Centre d'Intérêt</a>
		</div> 

		<div class="col-md-6"> 
		<div class="container" style="height:100%; width: 80%">

	       <form action="" method="POST" role="form" enctype="multipart/form-data">
			<div class="row">

				<div class="form-group">
				<label for="">Nom</label>
				<input type="text" name="titre" class="form-control" placeholder="Nom" required="" value="<?php if (isset($_GET['id'])) echo $dataU['nom']; ?>">
				
				</div><br>

				<div class="form-group">
				<label for="">Prénoms</label>
				<input type="text" name="prix" class="form-control" placeholder="Prenoms" required="" value="<?php if (isset($_GET['id'])) echo $dataU['prenoms']; ?>">
				
				</div><br>

				<div class="form-group">
				<label for="">Date de naissance </label>
				<input type="text" name="stock" class="form-control" placeholder="jj/mm/aaaa" required="" value="<?php if (isset($_GET['id'])) echo $dataU['date de naissance']; ?>">
				
				</div><br>

				<div class="form-group">
				<label for="">Résumé</label>
				<textarea name="description" class="form-control"><?php if (isset($_GET['id'])) echo $dataU['resume']; ?> </textarea>
	 			</div><br>

				<div class="form-group">
				<label for="">Email</label>
				<input type="text" name="stock" class="form-control" placeholder="Email" required="" value="<?php if (isset($_GET['id'])) echo $dataU['email']; ?>">
				
				</div><br>


				<div class="form-group">
				<label for="">Téléphone</label>
				<input type="text" name="stock" class="form-control" placeholder="Téléphone" required="" value="<?php if (isset($_GET['id'])) echo $dataU['telephone']; ?>">
				
				</div><br>


				<div class="form-group">
				 <label for=""> Mot de passe</label>
				<br><input type="text" name="stock" class="form-control" placeholder="Mot de passe" required="" value="<?php if (isset($_GET['id'])) echo $dataU['mot de passe']; ?>">
				
				</div><br>

				<div class="form-group">
					<label for="">Photo</label>
					<input name="image" type="file" class="form-control" id="" placeholder="image">
				</div>

				<button type="submit" class="btn btn-primary btn-lg btn-block" id="btnValider" value="enregistrer" name="btnValider">Valider</button>
			</form>
	 		</div>

	 	</div>


</div><br> <br> <br>   
					 	<?php 
					if(isset($_POST["submit"]))
						{


						if(isset($_GET['id']))
							{ 

								$sql="UPDATE codeuses SET 
								nom='".$_POST['nom']."',
								prenoms='".$_POST['prenoms']."',
								date de naissance='".$_POST['date de naissance']."',
								resume='".$_POST['resume']."',
								email='".$_POST['email']."',
								telephone='".$_POST['telephone']."',
								mot de passe='".$_POST['mot de passe']."',
								image='".$_POST['image']."',
								id_codeuses='".$_POST['id_codeuses']."' WHERE id=".$_GET['id'];
							}else
								{
						
									$sql="INSERT INTO codeuses(libelle,description) 
									VALUES(
											'".$_POST["nom"]."',
											'".$_POST["prenoms"]."',
											'".$_POST["date de naissance"]."',
											'".$_POST["resume"]."',
											'".$_POST["email"]."',
											'".$_POST["telephone"]."',
											'".$_POST["mot de passe"]."',
											'".$_POST["image"]."',
											'".$_POST["id_codeuses"]."'
										)";//die(sql);
								}
						$result=mysqli_query($link,$sql);
						if ($result) {
						echo "<h3 style=color:green>Super! Insertion reussie</h3>";
						# code...
						}else{
						echo "mysql_error()";
						die();
					}

			}
			 ?>






<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>

</body>
</html>