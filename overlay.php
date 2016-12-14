<div class="overlay">

	<div id="myNavTop" class="topPart" target-state="0">
		<div class="container-fluid">
			<div class="row topPartContent">
				<div class='col-md-6 hidden-sm hidden-xs filmImg' onclick='closeOverlay()'>
					<a href='javascript:void(0)' class='closebtn' onclick='closeOverlay()''>X</a>
					<div class='imageOeuvre'>
						<h1></h1>
					</div>
				</div>
				<div class='col-md-6 col-sm-12 cold-xs-12 sceneDescription'>
					<div class='dynamicContent'>
						<div class='contentContainer'>
							<div class='row'>
								<div class='col-md-2 col-sm-2 col-xs-2'>
									<i class='fa fa-arrow-left changeSceneOeuvre' aria-hidden='true' target-type='previous' target-url=""></i>
								</div>
								<div class='col-md-8 col-sm-8 col-xs-8'>
									<div class='nomScene'>
										<span class='hidden-md hidden-lg'></span>
										<h3></h3>
									</div>
								</div>
								<div class='col-md-2 col-sm-2 col-xs-2'>
									<i class='fa fa-arrow-right changeSceneOeuvre' aria-hidden='true' target-type='next' target-url=""></i>
								</div>
							</div>
							<div class='row'>
								<div class='col-md-10 col-md-offset-1 col-sm-12 col-xs-12'>
									<div class='descriptionBloc text'>
										<p></p>
									</div>
								</div>
							</div>
							<div class="row">
								<div class='col-md-5 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-6 col-xs-offset-3'>
									<a class='mapLink' href="" target="_blank">
										<h3>Je m'y rends !<i class="fa fa-location-arrow" aria-hidden="true"></i></h3>
									</a>
									<div class='back hidden-md hidden-lg' onclick='closeOverlay()''>
										<h3>Retour</h3>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="myNavBottom" class="bottomPart">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12 mapReceiver">
					<div id="map"></div>
				</div>
			</div>
		</div>
	</div>

</div>