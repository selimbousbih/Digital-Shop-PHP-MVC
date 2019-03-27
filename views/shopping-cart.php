							<button type="button" data-toggle="dropdown" class="btn dropdown-toggle text-uppercase">
								<i class="fa fa-shopping-cart"></i>
								<span id="cart-total"><?php echo $itemsCount;?> article(s)</span>
								<i class="fa fa-caret-down"></i>
							</button>
                            <ul class="dropdown-menu pull-right" style="width: 320px">
							<?php if (!empty($items) and isset($_SESSION['user_id'])): ?>
                                <li>
                                    <table class="table hcart">
									<?php foreach($items as $item): ?>
                                        <tr>
                                            <td class="text-center">
                                                <a href="product.html">
                                                    <img src="images/product-images/<?php echo $item->getImage();?>" alt="image" title="image" class="img-thumbnail img-responsive" style="height: 64px; width: 64px;" />
                                                </a>
                                            </td>
                                            <td class="text-left">
                                                <a href="product-full.html">
													<?php echo $item->getName(); ?>
												</a>
                                            </td>
                                            <td class="text-right"><?php echo 'x'.$item->getCartQt(); ?></td>
                                            <td class="text-center" colspan="2"><?php echo ($item->getNewPrice() > 0) ? number_format($item->getNewPrice(), 2, ',', ' ') . ' DT' : number_format($item->getPrice(), 3, ',', ' ') . ' DT'; ?></td>
                                            <td class="text-center">
                                                <button style=" background-color: Transparent;
																background-repeat:no-repeat;
																border: none;
																cursor:pointer;
																overflow: hidden;
																outline:none;" onClick="remove_from_cart(<?php echo $item->getId(); ?>)">
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
