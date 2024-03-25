<?php 
	if(isset($_POST['find'])){
		$data = new EmployesController();
		$employes = $data->findEmployes();
	}else{
		$data = new EmployesController();
		$employes = $data->getAllEmployes();
	}
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {box-sizing: border-box;}

body { 
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.header {
  overflow: hidden;
  background-color: #f1f1f1;
  padding: 20px 10px;
}

.header a {
  float: left;
  color: black;
  text-align: center;
  padding: 12px;
  text-decoration: none;
  font-size: 18px; 
  line-height: 25px;
  border-radius: 4px;
}

.header a.logo {
  font-size: 25px;
  font-weight: bold;
}

.header a:hover {
  background-color: #ddd;
  color: black;
}



.header-right {
  float: right;
}

@media screen and (max-width: 500px) {
  .header a {
    float: none;
    display: block;
    text-align: left;
  }
  
  .header-right {
    float: none;
  }
}
</style>
</head>
<body>

<div class="header">
  <a href="#default" class="logo">GESTION EMPLOYES</a>
  <div class="header-right">
    <a class="active" href="#home">Home</a>
    <a href="#contact">Contact</a>
    <a href="#about">About</a>
  </div>
</div>
<div class="container">
	<div class="row my-4">
		<div class="col-md-10 mx-auto">
			<?php include('./views/includes/alerts.php');?>
			<div class="card">
				<div class="card-body bg-light">
					<a href="<?php echo BASE_URL;?>add" class="btn btn-sm btn-primary mr-2 mb-2">
						<i class="fas fa-plus"></i>
					</a>
					<a href="<?php echo BASE_URL;?>" class="btn btn-sm btn-secondary mr-2 mb-2">
						<i class="fas fa-home"></i>
					</a>
					<a href="<?php echo BASE_URL;?>logout" title="Déconnexion" class="btn btn-link mr-2 mb-2 ">
						<i class="fas fa-user mr-2 text-success"> <?php echo $_SESSION['username'];?></i>
					</a>
					<form method="post" class="float-right mb-2 d-flex flex-row">
						<input type="text" class="form-control" name="search" placeholder="Recherche">
						<button class="btn btn-info btn-sm" name="find" type="submit"><i class="fas fa-search"></i></button>
					</form>
					<table class="table table-hover">
					  <thead>
					    <tr>
					      <th scope="col">Nom & Prénom</th>
					      <th scope="col">Matricule</th>
					      <th scope="col">Département</th>
					      <th scope="col">Poste</th>
					      <th scope="col">Date Embauche</th>
					      <th scope="col">Statut</th>
					      <th scope="col">Action</th>
					    </tr>
					  </thead>
					  <tbody>
					    <?php foreach($employes as $employe):?>
					    	<tr>
						      <th scope="row"><?php echo strtoupper($employe['nom']).' '.strtoupper($employe['prenom']); ?></th>
						      <td><?php echo $employe['matricule'];?></td>
						      <td><?php echo $employe['depart'];?></td>
						      <td><?php echo $employe['poste'];?></td>
						      <td><?php echo $employe['date_emb'];?></td>
						      <td>
						      	<?php echo $employe['statut']
						      			?
						      			'<span class="badge badge-success">Active</span>'
						      			:
						      			'<span class="badge badge-danger">Resilié</span>';
						      ;?></td>
						      <td class="d-flex flex-row">
						      	<form method="post" class="mr-1" action="update">
						      		<input type="hidden" name="id" value="<?php echo $employe['id'];?>">
						      		<button class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></button>
						      	</form>
						      	<form method="post" class="mr-1" action="delete">
						      		<input type="hidden" name="id" value="<?php echo $employe['id'];?>">
						      		<button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
						      	</form>
						      </td>
						    </tr>
					   	<?php endforeach;?>
					  </tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<footer class="text-center text-white" style="background-color: #f1f1f1;">
  <!-- Grid container -->
  <div class="container pt-4">
    <!-- Section: Social media -->
    <section class="mb-4">
      <!-- Facebook -->
      <a
        class="btn btn-link btn-floating btn-lg text-dark m-1"
        href="https://web.facebook.com/abdelouahed.elmissaoui"
        role="button"
        data-mdb-ripple-color="dark"
        ><i class="fab fa-facebook-f"></i
      ></a>
      <!-- Instagram -->
      <a
        class="btn btn-link btn-floating btn-lg text-dark m-1"
        href="https://www.instagram.com/elmissaoui_abdelouahed/"
        role="button"
        data-mdb-ripple-color="dark"
        ><i class="fab fa-instagram"></i
      ></a>

      <!-- Linkedin -->
      <a
        class="btn btn-link btn-floating btn-lg text-dark m-1"
        href="https://www.linkedin.com/in/abdelouahed-elmissaoui-101a30232/"
        role="button"
        data-mdb-ripple-color="dark"
        ><i class="fab fa-linkedin"></i
      ></a>
      <!-- Github -->
      <a
        class="btn btn-link btn-floating btn-lg text-dark m-1"
        href="https://github.com/abdelouahed5"
        role="button"
        data-mdb-ripple-color="dark"
        ><i class="fab fa-github"></i
      ></a>
    </section>
    <!-- Section: Social media -->
  </div>
  <!-- Grid container -->

  <!-- Copyright -->
  <div class="text-center text-dark p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    © 2023 Copyright:
    <a class="text-dark" href="https://www.linkedin.com/in/abdelouahed-elmissaoui-101a30232/">linkden.com</a>
  </div>
  <!-- Copyright -->
</footer>
</body>
</html>
