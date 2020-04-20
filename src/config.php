<?php
/* 
All of these items would need to be customized to your environment
I've included dummy values here just for example
*/

date_default_timezone_set('UTC');

// Strings
$s_host = $_SERVER["HTTP_HOST"];
$s_folder = "decision_tree";
$s_filename = "index.php";
$s_url = "http://$s_host/$s_folder/$s_filename";
$s_sslUrl = "https://$s_host/$s_folder/$s_filename";
$s_author = "Matt Carey";
$s_description = "";
$s_companyName = "Example Co.";
$s_formAction = "https://$s_host/path_to_your/form_processor.php";
$s_pathHeader = "../common/incl/header.php";
$s_pathFooter = "../common/incl/footer.php";
$s_subject = "";

$companyMainID = '01'; // Unique identifier to the token validation if applicable
$googleAnalytics="<script>(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)})(window,document,'script','//www.google-analytics.com/analytics.js','ga'); ga('create', '<Your GA Code>', 'auto', {allowLinker: true});ga('require', 'linker');ga('linker:autoLink', ['old_yet_still_accessible_domain.com', 'new_domain.com']);ga('send', 'pageview');</script>";

/*
// booleans
$isThankYou = false;
$thankyouQueryString = false;

// determine if 'thank-you' screen or not
$thisURL =  "//{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
$myQuery = parse_url($thisURL, PHP_URL_QUERY);
$thanksPosition = strrpos($myQuery, "thankyou");
if($thanksPosition !== false){
  $thankyouQueryString = true;
}

if( isset($_GET['thankyou']) || $thankyouQueryString){
  $isThankYou = true;
}
*/

// Links
$u_logoHeader = "https://www.github.com/";
$u_legal = "https://www.google.com";

// Images
$i_logoHeader = "../common/img/svg/logo1.svg";
$i_logoFooter = "../common/img/svg/logo2.svg";
$i_loading = "../common/img/loading.gif";

// Text
$t_title = "Decision Tree";
$t_intro = "";
$t_jsWarning = "Javascript must be enabled to use this form.";
$t_legalPrivacy = "Legal &amp; Privacy";
//$t_thanks = "Thank you";

// <meta> in <head>
$common_meta = "<meta charset=\"utf-8\">\n<meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">\n<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">\n";
$common_meta .= "<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->\n";
// CSS in <head>
$common_css = "<!-- CSS -->\n";
$common_css .= "<link rel=\"stylesheet\" href=\"https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css\" integrity=\"sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T\" crossorigin=\"anonymous\">\n";
$common_css .= "<link rel=\"stylesheet\" href=\"https://fonts.googleapis.com/css?family=Open+Sans|Roboto:100,300,400,700\">\n";
//$common_css .= "<link rel=\"stylesheet\" href=\"https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css\">\n";
$common_css .= "<link rel=\"stylesheet\" href=\"../common/css/common_styles.css\" />\n";
// JS in <head> - I'm not using any jQuery in this project for Bootstrap-related items
/*
$common_js = "<!-- JavaScript -->\n";
$common_js .= "<script src=\"https://code.jquery.com/jquery-3.3.1.slim.min.js\" integrity=\"sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo\" crossorigin=\"anonymous\"></script>\n";
$common_js .= "<script src=\"https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js\" integrity=\"sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1\" crossorigin=\"anonymous\"></script>\n";
$common_js .= "<script src=\"https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js\" integrity=\"sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM\" crossorigin=\"anonymous\"></script>\n";
*/
?>