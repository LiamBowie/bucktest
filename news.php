<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en-GB">
    
<head>    
    <?php include 'inc/meta.inc.php';?>
    <title>News | Bucksburn Amatuer Swimming Club</title> 
    <link href='http://fonts.googleapis.com/css?family=Bree+Serif' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Hind' rel='stylesheet' type='text/css'>   
    <link href="css/site.css" rel="stylesheet"/>
</head>

<body>   
    <?php include 'inc/header.inc.php';?>   
    <br>
        
    <div class="row" id="content">
        <div class="large-12 medium-12 small-12 columns">
        
        <ul class="breadcrumbs">
            <li><a href="index.php" role="link">Home</a></li>
            <li class="current">News</li>
        </ul>
        
        
        <section role="main">
            <h2>News</h2>

            <?php
                require 'inc/connection.inc.php';
                require 'obj/news.obj.php';
                require 'obj/members.obj.php';

                if (isset($_SESSION['delete'])) {
                    echo '<p class="alert-box success radius centre">News Item deleted successfully!</p>';
                    unset($_SESSION['delete']);
                }

                $conn = dbConnect();
                
                $newsItem = new News();
                $memberItem = new Members();

                $newsList = $newsItem->getAllNews($conn);
                
                foreach ($newsList as $news) {
                    $newsItem->setID($news["id"]);
                    $newsItem->getAllDetails($conn);            
                    $memberItem->setUsername($newsItem->getAuthor());

                    $link = "news/view.php?id=" . $newsItem->getID();
                    echo '<article>
                    <h3><a href="' . $link . '">$newsItem->getTitle() </a></h3>
                    <h4 class="capitalise">' . $newsItem->getSubtitle() . '</h4>
                    <h5><i>By ' . $memberItem->getFullNameByUsername($conn) . ' on ' . date("jS F Y", strtotime($newsItem->getDate())) . '</i></h5>
                    <p>' . $newsItem->getSummary(250) . '</p>
                    </article><hr>';
                }

                dbClose($conn);
            ?> 
        </section> 
            
        </div>
    </div> 
    <?php include 'inc/footer.inc.php';?> 
</body>

</html>
