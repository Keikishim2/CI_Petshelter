<!DOCTYPE html>
<html>
<head>
	<title>PetShelter</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="../../assets/css/index.less">
	<link rel="stylesheet/less" type="text/css" href="../../assets/css/index.less" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script src="//cdn.jsdelivr.net/npm/less@4.1.1"></script>
	<script src="../../assets/js/index.js"></script>
	<script>
		$(document).ready(function() {});
	</script>
</head>
<body>
	<header>
		<nav class="wrap">
			<div class="container">
				<a class="navbar-brand" href="#">PETSHELTER</a>
				<aside class="nav-links">
					<a href="#" class="active">Home</a>
					<a href="#">Services</a>
					<a href="#">Event</a>
					<button type="button" class="btn btn-add-pet-to-shelter" data-toggle="modal" data-target="#addPet"><i class="fa fa-plus-circle" aria-hidden="true"></i>Add pet to shelter
					</button>
					<section><!--DOCU
								Adding pet to the shelter

								OWNER: Kei Kishimoto-->
						<div class="modal fade" id="addPet" aria-labelledby="addPet" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="addPet">Add Pet</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<form action="#" method="POST">
										<div class="modal-body">
											<div class="form-group">
												<div class="col-md-3">
													<label for="pet-name">Pet Name</label>
												</div>
												<div class="col-md-9">
													<input type="text" class="form-control" id="pet-name" name="pet-name" aria-describedby="emailHelp" />
												</div>
											</div>
											<div class="form-group">
												<div class="col-md-3">
													<label for="pet-name">Pet Type</label>
												</div>
												<div class="col-md-9">
													<select class="form-control custom-select" id="pet-type" name="pet-type">
														<option>Cat</option>
														<option>Dog</option>
														<option>Penguin</option>
														<option>Duck</option>
													</select>
												</div>
											</div>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-add" data-dismiss="modal"><i class="fas fa-save"></i>Add Pet</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</section>
				</aside>
			</div>
		</nav>
	</header>
	<section>
		<main>
			<div class="shop">
				<img src="../../assets/images/1.png">
				<h1>Let's <span class="adopt">Adopt</span><br>Don't <span class="shop_span">Shop</span></h1><!--
				--><p>Lorem ipsum dolor sit amet, consectetur<br>adipiscing elit. Neque id lorem nisi.</p>
			</div>
			<h3>These pets are looking for a good home</h3>
			</div>
		</main>
		<div class="pets-section">
			<div class="container">
				<div class="row">
					<div class="pet-lists">
						<section>
							<menu class="all_pets" data-pet="Garfield">
								<p>Garfield</p>
								<p>Cat</p>
								<div class="action">
									<a href="#" role="button" class="detailsPet-open-modal" data-toggle="modal" data-target=".detailsPet"><i class="fas fa-clipboard-list"></i>Details</a>
									<a href="#" role="button" data-toggle="modal" class="editPet-open-modal" data-target=".editPet"><i class="fas fa-edit"></i> Edit</a>
								</div>
							</menu>
						</section>
					</div>
				</div>
				<section><!--DOCU
								Viewing pet details

								OWNER: Kei Kishimoto-->
					<div class="row">
						<div class="modal fade detailsPet" id="detailsPet" tabindex="-1" aria-labelledby="detailsPet" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="detailsPet">Details About: <span class="pet-name">Garfield</span></h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
										</button>
									</div>
									<form class="form-info">
										<div class="modal-body">
											<div class="form-group">
												<div class="col-md-3">
													<label for="pet-type">Pet Type</label>
												</div>
												<div class="col-md-9">
													<p id="pet-type" class="pet-type">Cat</p>
												</div>
											</div>
										</div>
										<div class="modal-footer">
											<p><span class="likes">0</span> Likes</p>
											<div class="button-group">
												<button type="button" id="btn-like" class="btn btn-like-pet" data-dismiss="modal"><i class="fas fa-heart"></i>Like <span 	class="pet-name"></span>
												</button>
												<button type="button" class="btn btn-adopt-pet" data-dismiss="modal"><i class="fa fa-home" aria-hidden="true"></i>Adopt <span class="pet-name"></span>
												</button>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</section>
					<section><!--DOCU
								Pet editing in modal form

								OWNER: Kei Kishimoto-->
						<div class="modal fade editPet" id="editPet" tabindex="-1" aria-labelledby="editPet" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="addPet">Edit Details: <span class="pet-name">Garfield</span></h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<form class="form-info">
										<div class="modal-body">
											<div class="form-group">
												<div class="col-md-3">
													<label for="pet-name">Pet Type</label>
												</div>
												<div class="col-md-9">
													<select class="form-control custom-select pet-type" id="pet-type-edit" name="pet-type">
														<option>Cat</option>
														<option>Dog</option>
														<option>Penguin</option>
														<option>Duck</option>
													</select>
												</div>
											</div>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-update" data-dismiss="modal"><i class="fas fa-save"></i>Save Changes</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</section>
				</div>
			</div>
		</div>
	</section>
	<footer>@2020<span class="v88"> V88Studios</span>. All Rights Reserved</footer>
</body>
</html>