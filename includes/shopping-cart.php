<?php
	require_once('functions.php');
	require_once('/../models/crudProduct.php');
	require_once('/../models/crudShoppingCart.php');
	sec_session_start();
	
	$itemsCount = 0;
	if (isset($_GET['action'])){
		$action = $_GET['action'];
		switch($action){
			case 'add':
				if (isset($_GET['pid'], $_SESSION['user_id'])){
					$pid = $_GET['pid'];
					$uid = $_SESSION['user_id'];
					crudShoppingCart::addItem($uid, $pid);
				}			
			break;
			
			case 'delete':
				if (isset($_GET['pid'], $_SESSION['user_id'])){
					$pid = $_GET['pid'];
					$uid = $_SESSION['user_id'];
					crudShoppingCart::removeItem($uid, $pid);
				}
			break;
		}
	}
	
	$items = array();
		
	if(isset($_SESSION['user_id'])){
		$uid = $_SESSION['user_id'];
		$items = crudShoppingCart::getMemberItems($uid);
		$itemsCount = crudShoppingCart::getItemsCount($uid);
		$total = 0;
		product::calculateNewPrice($items);
		foreach($items as $item)
			$total += $item->getNewPrice()*$item->getCartQt();
	}
?>

							<button type="button" data-toggle="dropdown" class="btn dropdown-toggle text-uppercase">
								<i class="fa fa-shopping-cart"></i>
								<span id="cart-total"><?php echo $itemsCount;?> article(s)</span>
								<i class="fa fa-caret-down"></i>
							</button>
                            <ul class="dropdown-menu pull-right" style="width: 320px">
							<?php if (!empty($items) and isset($_SESSION['user_id'])): ?>
                                <li>
                                    <table class="table hcart">
									<?php foreach($items as $product): ?>
                                        <tr>
                                            <td class="text-center">
                                                <a href="product.html">
                                                    <img src="images/product-images/<?php echo $product->getImage();?>" alt="image" title="image" class="img-thumbnail img-responsive" style="height: 64px; width: 64px;" />
                                                </a>
                                            </td>
                                            <td class="text-left">
                                                <a href="product-full.html">
													<?php echo $product->getName(); ?>
												</a>
                                            </td>
                                            <td class="text-right"><?php echo 'x'.$product->getCartQt(); ?></td>
                                            <td class="text-center" colspan="2"><?php echo ($product->getNewPrice() > 0) ? number_format($product->getNewPrice(), 2, ',', ' ') . ' DT' : number_format($product->getPrice(), 3, ',', ' ') . ' DT'; ?></td>
                                            <td class="text-center">
                                                <button style=" background-color: Transparent;
																background-repeat:no-repeat;
																border: none;
																cursor:pointer;
																overflow: hidden;
																outline:none;" onClick="remove_from_cart(<?php echo $product->getId(); ?>)">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </td>
                                        </tr>
									<?php endforeach; ?>
                                    </table>
                                </li>
                                <li>
                                    <table class="table table-bordered total">
                                        <tbody>
                                            <tr>
                                                <td class="text-right"><strong>Total</strong></td>
                                                <td class="text-left"><?php echo number_format($total, 3, ',', ' ') . ' DT'; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <p class="text-right btn-block1">
                                        <a href="?controller=order&action=cart">
											Panier
										</a>
                                    </p>
                                </li>
							<?php else: ?>
								<li>
									<p>Votre panier est vide.</p>
								</li>
							
							<?php endif; ?>
                            </ul>
								