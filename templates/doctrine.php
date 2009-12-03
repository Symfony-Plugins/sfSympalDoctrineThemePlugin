<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
 "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
  <?php $ui = get_sympal_ui() ?>
  <?php $editor = get_sympal_editor() ?>
  <?php include_http_metas() ?>
  <?php include_metas() ?>
  <?php include_title() ?>
  <?php include_stylesheets() ?>
  <?php include_javascripts() ?>
</head>

<body class="yui-skin-sam">

  <?php echo $ui ?>

  <div id="wrapper">
    <div id="header">
      <h1 id="title"><?php echo $sf_response->getTitle() ?></h1>

    	<div id="logo">
    		<?php echo link_to('Sympal', '@homepage'); ?>
    	</div>
    </div>

    <div id="nav" class="cls">
    	<div class="tl cls">
    	  <?php $menus = get_sympal_split_menus('primary', false, 10, true) ?>
        <?php echo $menus['primary'] ?>

        <?php $menus['secondary']->callRecursively('showChildren', true) ?>
        <?php if ($secondary = (string) $menus['secondary']): ?>
          <?php slot('sympal_right_sidebar', $secondary.get_slot('sympal_right_sidebar')) ?>
        <?php endif; ?>
    	</div>
    </div>

    <?php if ($subMenu = (string) get_sympal_menu(sfSympalToolkit::getCurrentMenuItem(), true)): ?>
      <div id="sub_menu">
        <?php echo $subMenu ?>
      </div>
    <?php endif; ?>

    <?php if (has_slot('top2')): ?>
      <div id="top2">
        <div class="content">
          <?php echo get_slot('top2') ?>
        </div>
      </div>
    <?php endif; ?>

    <div id="content" class="cls">
      <?php if (has_slot('sympal_right_sidebar')): ?>
        <?php $sf_response->addStylesheet('/sfSympalDoctrineThemePlugin/css/doctrine_right_sidebar', 'last'); ?>
      	<div id="sidebar">
          <div class="cls">
          	<div class="bd cls">
              <?php echo get_slot('sympal_right_sidebar') ?>
          	</div>
          	<div class="ft"><!-- foot --></div>
          </div>
      	</div>
      <?php endif; ?>

      <div id="main-content">
        <?php echo get_sympal_flash() ?>
    	  <?php echo $sf_content ?>
    	</div>
    </div>

  	<div id="bot-rcnr">
  		<div class="tl"><!-- corner --></div>
  	</div>

    <div id="footer">
      <p>Sympal Doctrine Theme. Powered by Symfony, Sympal and Doctrine.</p>
    </div>
  </div>

  <?php echo $editor ?>

</body>
</html>