
<?php include('connexion.php');
	$msg="";
	if (isset($_POST['btnValider'])){
		/*echo '<pre>';
		print_r ($_FILES['image']);die();*/
			$sql= "INSERT INTO codeuses
			 (email,mot de passe,id_codeuses)
			 VALUES  '".$_POST['email']."',
			 		 '".$_POST['mot de passe']."'),
			 		 '".$_POST['id_codeuses']."')";
			$result=mysqli_query($link	,$sql);
			if ($result) {
				$msg='Insertion reussie';
			}else{
				$msg=mysqli_error($link);
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
		<title>Login</title>
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
				<label for="">Email</label>
				<input type="text" name="stock" class="form-control" placeholder="Email" required="" value="<?php if (isset($_GET['id'])) echo $dataU['email']; ?>">
				
				</div><br>

				<div class="form-group">
				 <label for=""> Mot de passe</label>
				<br><input type="password" name="stock" class="form-control" placeholder="Mot de passe" required="" value="<?php if (isset($_GET['id'])) echo $dataU['mot de passe']; ?>">
				
				</div><br>


				<button type="submit" class="btn btn-primary btn-lg btn-block" id="btnValider" value="enregistrer" name="btnValider">Valider</button>
			</form>
	 		</div>

	 	</div>

	 	<br> <br> <br> <br> <br> <br>


<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>

</body>
</html>