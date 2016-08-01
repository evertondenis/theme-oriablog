            <footer>
                <div class="container">
                	<div class="col-md-4">
                		<?php
                		if(is_active_sidebar('footer-sidebar-1')){
                			dynamic_sidebar('footer-sidebar-1');
                		}
                		?>
                	</div>
                	<div class="col-md-4">
                		<?php
                		if(is_active_sidebar('footer-sidebar-2')){
                			dynamic_sidebar('footer-sidebar-2');
                		}
                		?>
                	</div>
                	<div class="col-md-4">
                		<?php
                		if(is_active_sidebar('footer-sidebar-3')){
                			dynamic_sidebar('footer-sidebar-3');
                		}
                		?>
                	</div>
                </div>
                <div class="address">
            		<?php
            		if(is_active_sidebar('footer-sidebar-4')){
            			dynamic_sidebar('footer-sidebar-4');
            		}
            		?>
            	</div>
            </footer>

        <?php wp_footer(); ?>
    </body>
</html>