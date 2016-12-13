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
								<a href='javascript:void(0)' class='closebtn hidden-md hidden-lg' onclick='closeOverlay()''>X</a>
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
<!-- 								<div class='col-md-1 col-sm-6 col-xs-6'>
	<i class='fa fa-eye-slash opacityEye' data-state='0' aria-hidden='true'></i>
</div> -->
							</div>
							<div class="row">
								<div class='col-md-4 col-md-offset-4 col-sm-4 col-sm-offset-4 col-xs-4 col-xs-offset-4'>
									<a class='mapLink' href="" target="_blank">
										<div >
											<span class='hidden-md hidden-lg'></span>
											<h3>Je m'y rends !</h3>
										</div>
									</a>
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