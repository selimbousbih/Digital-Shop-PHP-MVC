<?php
  function call($controller, $action) {
    require_once('controllers/' . $controller . '_controller.php');

    switch($controller) {
      case 'gallery':
		$controller = new GalleryController();
      break;
	  case 'products':
		$controller = new ProductsController();
      break;
	  case 'promotions':
		$controller = new PromotionsController();
      break;
	  case 'members':
		$controller = new MembersController();
	  break;
	  case 'contacts':
		$controller = new ContatsController();
      break;
	  case 'commands':
		$controller = new CommandsController();
      break;
	  case 'pages':
		$controller = new PagesController();
      break;
    }

      $controller->{ $action }();
  }

  $controllers = array('pages' => ['home', 'error'],
                       'products' => ['show', 'add', 'edit', 'export'],
                       'promotions' => ['show', 'add', 'modify', 'delete'],
                       'members' => ['show'],
					   'contacts' => ['show', 'delete'],
					   'gallery' => ['show']);

  if (array_key_exists($controller, $controllers)) {
    if (in_array($action, $controllers[$controller])) {
      call($controller, $action);
    } else {
      call('pages', 'error');
    }
  } else {
    call('pages', 'error');
  }
?>
