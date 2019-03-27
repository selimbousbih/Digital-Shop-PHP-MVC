                    <div class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card" id="mydiv">
                                        <div class="header">
											<h4 class="title">Liste des Commandes</h4> </div>
                                        <div>                                          												
											<div class="content table-responsive table-full-width" style="margin-left: 10px; margin-right: 10px;">
												<table id="dynamic" class="table table-hover table-striped">
													 <thead>
														<th>Id</th>
														<th>Nom d'utilisateur</th>
														<th>Méthode</th>
														<th>Statut</th>
														<th>Date</th>
														<th>Détail</th>
													</thead>
													<tbody>
													<?php 
														foreach ($orders as $order): 
														$client = crudMember::selectMember($order->getClientId());
														//$bill = crudBill::selectBill($order->getBill());
													?>
													<tr>
														<td>
															<?php echo $order->getId(); ?>
														</td>
														<td>
															<?php echo $client->getUsername(); ?>
														</td>
														<td>
															<?php 
															$method = $order->getMethod();
															switch($method){
																case 'method1':
																	echo 'Virement Banquaire';
																	break;
																case 'method2':
																	echo 'Versement espèce';
																	break;
																case 'method3':
																	echo 'Chèque Bancaire';
																	break;
															} 
															?>
														</td>
														<td>
															<a href="?controller=commands&action=show&order_id=<?php echo $order->getId();?>&setStatus=<?php echo ($order->getStatus()==0) ? 1 : 0 ;?>"><?php echo ($order->getStatus()==0) ? "Non Payé" : "Payé"; ?></a>
														</td>
														<td>
															<?php echo $order->getDate(); ?>
														</td>
														<td><span class="editMe" name="<?php echo $order->getBill(); ?>"><i class="pe-7s-note2"></i></span></td>
													</tr>
													<?php endforeach;?>
													</tbody>
												</table>
											</div>
                                        </div>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                    <section class="hiddener">
                    <article class="popup">
                    <span class="close"><i class="pe-7s-close-circle"></i></span>
                    <div class="edit_delivery_form" id="testing">
                        
                     </div>
                    </article>
                    </section>
                                                        
    <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
  
                 
				                 
    <script>
            function showHiddener(){
                 var hiddenSection = $('section.hiddener');
                    hiddenSection.fadeIn()
                        .css({
                            'display': 'block'
                        })

                        .css({
                            width: $(window).width() + 'px',
                            height: $(window).height() + 'px'
               
						})
                        .css({
                            top: ($(window).height() - hiddenSection.height()) / 2 + 'px',
                            left: ($(window).width() - hiddenSection.width()) / 2 + 'px'
                        })
                    
                        .css({
                            'background-color': 'rgba(0,0,0,0.5)'
                        })
                        .appendTo('wrapper');
                    
                    $('span.close').click(function() {
                        $(hiddenSection).fadeOut();
                    });								
            }
        
            $(document).ready(function() {
            
            $(function() {
                $('span.editMe').click(function(e) {
                    $.get("views/commands/details.php?cid=" + $(this).attr('name'), function (data) {
                        $("#testing").html(data);
                    });                    
                   showHiddener();
                });
                $('span.deleteMe').click(function(e) {
                    $.get("views/payment/payments-edit.php?action=delete&id=" + $(this).attr('name'), function (data) {
                        $("#testing").html(data);
                    });                    
                   showHiddener();
                });
                $('#addMe').click(function(e) {
                    $.get("views/products/products-add.php", function (data) {
                        $("#testing").html(data);
                    });                    
                   showHiddener();
                });
            });

        });

</script>



  
