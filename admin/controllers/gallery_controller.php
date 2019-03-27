<?php
require_once('models/gallery/crudPhoto.php');

  class GalleryController {
    public function show() {
		$photos = crudPhoto::All();
		require_once('views/gallery/gallery.php');
    }
  }
?>