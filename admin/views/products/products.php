                    <div class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card" id="mydiv">
                                        <!-- Categories -->
                                        <div>
                                            <div id="">
                                                <form id="cat-submit" action="" method="post">
                                                    <select id="myselect" name="category" class="cat_select" onChange="document.getElementById('cat-submit').submit();">
														<option value="all">All</option>
														<?php foreach($main_categories as $main_category){ ?>
														<optgroup label="-- <?php echo $main_category->getDisplayName();?> --">
														<?php
														$categories = crudCategory::selectSubCategories($main_category->getName());
														foreach($categories as $sub_category){ 															 
																$value = $sub_category->getName();
																$name = $sub_category->getDisplayName();
															echo '<option ' . ($category==$value ? "selected " : "") . 'value="' . $value .'">' . $name . ' </option>';
														} 
													}
													?>
                                                    </select>
													
                                                    <button type="button" id="addMe" class="c_btn">Ajouter un produit</button>
                                                    
                                                    <!--<span class="search" id="mysearch"><input type="text" placeholder="Chercher Produit"> <button class="c_btn">Chercher</button></span> -->
													
													<span class="btn btn-primary" style="margin-left: 60px"><a href="includes\products-inc\excel.php">Exporter</a></button></span> 
													
                                                </form>
                                                <br></div>												
                                                    <div class="content table-responsive table-full-width" style="margin-left: 10px; margin-right: 10px;">
                                                        <table id="dynamic" class="table table-hover table-striped">
                                                            <thead>
                                                                <th>ID</th>
                                                                <th>Nom</th>
                                                                <th>Description</th>
                                                                <th>Image</th>
                                                                <th>Prix</th>
																<th>Promo</th>
                                                                <th>Stock</th>
                                                                <th>Edit</th>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                    foreach($products as $product):
                                                                ?>
                                                                    <tr>
                                                                        <td>
                                                                            <?php echo $product->getId(); ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $product->getName(); ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo (strlen($product->getDescription()) < 10 ? $product->getDescription() : substr($product->getDescription(), 0, 10) . "...") ;?> 
                                                                        </td>
                                                                        <td><a href="<?php echo $img_dir . $product->getImage(); ?>">Click</a></td>
                                                                        <td><?php echo $product->getPrice(); ?></td>
                                                                        <td><?php echo ($product->getPromo() == null) ? "Aucune" : $product->getPromo(); ?></td>
                                                                        <td><?php echo $product->getStock(); ?></td>
                                                                        <td>
                                                                        <span class="editMe" name="<?php echo $product->getId(); ?>"><i class="pe-7s-config"></i></span>&nbsp;&nbsp;
                                                                        <span class="deleteMe" name="<?php echo $product->getId(); ?>"><i class="pe-7s-trash"></i></span>
                                                                        </td>
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
                    $.get("views/products/products-edit.php?action=edit&id=" + $(this).attr('name'), function (data) {
                        $("#testing").html(data);
                    });                    
                   showHiddener();
                });
                $('span.deleteMe').click(function(e) {
                    $.get("views/products/products-edit.php?action=delete&id=" + $(this).attr('name'), function (data) {
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
        
        
         <script>
      var file = undefined;
! function(e) {
    var t = function(t, n) {
        this.$element = e(t), this.type = this.$element.data("uploadtype") || (this.$element.find(".thumbnail").length > 0 ? "image" : "file"), this.$input = this.$element.find(":file");
        if (this.$input.length === 0) return;
        this.name = this.$input.attr("name") || n.name, this.$hidden = this.$element.find('input[type=hidden][name="' + this.name + '"]'), this.$hidden.length === 0 && (this.$hidden = e('<input type="hidden" />'), this.$element.prepend(this.$hidden)), this.$preview = this.$element.find(".fileupload-preview");
        var r = this.$preview.css("height");
        this.$preview.css("display") != "inline" && r != "0px" && r != "none" && this.$preview.css("line-height", r), this.original = {
            exists: this.$element.hasClass("fileupload-exists"),
            preview: this.$preview.html(),
            hiddenVal: this.$hidden.val()
        }, this.$remove = this.$element.find('[data-dismiss="fileupload"]'), this.$element.find('[data-trigger="fileupload"]').on("click.fileupload", e.proxy(this.trigger, this)), this.listen()
    };
    t.prototype = {
        listen: function() {
            this.$input.on("change.fileupload", e.proxy(this.change, this)), e(this.$input[0].form).on("reset.fileupload", e.proxy(this.reset, this)), this.$remove && this.$remove.on("click.fileupload", e.proxy(this.clear, this))
        },
        change: function(e, t) {
            if (t === "clear") return;
            var n = e.target.files !== undefined ? e.target.files[0] : e.target.value ? {
                name: e.target.value.replace(/^.+\\/, ""),
                size: e.target.value.size,
            } : null;
            if (!n) {
                this.clear();
                return
            }
            this.$hidden.val(""), 
            this.$hidden.attr("name", ""), 
            this.$input.attr("name", this.name);
            if (typeof FileReader != "undefined") {
                var r = new FileReader,
                    i = this.$preview,
                    s = this.$element;
                r.onload = function(e) {
                    var result = {
                        name: n.name,
                        data: e.target.result,
                        size: n.size,
                    }
                    i.text(result.name), s.addClass("fileupload-exists").removeClass("fileupload-new")
                }, r.readAsDataURL(n)
            } else this.$preview.text(n.name), this.$element.addClass("fileupload-exists").removeClass("fileupload-new")
        },
        clear: function(e) {
            this.$hidden.val(""), this.$hidden.attr("name", this.name), this.$input.attr("name", "");
            if (navigator.userAgent.match(/msie/i)) {
                var t = this.$input.clone(!0);
                this.$input.after(t), this.$input.remove(), this.$input = t
            } else this.$input.val("");
            this.$preview.html(""), this.$element.addClass("fileupload-new").removeClass("fileupload-exists"), e && (this.$input.trigger("change", ["clear"]), e.preventDefault())
            file = undefined;
        },
        reset: function(e) {
            this.clear(), this.$hidden.val(this.original.hiddenVal), this.$preview.html(this.original.preview), this.original.exists ? this.$element.addClass("fileupload-exists").removeClass("fileupload-new") : this.$element.addClass("fileupload-new").removeClass("fileupload-exists")
        },
        trigger: function(e) {
            this.$input.trigger("click"), e.preventDefault()
        }
    }, e.fn.fileupload = function(n) {
        return this.each(function() {
            var r = e(this),
                i = r.data("fileupload");
            i || r.data("fileupload", i = new t(this, n)), typeof n == "string" && i[n]()
        })
    }, e.fn.fileupload.Constructor = t, e(document).on("click.fileupload.data-api", '[data-provides="fileupload"]', function(t) {
        var n = e(this);
        if (n.data("fileupload")) return;
        n.fileupload(n.data());
        var r = e(t.target).closest('[data-dismiss="fileupload"],[data-trigger="fileupload"]');
        r.length > 0 && (r.trigger("click.fileupload"), t.preventDefault())
    })
}(window.jQuery)
  </script>

  
