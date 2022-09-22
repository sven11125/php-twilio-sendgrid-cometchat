		<div id="custom-message" class="light-popup mfp-hide">
			<h2 id='cm_custom-message-title'>...</h2>
			<p id='cm_custom-message-content'>...</p>
		</div>
		
		<script>
			var ajaxURL = '<?php echo getHomeURL ?>inc/ajax.php';
			var homeURL = '<?php echo getHomeURL ?>';
		</script>
		
		<script src="<?php echo getHomeURL ?>slicing/js/jquery-3.3.1.min.js"></script>
		<script src="<?php echo getHomeURL ?>slicing/js/vendors.js"></script>
		<script src="<?php echo getHomeURL ?>slicing/js/bundle.js"></script>
		<script src="<?php echo getHomeURL ?>slicing/js/impl.js"></script>
		<script src="https://raw.githack.com/SortableJS/Sortable/master/Sortable.js"></script>
		<script src="https://cdn.zinggrid.com/zinggrid.min.js" defer></script>
		
		<link   rel="stylesheet"      href="<?php echo getHomeURL ?>slicing/lib/simple-cropper/css/style.css" />
		<link   rel="stylesheet"      href="<?php echo getHomeURL ?>slicing/lib/simple-cropper/css/jquery.Jcrop.css" />
		<script src="<?php echo getHomeURL ?>slicing/lib/simple-cropper/scripts/jquery.Jcrop.js"></script>
		<script src="<?php echo getHomeURL ?>slicing/lib/simple-cropper/scripts/jquery.SimpleCropper.js"></script>
		
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCDw2MxC9VKFuYloehYGDHDj9jEOIRogXA&libraries=places&callback=initAutocomplete"></script>
		<link rel="stylesheet" href="<?php echo getHomeURL ?>slicing/fontawesome/fontawesome/all.min.css" />
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,500,700&display=swap">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</body>
</html>
<?php mysqli_close($SiteConn) ?>