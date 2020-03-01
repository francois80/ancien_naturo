<?php include "header.php"; ?>

	<main class="container">
	<?php include 'nav.php'; ?>
			<div id="content" class="row justify-content-around">
				<!-- DEBUT TITRE -->
				<div class="container-fluid">
					<div class="row">

							<div class="container d-md-flex">
								<div class="card mb-1 bloc_Large">
									<div class="no-gutters">
										<form>
											<div class="form-group row">
												<label for="nomPsw" class="col-sm-4 col-form-label">Votre nom : </label>
											 	<div class="col-sm-8">
													<input type="text" class="form-control" placeholder="Votre nom" id="nomPsw">
											 	</div>
										 	</div>
											<div class="form-group row">
												<label for="motPasse" class="col-sm-4 col-form-label">Votre mot de passe : </label>
											 	<div class="col-sm-8">
													<input type="password" class="form-control" placeholder="mot de passe" id="motPasse">
											 	</div>
										 	</div>
										 	<div class="form-group row">
												<div class="col-sm-8 offset-sm-4">
													<button type="submit" class="btn-cookie">Envoyer</button>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
		</main>
		<?php include 'footer.php'; ?>
