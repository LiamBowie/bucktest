<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en-GB">
    
<head>    
    <?php include 'inc/meta.inc.php';?>
    <title>Upcoming Galas | Galas | Bucksburn Amateur Swimming Club</title>    
    <link href='http://fonts.googleapis.com/css?family=Bree+Serif' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Hind' rel='stylesheet' type='text/css'>   
    <link href="css/site.css" rel="stylesheet"/>
</head>

<body>   
    <?php include 'inc/header.inc.php'; ?>   
    <br>
    <div class="row" id="content">
        <div class="large-12 medium-12 small-12 columns">
        
            <ul class="breadcrumbs">
                <li><a href="index.php" role="link">Home</a></li>
                <?php if(isset($_SESSION["username"])) { echo 'li><a href="galas.php" role="link">Galas</li>'; } ?>
                <li class="current">Upcoming Galas</li>
            </ul>

            <h2>Upcoming Galas</h2>
        
            <?php
                require 'inc/connection.inc.php';
                require 'obj/galas.obj.php';
                require 'obj/venues.obj.php';

                $conn = dbConnect();
                
                $galaItem = new Galas();
                $venue = new Venues();
                
                $galasList = $galaItem->listAllUpcomingGalas($conn);
                
                echo '<p class="right"><b>' . count($galasList) . ' results</b></p>';
                        
                echo '<table class="large-12 medium-12 small-12 columns">
                        <tr role="row">
                            <th role="columnheader">Title</th>
                            <th role="columnheader">Venue</th>
                            <th role="columnheader">Date</th>
                            <th role="columnheader">View Details</th>
                        </tr>';

                if (count($galasList) > 0 ) {
                    foreach ($galasList as $gala) {
                        $galaItem->setID($gala["id"]);
                        $galaItem->getAllDetails($conn);            
                        $venue->setID($galaItem->getVenueID());
                        $venue->getAllDetails($conn);

                        $link = "galas/view.php?id=" . $galaItem->getID();

                        echo "<tr>";
                        echo '<td data-th="Title">' . $galaItem->getTitle() . "</td>";
                        echo '<td data-th="Venue">' . $venue->getVenue() . "</td>";
                        echo '<td data-th="Date">' . date("d/m/Y", strtotime($galaItem->getDate())) . "</td>";
                        echo '<td class="none"><a href="' . $link . '">View Details</a></td>';
                        echo "</tr>";
                    }
                } else {
                    echo '<tr><td colspan="5" class="centre">No upcoming galas were found.</td></tr>';
                }
                dbClose($conn);
            ?>
            
            </table>
        </div>    
    </div>
    <?php include 'inc/footer.inc.php';?>
</body>

</html>
