
<div id="innerWrapper"> 
  <div id="header">
        <a href="<?php print $front_page;?>" title="<?php print t('Home');?>">
      <img src="<?php print $base_path?>/<?php print $directory;?>/images/logo.png" alt="<?php print $site_name;?>" height="47" width="217" />
       <?php print render($page['header_top']); ?>
    </a>


  </div>

     <?php if ($main_menu): ?>
        <div id="main-menu" class="navigation">
            <?php print theme('links__system_main_menu', array
              (
                 'links' => $main_menu,
                 'attributes' => array
                       (
                            'id' => 'main-menu-links',
                            'class' => array('links', 'clearfix' ),

                        ),
                 'heading' => array
                       (
                   'text' => t('Main menu'),
                   'level' => 'h2',
                   'class' => array('element-invisible'),
                       ),
             )




             ); ?>
      </div> <!-- /#main-menu -->
    <?php endif; ?>

    <?php if ($secondary_menu): ?>
      <div id="secondary-menu" class="navigation">
        <?php print theme('links__system_secondary_menu', array(
          'links' => $secondary_menu,
          'attributes' => array(
            'id' => 'secondary-menu-links',
            'class' => array('links', 'inline', 'clearfix'),
          ),
          'heading' => array(
            'text' => t('Secondary menu'),
            'level' => 'h2',
            'class' => array('element-invisible'),
          ),
        )); ?>
      </div>
<?php endif; ?>

<div id = "bgOverlay">

  
    <?php print render($title_prefix); ?>
      <?php if ($title): ?><h1><?php print $title; ?></h1><?php endif; ?>
    <?php print render($title_suffix); ?>

    <?php if($messages): ?><ul class="new_class_msg"><?php print render($messages); ?></ul><?php endif; ?>
    <?php if ($tabs): ?><div class="tabs"><?php print render($tabs); ?></div><?php endif; ?>
    <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>

    <?php print render($page['content']); ?>
     <?php print render($page['slideshow']); ?>
  

<!-- new code will begin here -->


 <?php if ($page['sidebar_first']): ?>
                <div id="sidebar-first" class="column sidebar"><div class="section">
                  <?php print render($page['sidebar_first']); ?>
               </div>
           <?php endif; ?>
<?php if ($page['sidebar_second']): ?>
                <div id="sidebar-second" class=" sidebar"><div class="section">
                    <?php print render($page['sidebar_second']); ?>
                </div>
<?php endif; ?>




<!-- new code will end here -->

</div>


  <div id="footer-wrapper"><div class="section">

   
    <?php if ($page['footer']): ?>


      <div id="footer" class="clearfix">
        <?php print render($page['footer']); ?>
      </div> <!-- /#footer -->
    <?php endif; ?>

  </div></div> <!-- /.section, /#footer-wrapper -->


</div>
<!-- i dont want sidebar in wrspper because of width issue -->


