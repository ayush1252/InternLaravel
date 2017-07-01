<!doctype html>
<html lang="en-US">
<head>
  <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
  <title>Input Autocomplete Suggestions Demo</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <link rel="shortcut icon" href="http://designshack.net/favicon.ico">
  <link rel="icon" href="http://designshack.net/favicon.ico">
  <link rel="stylesheet" type="text/css" media="all" href="css/style.css">
  <link rel="stylesheet" type="text/css" media="all" href="css/searchbox.css">
  <link rel="stylesheet" type="text/css" media="all" href="css/resultcard.css">
  <script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
  <script type="text/javascript" src="js/underscore-min.js"></script>
  <script type="text/javascript" src="js/searchsuggest.js"></script>
    <script src="js/handlebars.js"></script>
    <script src="js/main.js"></script>
    <script src="js/jquery-1.10.2.min.js"></script>
    <script src="js/jquery.xdomainrequest.min.js"></script>
    <script src="js/bootstrap-typeahead.js" type="text/javascript"></script>
  <script type="text/javascript" src="js/jquery.autocomplete.min.js"></script>
  <script type="text/javascript" src="js/currency-autocomplete.js"></script>
</head>
<body>
<section class="main">
<form class="search" id="menu" action="">
        <input class ="typeahead" type="search" id ="searchit" autocomplete="off" placeholder="search.." />
        <ul class="results" id="searchlist">
    </form>
</section>

<script id="result-template" type="text/x-handlebars-template">
              <div class="ProfileCard u-cf">
              <img class="ProfileCard-avatar" src="http://cdn1.droom.in@{{photos}}">

              <div class="ProfileCard-details">
                 <div class="ProfileCard-realName">@{{product_title}}</div>
              </div>
              <div class="ProfileCard-stats">
                  <div class="ProfileCard-stat"><span class="ProfileCard-stat-label">Fuel Type:</span>@{{fuel_type}}</div>
              </div>
              <div class="ProfileCard-stats">
                <div class="ProfileCard-stat"><span class="ProfileCard-stat-label">Location:</span> @{{location}}</div>
                <div class="ProfileCard-stat"><span class="ProfileCard-stat-label">KMS Driven:</span> @{{kms_driven}}</div>
              </div>
            </div>
 </script>

</body>
</html>