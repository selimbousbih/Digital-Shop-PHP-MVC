<?php
  function call($controller, $action) {
    require_once('controllers/' . $controller . '_controller.php');

    switch($controller) {
      case 'pages':
        $controller = new PagesController();
      break;
      case 'category_grid':
        $controller = new CategoryGridController();
      break;
	  case 'product':
        $controller = new ProductController();
      break;
	  case 'search':
        $controller = new SearchController();
      break;
	  case 'shopping_cart':
        $controller = new ShoppingCartController();
      break;
	  case 'members':
        $controller = new MemebersController();
      break;
	  case 'order':
        $controller = new OrderController();
      break;
    }

    $controller->{ $action }();
  }

  $controllers = array('pages' => ['home', 'error', 'gallery', 'contact', 'events', 'promotions', 'accessories'],
                       'category_grid' => ['show'],
                       'shopping_cart' => ['deliveryForm'],
                       'product' => ['show'],
					   'search' => ['show'],
					   'order' => ['cart', 'purshase'],
					   'members' => ['login', 'register', 'reg_success', 'activate', 'logout', 'info']);

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
