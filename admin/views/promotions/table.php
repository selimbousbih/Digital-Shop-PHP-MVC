<div class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card" id="mydiv">
                                        <!-- Categories -->
                                        <div>
                                            <div class="cat_select">
												<br><button type="button" class="btn btn-info btn-fill pull-left" id="addMe">Add Promotion</button><br>                       
                                            </div><br>
												
                                                    <div class="content table-responsive table-full-width">
                                                        <table class="table table-hover table-striped">
                                                            <thead>
                                                                <th>ID</th>
                                                                <th>Description</th>
																<th>Discount</th>
                                                                <th>Edit</th>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                    foreach($promotions as $promo){
                                                                ?>
                                                                    <tr>
                                                                        <td>
                                                                            <?php echo $promo->getId(); ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $promo->getDescription(); ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $promo->getPercent(); ?>
                                                                        </td>
                                                                        <td>
                                                                        <span class="editMe" name="<?php echo $promo->getId(); ?>"><i class="pe-7s-config"></i></span>&nbsp;&nbsp;
                                                                        <span class="deleteMe" name="<?php echo $promo->getId(); ?>"><i class="pe-7s-trash"></i></span>
                                                                        </td>
                                                                    </tr>
                                                                    <?php }  ?>
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
                    $.get("views/promotions/promotion-edit.php?action=edit&id=" + $(this).attr('name'), function (data) {
                        $("#testing").html(data);
                    });                    
                   showHiddener();
                });
                $('span.deleteMe').click(function(e) {
                    $.get("views/promotions/promotion-edit.php?action=delete&id=" + $(this).attr('name'), function (data) {
                        $("#testing").html(data);
                    });                    
                   showHiddener();
                });
                $('#addMe').click(function(e) {
                    $.get("views/promotions/promotion-add.php", function (data) {
                        $("#testing").html(data);
                    });                    
                   showHiddener();
                });
            });

        });

</script>