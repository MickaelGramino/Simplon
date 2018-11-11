<?php 
// Connexion à la base de donnée
$db = mysqli_connect("localhost", "root", "", "gestionordinateur") or die("La base de donnée n'est pas connecté");
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Simplon.co - Gestion d'ordinateur</title>

    <!-- Fichier CSS du Bootstrap  -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
    <link href="css/stylish-portfolio.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.3/css/bootstrap-select.min.css">
	
  </head>

  <body id="page-top">

    <!-- Menu principal -->
    <a class="menu-toggle rounded" href="#">
      <i class="fas fa-bars"></i>
    </a>
    <nav id="sidebar-wrapper">
      <ul class="sidebar-nav">
        <li class="sidebar-nav-item">
          <a class="js-scroll-trigger" href="#page-top">Accueil</a>
        </li>
        <li class="sidebar-nav-item">
          <a class="js-scroll-trigger" href="#ordinateur">Liste des ordinateurs utilisés</a>
        </li>
        <li class="sidebar-nav-item">
          <a class="js-scroll-trigger" href="#nouvelutilisateur">Créer un Étudiant</a>
        </li>
        <li class="sidebar-nav-item">
          <a class="js-scroll-trigger" href="#attributiondeposte">Attribuer un ordinateur</a>
        </li>
      </ul>
    </nav>

    <!-- Header -->
    <header class="masthead d-flex">
      <div class="container text-center my-auto">
        <h1 class="mb-1">Gestion d'ordinateur</h1>
        <h3 class="mb-5">
          <em>La gestion d'ordinateur facilement</em>
        </h3>
      </div>
      <div class="overlay"></div>
    </header>

    <!-- Liste d'Ordinateurs -->
    <section class="content-section bg-light" id="ordinateur">
      <div class="container text-center">
        <div class="row">
          <div class="col-lg-10 mx-auto">
            <h2>Liste des étudiants </h2>
            <p class="lead mb-5">La liste des occupations de poste contient : ( nom et prénom de l'étudiant / Identifiant du poste / plage horaire</p>
          </div>
          <?php 
          if( isset($_GET['remove']) && $_GET['remove'] == "reservation" ) {

          		$reservID = $_GET['reservID'];
          		$select_reserv = mysqli_query($db, "select * from reservation where idReservation = '".$reservID."'");
          		$select_reserv_f = mysqli_fetch_array($select_reserv);

          		$del_reserv = mysqli_query($db, "delete from reservation where idReservation = '".$reservID."'");
          		if( $del_reserv ) {
          			echo 'assignment removed!';
          			
          			//update etudiant id..
          			$update_etudiant_disponible = mysqli_query($db, "update etudiant set disponible = '0' where idetudiant = '".$select_reserv_f['Reservation_etudiant_id']."'");
          			//update ordinateur id..
          			$update_ordinateur_disponible = mysqli_query($db, "update ordinateur set Disponible = '0' where idordinateur = '".$select_reserv_f['Reservation_ordinateur_id']."'");

          			echo '<script>window.location="index.php#ordinateur";</script>';
          			die;
          		}

          }
          ?>
		  <table class="table table-striped">
			  <thead class="thead-dark">
				<tr>
				  <th scope="col">#</th>
				  <th scope="col">Nom</th>
				  <th scope="col">Prénom</th>				  
				  <th scope="col">ID Ordinateur</th>
				  <th scope="col">Réservé jusqu'a</th>
				  <th scope="col">Assignation</th>
				 
				</tr>
			  </thead>
			  <tbody>
			  	<?php 
			  	$select_reservation = mysqli_query($db, "select * from reservation");
				//La fonction "mysqli_num_rows" va compté le nombre de ligne obtenu avec requête donnée
			  	if( mysqli_num_rows($select_reservation) ) {
					
					//On parcours toutes les lignes pour leurs appliqué un traitement
			  		for( $k=1; $k<=mysqli_num_rows($select_reservation); $k++ ) 
					{
						//La fonction "mysqli_fetch_array" va retourner une ligne de la requête découpée sous forme de tableau pour chaque champs.
			  			$select_reservation_f = mysqli_fetch_array($select_reservation);
			  			?>
			  			<tr>
						  <th scope="row"><?php echo $k; ?></th>
						  <!-- On afficher la ligne d'informations  sous la forme ( nom, prenom, horaire, -->
						  <td><?php echo htmlspecialchars_decode($select_reservation_f['Reservation_etudiant_nom'], ENT_QUOTES); ?></td>
						  <td><?php echo htmlspecialchars_decode($select_reservation_f['Reservation_etudiant_prenom'], ENT_QUOTES); ?></td>
						  <td><?php echo $select_reservation_f['Reservationcol']; ?></td>
						  <td><?php echo $select_reservation_f['Reservation_horaire']; ?></td>
						  <td><a href="index.php?remove=reservation&reservID=
						  <?php echo $select_reservation_f['idReservation']; ?>"><button style="cursor: pointer;" type="button" class="btn-sm btn-danger">Retirer l'assignation</button></a></td>
						 
						</tr><?php
			  		}
			  	} else {
			  		?>
			  		<tr>
			  			<td colspan="6"><h5 style="margin: 0; font-weight: normal;">Pas de réservations</h5></td>
			  		</tr>
			  		<?php
			  	}
			  	?>
			  </tbody>
			</table>
        </div>
      </div>
    </section>

    <!-- Création d'un nouvel utilisateur -->
    <section class="content-section bg-primary text-white text-center" id="nouvelutilisateur">
      <div class="container text-center">
        <div class="content-section-heading">
          <h3 class="text-secondary mb-0">Étudiant</h3>
          <h2 class="mb-5">Créer un nouvel étudiant</h2>
          <?php 
          if( isset($_GET['create']) && $_GET['create'] == "user" ) {

          		$etudiantnom = htmlspecialchars($_POST['etudiantnom']);
          		$etudiantprenom = htmlspecialchars($_POST['etudiantprenom']);
          		$disponible = '0';

          		$createuser = mysqli_query($db, "insert into etudiant(etudiantnom,etudiantprenom,disponible) values('".$etudiantnom."','".$etudiantprenom."','".$disponible."')");
          		if( $createuser ) {
          			echo 'user created!';
          			echo '<script>window.location="index.php#nouvelutilisateur";</script>';
          			die;
          		}

          }
          ?>
		  <form class="container text-center" action="index.php?create=user" method="post">
				  <div class="form-row align-items-center content-section-heading">
					  <input type="text" class="form-control" id="inlineFormInputName" name="etudiantnom" placeholder="Nom"></br>
					  <input type="text" class="form-control" id="inlineFormInputName" name="etudiantprenom" placeholder="Prénom"><br></br><br></br>
					  <button type="submit" class="btn btn-warning container">Créer</button>
				  </div>
			</form>
        </div>
      </div>
    </section>
    

    <!-- Formulaire qui permet d'attribuer un poste à un étudiant -->
   <section class="content-section bg-primary text-white text-center" id="attributiondeposte">
      <div class="container">
        <div class="content-section-heading">
          <h3 class="text-secondary mb-0">Ordinateur</h3>
          <h2 class="mb-5">Attribuer un ordinateur</h2>
		  	
		  	<?php 
		  	if( isset($_GET['assign']) && $_GET['assign'] == "computer" ){

		  		$etudiant_nom = $_POST['etudiant_nom'];
		  		
				//On récupère laliste des étudiants
		  		$select_etudiant_nom = mysqli_query($db, "select * from etudiant where idetudiant = '".$etudiant_nom."'"); 
				//On les récupères sous forme de listes
		  		$select_etudiant_nom_fetch = mysqli_fetch_array($select_etudiant_nom);

		  		$reservation_etudiant_nom = $select_etudiant_nom_fetch['etudiantnom'];
		  		$reservation_etudiant_prenom = $select_etudiant_nom_fetch['etudiantprenom'];
		  		
		  		$reservation_horaire = $_POST['reservation_horaire'];

		  		$ordinateur_id = $_POST['ordinateur_id'];

		  		$select_ordinateur_id = mysqli_query($db, "select * from ordinateur where idordinateur = '".$ordinateur_id."'"); 
		  		$select_ordinateur_id_fetch = mysqli_fetch_array($select_ordinateur_id);

		  		$reservationcol = $select_ordinateur_id_fetch['Identifiantordinateur'];

		  		$assigncomp = mysqli_query($db, "insert into reservation(Reservation_etudiant_id,Reservation_etudiant_nom,Reservation_etudiant_prenom,Reservation_horaire,Reservation_ordinateur_id,Reservationcol) values('".$etudiant_nom."', '".$reservation_etudiant_nom."','".$reservation_etudiant_prenom."','".$reservation_horaire."','".$ordinateur_id."','".$reservationcol."')");
          		if( $assigncomp ) {
          			echo 'assign computer!';
          			
          			//update etudiant id..
          			$update_etudiant_disponible = mysqli_query($db, "update etudiant set disponible = '1' where idetudiant = '".$etudiant_nom."'");
          			//update ordinateur id..
          			$update_ordinateur_disponible = mysqli_query($db, "update ordinateur set Disponible = '1' where idordinateur = '".$ordinateur_id."'");

          			echo '<script>window.location="index.php#attributiondeposte";</script>';
          			die;
          		} else {
          			echo mysqli_error($db);
          		}

		  	}
		  	?>

		  	<form action="index.php?assign=computer" method="post">
		  		<div class="btn-group" style="margin-left: 30px;">
				  
				  	<select class="selectpicker" data-style="btn-warning" name="etudiant_nom" data-live-search="true" style="margin-left: 30px;">
						<option data-tokens="student_1">Étudiant</option>
						<?php $select_etudiant = mysqli_query($db, "select * from etudiant where disponible = '0'"); 
						for( $i=1; $i<=mysqli_num_rows($select_etudiant); $i++ ) {
							$ii = $i + 1;
							$select_etudiant_fetch = mysqli_fetch_array($select_etudiant);
							echo '<option data-tokens="student_'.$ii.'" value="'.$select_etudiant_fetch['idetudiant'].'">'.htmlspecialchars_decode($select_etudiant_fetch['etudiantnom'], ENT_QUOTES).', '.htmlspecialchars_decode($select_etudiant_fetch['etudiantprenom'], ENT_QUOTES).'</option>';
						} ?>
					</select>
					<div style="margin-left: 30px;">
						<select class="selectpicker" name="reservation_horaire" data-style="btn-warning" style="margin-left: 30px;">
						  	<option>Horaires</option>
							<option value="09:30">09:30</option>
							<option value="10:00">10:00</option>
							<option value="10:30">10:30</option>
							<option value="11:00">11:00</option>
							<option value="11:30">11:30</option>
							<option value="12:00">12:00</option>
							<option value="12:30">12:30</option>
							<option value="13:00">13:00</option>
							<option value="13:30">13:30</option>
							<option value="14:00">14:00</option>
							<option value="14:30">14:30</option>
							<option value="15:00">15:00</option>
							<option value="15:30">15:30</option>
							<option value="16:00">16:00</option>
							<option value="16:30">16:30</option>
						</select>
					</div>
					<div style="margin-left: 30px;">
						<select class="selectpicker" name="ordinateur_id" data-style="btn-warning" style="margin-left: 30px;">
							<option>ID Ordinateur</option>
							<?php $select_ordinateur = mysqli_query($db, "select * from ordinateur where Disponible = '0'"); 
							for( $j=1; $j<=mysqli_num_rows($select_ordinateur); $j++ ) {
								$select_ordinateur_fetch = mysqli_fetch_array($select_ordinateur);
								echo '<option value="'.$select_ordinateur_fetch['idordinateur'].'">Ordinateur '.$select_ordinateur_fetch['Identifiantordinateur'].'</option>';
							} ?>
						</select>
						<button type="submit" class="btn btn-warning" style="margin-left: 30px;">Créer</button>
					</div>
				</div>
		  	</form>
		</div>	
    </div>
  </div>
    </section>

    <!-- Pied de page -->
    <footer class="footer text-center">
      <div class="container">
        <ul class="list-inline mb-5">
          <li class="list-inline-item">
            <a class="social-link rounded-circle text-white mr-3" href="https://www.facebook.com/simplonreunion/">
              <i class="icon-social-facebook"></i>
            </a>
          </li>
          <li class="list-inline-item">
            <a class="social-link rounded-circle text-white mr-3" href="https://twitter.com/simplon_reunion">
              <i class="icon-social-twitter"></i>
            </a>
          </li>
        </ul>
        <p class="text-muted small mb-0">Copyright &copy; Simplonreunion.co | Gestion ordinateur 2018</p>
      </div>
    </footer>

    <!-- Bouton pour remonter tout en haut de la page -->
    <a class="scroll-to-top rounded js-scroll-trigger" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Librairie JavaScript fonctionnant avec bootstrap -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Librairie jQuery pour faire des animation fluide -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Fichier JavaScript de l'animation du menu et du thème en général -->
    <script src="js/stylish-portfolio.min.js"></script>
	<!-- Librairie JavaScript qui met en place bootstrap pour avoir des "forms" personnalisé comme le champs de recherche des étudiants -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.3/js/bootstrap-select.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.3/js/i18n/defaults-*.min.js"></script>

  </body>

</html>
