<!DOCTYPE html>
<html>
<head>
    <title></title>
        <link rel="stylesheet" href="css/resultcard.css">

</head>
<body>
<div class="Demo">
          <form action="https://twitter.com/search" method="get">
            <input type="hidden" name="mode" value="users">
            <div class="Typeahead Typeahead--twitterUsers">
              <div class="u-posRelative">
                <input class="Typeahead-hint" type="text" tabindex="-1" readonly>
                <input class="Typeahead-input" id="demo-input" type="text" name="q" placeholder="Search Twitter users...">
                <ul>
                <li><div class="ProfileCard u-cf">
        <img class="ProfileCard-avatar" src="http://cdn1.droom.in/photos/listing/2015-03-13/d7f2f18866e71f86581a3bf4623bd61a_web_thumb.png">

        <div class="ProfileCard-details">
          <div class="ProfileCard-realName">{{"name"}}</div>
          <div class="ProfileCard-screenName">@{{"screen_name"}}</div>
          <div class="ProfileCard-description">{{"description"}}</div>
        </div>

        <div class="ProfileCard-stats">
          <div class="ProfileCard-stat"><span class="ProfileCard-stat-label">Fuel Type:</span> {{"Petrol"}}</div>
          <div class="ProfileCard-stat"><span class="ProfileCard-stat-label">Location:</span> {{"Delhi"}}</div>
          <div class="ProfileCard-stat"><span class="ProfileCard-stat-label">KMS Driven:</span> {{"10000"}}</div>
        </div>
      </div></li>
                <li>"Chinamma"</li>
                </ul>
              </div>
              <div class="Typeahead-menu"></div>
            </div>
            <button class="u-hidden" type="submit">blah</button>
          </form>
        </div>
</body>
</html>