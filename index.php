<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en-GB">
    
<head>    
    <?php include 'inc/meta.inc.php';?>
    <title>Home | Bucksburn Amatuer Swimming Club</title>    
    <link href='http://fonts.googleapis.com/css?family=Bree+Serif' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Hind' rel='stylesheet' type='text/css'>
    <link href="css/site.css" rel="stylesheet"/>
</head>

<body>   
    <?php include 'inc/header.inc.php'; ?>   
    <br>
    <div class="row" id="content">
        <div class="large-12 columns centre">
            <img src="img/banner.jpg" alt=""/>

            <?php
                require 'inc/connection.inc.php';
                require 'obj/news.obj.php';
                require 'obj/galas.obj.php';
                require 'obj/venues.obj.php';
                require 'obj/members.obj.php';

                $conn = dbConnect();
                $newsItem = new News();
                $newsList = $newsItem->getMostRecent($conn,3);
                $gala = new Galas();
                $galaList = $gala->listAllCompletedGalas($conn,2);
                $venue = new Venues();

                echo '<div class="row">
                <div class="large-6 medium-6 small-12 columns index">
                    <h2 class="h3 capitalise">About Us</h2>
                    <p>Bucksburn Amateur Swimming Club (BASC) is a fairly young club with over 100 swimmers, which hosts a wide range of age groups and abilities. BASC was formed in 1990, and at that time had only 1 core aim - to encourage local participation in the sport of swimming.</p>
                    <div class="large-6 large-centered middle-12 small-12 columns">
                    <a href="about.php" class="button small radius h6 capitalise margin">Read more About Us</a>
                    </div>
                    </div>';

                echo '<div class="large-6 medium-6 small-12 columns index">
                    <h2 class="h3 capitalise">Recent Gala Results</h2>
                    <div class="row">';
                foreach ($galaList as $galaItem) {
                    $gala->setID($galaItem["id"]);
                    $galaresults = $gala->getAllDetails($conn);
                    $venue->setID($gala->getVenueID());
                    $venue->getAllDetails($conn);

                    $link = "gala-results/view.php?id=" . $gala->getID();

                    echo '<div class="large-12 medium-12 small-12 columns centre">
                            <h3 class="h4 capitalise"><a href="' . $link . '">Title' . $galaresults['title'] . '</a></h3>
                            <h4 class="h6"><i>' . $venue->getVenue() . ' - ' . date("d/m/Y", strtotime($gala->getDate())) . '</i></h4>
                    </div>';
                }
                echo '</div><div class="large-6 large-centered middle-12 small-12 columns">
                    <a href="gala-results.php" class="button small radius h6 capitalise margin">View all Gala Results</a>
                    </div></div></div><hr>';

                echo '<div class="large-12 medium-12 small-12 columns index">
                    <h2 class="h3 capitalise">Recent News</h2>
                    <div class="row">';

                foreach ($newsList as $news) {
                    $newsItem->setID($news["id"]);
                    $newsItem->getAllDetails($conn);
                    $link = "news/view.php?id=" . $newsItem->getID();

                    echo '<div class="large-4 medium-4 small-12 columns centre">
                        <article>
                            <h3 class="h4 capitalise"><a href="' . $link . '">' . $newsItem->getTitle() . '</a></h3>
                            <h4 class="h6"><i>' . date("l jS F Y", strtotime($newsItem->getDate())) . '</i></h4>
                            <p>' . $newsItem->getSummary(100) . '</p>
                        </article>
                    </div>';
                }
                echo '</div>
                <div class="large-3 large-centered middle-6 small-12 columns">
                    <a href="news.php" class="button small radius h6 capitalise">View all Recent News</a>
                </div>
                </div>';
            ?>

        </div>
    </div>
    <?php include 'inc/footer.inc.php';?>
</body>

</html>
