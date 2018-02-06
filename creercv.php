
<?php include('connexion.php');
	$msg="";
	if (isset($_POST['btnValider'])){
		/*echo '<pre>';
		print_r ($_FILES['image']);die();*/
			$sql= "INSERT INTO cv
			 (facebook,twiter,google,github)
			 VALUES  '".$_POST['facebook']."',
			 		 '".$_POST['twiter']."',
			 		 '".$_POST['google']."',
			 		 '".$_POST['github']."')";
			$result=mysqli_query($link	,$sql);
			if ($result) {
				$msg='Insertion reussie';
			}else{
				$msg=mysqli_error($link);
			}

	}

			if (isset($_GET['id']))
	{
		$update="SELECT * FROM cv WHERE id=".$_GET['id'];
		$res=mysqli_query($link,$update);
		$dataU=mysqli_fetch_array($res);
	}

if (isset($_GET['sup']))
	{
		$delete="DELETE  FROM cv WHERE id=".$_GET['sup'];
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
	<title>Créer un CV</title>
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
				<label for="">Facebook</label>
				<input type="text" name="titre" class="form-control" placeholder="Lien Profil Facebook" required="" value="<?php if (isset($_GET['id'])) echo $dataU['facebook']; ?>">
				
				</div><br>

				<div class="form-group">
				<label for="">Twiter</label>
				<input type="text" name="prix" class="form-control" placeholder="Lien Profil Twiter" required="" value="<?php if (isset($_GET['id'])) echo $dataU['twiter']; ?>">
				
				</div><br>

				<div class="form-group">
				<label for="">Github</label>
				<input type="text" name="prix" class="form-control" placeholder="Lien Profil Twiter" required="" value="<?php if (isset($_GET['id'])) echo $dataU['twiter']; ?>">
				
				</div><br>

				<div class="form-group">
				<label for="">Google+</label>
				<input type="text" name="stock" class="form-control" placeholder="Lien Profil Google" required="" value="<?php if (isset($_GET['id'])) echo $dataU['google']; ?>">
				
				</div><br>


				<button type="submit" class="btn btn-primary btn-lg btn-block" id="btnValider" value="enregistrer" name="btnValider">Valider</button>
			</form>
	 		</div>

	 	</div>


</div><br> <br> <br>   






<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>

</body>
</html>