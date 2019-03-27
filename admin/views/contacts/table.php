                    <div class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card" id="mydiv">
                                        <!-- Categories -->
                                        <div>                                          												
											<div class="content table-responsive table-full-width" style="margin-left: 10px; margin-right: 10px;">
												<table id="dynamic" class="table table-hover table-striped">
													<thead>
														<th>ID</th>
														<th>Nom</th>
														<th>Email</th>
														<th>Sujet</th>
														<th>Message</th>
													</thead>
													<tbody>
														<?php
															foreach($contacts as $contact):
														?>
															<tr>
																<td><?php echo $contact->getId(); ?></td>
																<td><?php echo $contact->getName(); ?></td>																
																<td><?php echo $contact->getEmail(); ?></td>
																<td><?php echo $contact->getSubject(); ?></td>
																<td><span class="editMe" name="<?php echo $contact->getId(); ?>"><i class="pe-7s-note2"></i></span></td>
															</tr>
													   <?php endforeach;  ?>
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
                    $.get("views/contacts/show.php?id=" + $(this).attr('name'), function (data) {
                        $("#testing").html(data);
                    });                    
                   showHiddener();
                });
            });

        });

</script>
        
  
  
