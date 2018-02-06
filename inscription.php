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
<html lang="en">
	<head>
		
	  
		<meta charset="utf-8">
		<meta http-equiv="X-UA-compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
		<meta name="description" content="c'est une application de gestion de CV">
		<meta name="author" content="codeuse promo2">
		<link rel="icon" href="../../../..favicon.ico">
		<title>Page d'inscription</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		
		
		
		
	</head>

	<body>
	<nav class="navbar navbar-inverse navbar-fixed-top navbar-transparent" role="navigation">
 	<div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    	<div class="navbar-header">
     	 <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        	<span class="sr-only">Menu</span>
        	<span class="icon-bar"></span>
        	<span class="icon-bar"></span>
        	<span class="icon-bar"></span>
      	</button>
      	<ul class="nav navbar-nav">
      		<li> Sheisthecode CV</li>
      	</ul>
    	</div>

     <ul class="nav navbar-nav navbar-right">
        <li><a href="apropos.php">A propos</a></li>
        <li><a href="inscription.php">S'inscrire</a></li>
        <li><a href="login.php">Se connecter</a></li>

     </ul>
    	</div><!-- /.navbar-collapse -->
  	</div><!-- /.container-fluid -->
	</nav> <br> <br> <br> <br>

	<div class="container" style="height:100%; width: 80%">

		<div class="col-sm-6 col-sm-offset-3" >
	       <form action="" method="POST" role="form" enctype="multipart/form-data">
			<legend style="color: lightgreen"> <h1> Formulaire d'inscription </h1> </legend> <span> <?php echo $msg; ?> </span>
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
				<br><input type="password" name="stock" class="form-control" placeholder="Mot de passe" required="" value="<?php if (isset($_GET['id'])) echo $dataU['mot de passe']; ?>">
				
				</div><br>

				<div class="form-group">
					<label for="">Photo</label>
					<input name="image" type="file" class="form-control" id="" placeholder="image">
				</div>

				<button type="submit" class="btn btn-primary btn-lg btn-block" id="btnValider" value="enregistrer" name="btnValider">Valider</button>
			</form>
	 		</div>

	 	</div>

	 	<br> <br> <br> <br> <br> <br>

<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>

	</body>
</html>