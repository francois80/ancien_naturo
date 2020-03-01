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
												<label for="nom" class="col-sm-4 col-form-label">Votre nom : </label>
											 	<div class="col-sm-8">
													<input type="text" class="form-control" placeholder="Votre nom" id="nom">
											 	</div>
										 	</div>
											<div class="form-group row">
												<label for="prenom" class="col-sm-4 col-form-label">Votre prénom : </label>
											 	<div class="col-sm-8">
													<input type="text" class="form-control" placeholder="Votre prénom" id="prenom">
											 	</div>
										 	</div>
											<div class="form-group row">
												<label for="age" class="col-sm-4 col-form-label">Votre âge : </label>
											 	<div class="col-sm-8">
													<input type="number" class="form-control" placeholder="Votre âge" id="tel">
											 	</div>
										 	</div>
											<div class="form-group row">
												<label for="email" class="col-sm-4 col-form-label">Votre email : </label>
											 	<div class="col-sm-8">
													<input type="email" class="form-control" placeholder="Votre email" id="email">
											 	</div>
										 	</div>
											<div class="form-group row">
												<label for="tel" class="col-sm-4 col-form-label">Votre téléphone : </label>
											 	<div class="col-sm-8">
													<input type="tel" class="form-control" placeholder="Votre téléphone" id="tel">
											 	</div>
										 	</div>
											<div class="form-group row">
												<label for="motifRdv" class="col-sm-4 col-form-label">Motif du rendez-vous : </label>
												<div class="col-sm-8">
													<select id="motifRdv" class="form-control" name="motifRdv">
														<option value="" selected>Sélectionnez</option>
														<option value="naturo">Consultation Naturo</option>
														<option value="idro">Consultation Idro</option>
														<option value="aroma">Consultation Aroma</option>
														<option value="massage">Massage</option>
													</select>
												</div>
											</div>
										 	<div class="form-group row">
												<div class="col-sm-8 offset-sm-4">
													<button type="submit" class="btn-cookie">Envoyer</button>
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
