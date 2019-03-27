<?php  
require_once('/../../header.php');
?>
<link rel="stylesheet" type="text/css" href="views/pages/gallery/resources/UberGallery.css" />
<link rel="stylesheet" type="text/css" href="views/pages/gallery/resources/colorbox/1/colorbox.css" />

<!-- Breadcrumb Starts -->
	<div class="breadcrumb-wrap">
		<div class="container">
		<!-- Breadcrumb Starts -->
			<ol class="breadcrumb">
				<li><a href="?page=home">Accueil</a></li>
				<li class="active">Gallerie</li>
			</ol>
		<!-- Breadcrumb Ends -->		
		</div>
	</div>
<!-- Breadcrumb Ends -->
<!-- Main Container Starts -->
	<div class="main-container inner container">
		<div class="row">
			
		<?php include_once('resources/UberGallery.php'); $gallery = UberGallery::init()->createGallery('images/gallery'); ?>	
			
		</div>
	</div>
<!-- Main Container Ends -->

	
<!--
<script type="text/javascript" src="://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript" src="views/pages/gallery/resources/colorbox/jquery.colorbox.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $("a[rel='colorbox']").colorbox({maxWidth: "90%", maxHeight: "90%", opacity: ".5"});
    });
</script> -->