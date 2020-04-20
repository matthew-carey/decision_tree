<?php
require("config.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php echo $common_meta; ?>
    <meta name="description" content="<?php echo $s_description; ?>">
    <meta name="author" content="<?php echo $s_author; ?>">
    <title><?php echo $t_title; ?></title>
    <?php echo $common_css; ?>
    <link rel="stylesheet" href="main.css" />
    <?php if( isset($common_js) ){ echo $common_js; } ?>
    <!-- GA -->
    <?php echo $googleAnalytics; ?>
  </head>
  <body>
    <!-- HEADER -->
    <?php include($s_pathHeader); ?>
    <br />
    <!-- MAIN -->
    <main role="main">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-10 col-md-10 offset-md-1 offset-lg-1">
            <!-- CONTENT -->
            <h2 id="sectionTitle"><?php echo $t_title; ?></h2>
            <?php if( isset($t_intro) && $t_intro!=="" ){ echo "<p id=\"sectionIntro\">$t_intro</p>"; } ?>
            <div class="card" id="contentCard">
              <div class="card-body" id="cardBody">
                <div class="spinner" id="loadingArea">
                  <div class="bounce1"></div>
                  <div class="bounce2"></div>
                  <div class="bounce3"></div>
                </div>
                <div id="contentArea"></div>
              </div>
              <div class="card-footer text-muted" id="cardFooter"></div>
            </div>
          </div><!-- end col -->
        </div><!-- end row -->
      </div><!-- end container -->
    </main>
    <!-- FOOTER -->
    <?php include($s_pathFooter); ?>
  </body>
</html>
