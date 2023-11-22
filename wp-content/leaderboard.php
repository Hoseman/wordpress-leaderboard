<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leaderboard Plugin - Installation Guide</title>
</head>
<body>

<ol>
    <li>Install leaderboard.zip plugin via the Wordpress dashboard.</li>
    <li>Install scores-ticker.zip plugin via the Wordpress dashboard.</li>
    <li>Open the page.php in the root of your theme in a code editor and save a file called page-home.php and save it in the root of your theme.</li>
    <li>Add this code to the first line of the page-home.php file: /* Template Name: IncentiveHomePage. </li>
    <li>Add this code somewhere in the main content of the page-home.php file where you want the leaderboard to appear: <?php echo do_shortcode('[leaderboard/]'); ?></li>
    <li>Go to dashboard > settings > Reading and set the home page to "a static page" and then select "IncentiveHomePage" as the Homepage.</li>
    <li>Then in the dashboard go to Leaderboard and click on "Update database". Make sure all the database tables are installed.</li>
    <li>Then in the dashboard go to Leaderboard and make sure you have added "Dealers", "Dealer Names", and "Scoretypes".</li>
    <li>Make sure that the "Email from Admin" goes to your admin address.</li>
    <li>Then go to the front end to test the leaderboard is working as expected.</li>
</ol>
    
</body>
</html>