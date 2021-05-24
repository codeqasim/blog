<?php echo $this->render_table_name(); ?>

<div class="xcrud-rightside">
<?php
echo $this->csv_button('xcrud-button xcrud-purple','icon-file');
echo $this->print_button('xcrud-button xcrud-pink','icon-print');
echo $this->add_button('xcrud-button xcrud-green','icon-plus');
?>
</div>

<div class="xcrud-list-container">
<table class="xcrud-list table table-striped table-hover table-bordered">
<thead>
<?php echo $this->render_grid_head('tr', 'th'); ?>
</thead>
<tbody>
<?php echo $this->render_grid_body('tr', 'td'); ?>
</tbody>
<tfoot>
<?php echo $this->render_grid_footer('tr', 'td'); ?>
</tfoot>
</table>
</div>

<div class="xcrud-nav">
<span class="xcrud-search"><?php echo $this->render_search(); ?></span>
<div class="xcrud-rightside">
<?php echo $this->render_benchmark(); ?>
<?php echo $this->render_limitlist(true); ?>
<?php echo $this->render_pagination(); ?>
</div>
</div>