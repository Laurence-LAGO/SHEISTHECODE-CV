<?php include('connexion.php');
	$msg="";
	if (isset($_POST['btnValider'])){
		/*echo '<pre>';
		print_r ($_FILES['image']);die();*/
			$sql= "INSERT INTO diplomes
			 (annee obtention,libelle du diplome,ecole)
			 VALUES ('".$_POST['annee obtention']."',
			 		'".$_POST['libelle du diplome']."',
			 		'".$_POST['ecole']."')";
			$result=mysqli_query($link	,$sql);
			if ($result) {
				$msg='Insertion reussie';
			}else{
				$msg=mysqli_error($link);
			}

	}

			if (isset($_GET['id']))
	{
		$update="SELECT * FROM diplomes WHERE id=".$_GET['id'];
		$res=mysqli_query($link,$update);
		$dataU=mysqli_fetch_array($res);
	}

if (isset($_GET['sup']))
	{
		$delete="DELETE  FROM diplomes WHERE id=".$_GET['sup'];
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
	<title>Consulter le CV</title>
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
				<label for="">Etablissement</label>
				<input type="text" name="titre" class="form-control" placeholder="Etablissement d'obtention du diplôme" required="" value="<?php if (isset($_GET['id'])) echo $dataU['nom']; ?>">
				
				</div><br>

				<div class="form-group">
				<label for="">Diplôme</label>
				<input type="text" name="prix" class="form-control" required="" value="<?php if (isset($_GET['id'])) echo $dataU['prenoms']; ?>">
				
				</div><br>

				<div class="form-group">
				<label for="">Date d'obtention</label>
				<input type="text" name="stock" class="form-control" placeholder="jj/mm/aaaa" required="" value="<?php if (isset($_GET['id'])) echo $dataU['date de naissance']; ?>">
				
				</div><br>

				<button type="submit" class="btn btn-primary btn-lg btn-block" id="btnValider" value="enregistrer" name="btnValider">Valider</button>
			</form>
	 		</div> <br> <br> 

	 		<div>
				<table border="2px" class="table">
					<thead style="background-color: cyan
					">
						<tr>
					 		<th><b>Numero</b></th>
					 		<th><b>Ecole</b></th>
					 		<th><b>Diplôme</b></th>
					 		<th><b>Date d'obtention</b></th>
					 		<th><b>Action</b></th>
				 		</tr>
					</thead>

					<tbody >
							<?php	
							$n=1;
							$list=" SELECT * FROM diplomes"; 
							$res= mysqli_query($link,$list);
							 while ($data = mysqli_fetch_array($res)){
							?>
							<tr>
								<td><?php echo $n; ?></td>
								<td><?php echo $data['année obtention']; ?></td>
								<td><?php echo $data['ecole']; ?></td>
								<td><?php echo $data['diplome']; ?></td>
								<td><?php echo $data['id_codeuses']; ?></td>
								<td>
                                	<a href="?id=<?php echo $data['id']; ?>" >modifier</a>
									<a href="?sup=<?php echo $data['id']; ?>">supprimer</a>
								</td>
								
							</tr>
							<?php
								$n++;
							}?>
					</tbody>
				 
			 	</table>
			 	
			 	</div>

	 	</div>


</div><br> <br> <br>   






<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>

</body>
</html>