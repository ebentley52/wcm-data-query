<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "//www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="//www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="Expires" content="-1" />
    <meta name="DC.title" content="NOAA/NWS Storm Prediction Center" />
    <meta name="DC.language" scheme="DCTERMS.RFC1766" content="EN-US" />
    <meta name="language" content="EN-US" />
    <link rel="alternate" type="application/rss+xml" title="SPC Forecast Products RSS" href="/products/spcrss.xml" />
    <link rel="alternate" type="application/rss+xml" title="SPC Tornado/Severe Thunderstorm Watches RSS" href="/products/spcwwrss.xml" />
    <link rel="alternate" type="application/rss+xml" title="SPC Mesoscale Discussions RSS" href="/products/spcmdrss.xml" />
    <link rel="alternate" type="application/rss+xml" title="SPC Convective Outlooks RSS" href="/products/spcacrss.xml" />
    <link rel="alternate" type="application/rss+xml" title="SPC Thunderstorm Outlooks RSS" href="/products/spctstmrss.xml" />
    <link rel="alternate" type="application/rss+xml" title="SPC Fire Weather Outlooks RSS" href="/products/spcfwrss.xml" />
    <link rel="alternate" type="application/rss+xml" title="SPC PDS Watches RSS" href="/products/spcpdswwrss.xml" />
    <link rel="alternate" type="application/rss+xml" title="SPC Multimedia Briefings RSS" href="/products/spcmbrss.xml" />

    <title>NOAA/NWS Storm Prediction Center</title>

    <!-- Sitewide css -->
    <link rel="stylesheet" href="/new/css/SPCmain.css" />

    <!--Conflict between prototype.js and jquery, so using jQuery.noConflict() -->

    <!--Use google lib for prototype.js which is used by tabber for product alerts -->
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/prototype/1.7.1.0/prototype.js"></script>
    <!--Use google lib for jquery -->
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <!--SPCindex.js is used to update page content -->
    <script type="text/javascript" src="/new/js/SPCindex-shutdown.js"></script>
    <!--usno_gmttime.js used to run UTC clock at the top of the page -->
    <script type="text/javascript" src="/misc/usno_gmttime.js"></script>
    <!--lastMod.js used for page update time in the footer -->
    <script type="text/javascript" src="/misc/lastMod.js"></script>
    <!--hoverIntent.minified.js used for main menu functionality -->    
    <script type="text/javascript" src="/new/js/jquery.hoverIntent.minified.js"></script>
    <!--flot.js and flot.time.min.js used for plotting severe reports -->
    <script language="javascript" type="text/javascript" src="/new/js/jquery.flot.js"></script>
    <script language="javascript" type="text/javascript" src="/new/js/jquery.flot.time.min.js"></script>
    <!--jquery.cycle.all.js used to cycle through forecast tools in PanelContent -->
    <script language="javascript" type="text/javascript" src="/new/js/jquery.cycle.all.js"></script>	

    <!--The following funtion is used for the main menu functionality -->
    <script type="text/javascript">
function MM_jumpMenu(targ,selObj,restore)
{
        //v3.0
        eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
        if (restore) selObj.selectedIndex=0;
}
</script>

<script type="text/javascript" src="/new/js/topNavMenu.js"></script>

</head>

<body>

<div id="SPCWrapper">
   <div id="SPCMain">
      <div class="SPCMain2">
         <!-- ##### SPC TOP MENU ##### -->
         <?php include($_SERVER['DOCUMENT_ROOT']."/new/MainMenu/topMenu.html"); ?>

         <!-- ##### WEATHER HEADLINES ##### -->
             <?php include($_SERVER['DOCUMENT_ROOT']."/new/SPCWeatherHeadlines/shutdown.html"); ?>
             <?php include($_SERVER['DOCUMENT_ROOT']."/new/SPCWeatherHeadlines/headlines.html"); ?>
         
            <div class="LeftCol" > <!-- Left-side 585px wide column -->

            <!-- ##### SPC QUICK VIEW ( IMAGE DISPLAY ) ##### -->
           <div id="quickViewContainer">
	     <?php include($_SERVER['DOCUMENT_ROOT']."/new/SPCQuickView/quickView.html"); ?>
	   </div>
            <!-- ##### SPC OUTLOOK MATRIX ##### -->
	   <div id="matrixContainer">
            <?php include($_SERVER['DOCUMENT_ROOT']."/new/Matrix/mx.php"); ?>
	   </div>
            <br />


         <div> <!-- LeftCol -->
      </div> <!-- SPCMain2 -->
   </div> <!-- SPCMain -->

   <!-- ##### SPC PRODUCT ALERTS ##### -->
   <div class="RightCol">
      <div class="content_container_prods">

<!-- Tabbed content below -->      
<script type="text/javascript">

document.write('<style type="text/css">.tabber{display:none;}<\/style>');

var tabberOptions = { 

  'onClick': function(argsObj) {

    var t = argsObj.tabber; /* Tabber object */
    var i = argsObj.index; /* Which tab was clicked (0..n) */
    var div = this.tabs[i].div; /* The tab content div */

    /* Display a loading message */
    div.innerHTML = "<p>Loading...<\/p>";

    /* Fetch some html depending on which tab was clicked */
    var url = '/new/SPCProducts/validProducts.php?content=' +i;
    var pars = 'foo=bar&foo2=bar2'; /* just for example */
    var myAjax = new Ajax.Updater(div, url, {method:'get',parameters:pars});
  },

  'onLoad': function(argsObj) {
    /* Load the first tab */
    argsObj.index = 0;
    this.onClick(argsObj);
  }

}
</script>



<script type="text/javascript" src="/new/js/tabber.js"></script>

<!-- This stylesheet and DIV below are needed for the AJAX call -->
<div id="prodCSS">
<style>

ul.tabbernav li a#prodsnav2 {
   padding: 3px 0.5em;
   margin-left: 3px;
   border: 1px solid #778;
   border-bottom: none;
   color: #387200;
   background: #d2ffa6;
   text-decoration: none;
}

ul.tabbernav li a#prodsnav2:hover {
   background: #84fe0c;
}

@-moz-keyframes ul.tabbernav li a#prodsnav2 {
   from {background: red; }
   to {background: yellow; }
}

ul.tabbernav li a#prodsnav3 {
   padding: 3px 0.5em;
   margin-left: 3px;
   border: 1px solid #778;
   border-bottom: none;
   color: #387200;
   background: #d2ffa6;
   text-decoration: none;
}

ul.tabbernav li a#prodsnav3:hover {
   background: #84fe0c;
}
</style>
</div>

<div class="tabber" id="prods">

     <div class="tabbertab">
          <h2>All Products</h2>
     </div>

     <div class="tabbertab">
          <h2>Watches</h2>
     </div>

     <div class="tabbertab">
          <h2>MDs</h2>
     </div>

     <div class="tabbertab">
          <h2>Outlooks</h2>
     </div>

     <div class="tabbertab">
          <h2>Fire</h2>
     </div>

</div>

<!-- end tabs -->
	
      </div> <!-- close Right Column -->
   </div> <!-- close container -->

<!-- ##### 8 or 6-panel content ##### -->
<div class="feature_container">
<div id="contentCheck">
  <?php include($_SERVER['DOCUMENT_ROOT']."/new/PanelContent/panelContent.php"); ?>
</div>
</div><!-- SPCMain -->

<!-- ##### Social Media content ##### -->
<div class="feature_container">
<div>
  <?php include($_SERVER['DOCUMENT_ROOT']."/new/PanelContent/panelContentSM.php"); ?>
</div>
</div><!-- Social Media content -->


   <!-- ##### FOOTER ACROSS BOTTOM OF PAGE ##### -->
   <div class="footer_container">
      <div id="footer">
        <?php include($_SERVER['DOCUMENT_ROOT']."/new/footer/footer1.html"); ?>

	<?php
	 $filename = $_SERVER['DOCUMENT_ROOT'].'/new/SPCWeatherHeadlines/headlines.html';
	 if (file_exists($filename)) {
    	  echo "Page last modified: " . date ("F d Y H:i T", filemtime($filename));
	 }
	?>

        <?php include($_SERVER['DOCUMENT_ROOT']."/new/footer/footer2.html"); ?>
</div>
   </div>

<div class="clear"> </div> <!-- Sets background to white -->

 </div>
<script type="text/javascript">
   var $j = jQuery.noConflict();
   show_tab("TABoverview");
   $j("#query-field").blur();
</script>
<script id="_fed_an_js_tag" type="text/javascript" src="/misc/GA/Federated-Analytics.js?agency=DOC&sub­agency=NOAA&pua=UA-52727918-1"></script>
</body>
</html>

