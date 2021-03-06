<?php
    session_start();

    if (!isset($_SESSION['username'])) {
        header( 'Location:' . $domain . 'message.php?id=badaccess' );
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en-GB">

    <head>    
        <?php include 'inc/meta.inc.php'; ?>
        <title>Members | Bucksburn Amatuer Swimming Club</title>   
    <link href='http://fonts.googleapis.com/css?family=Bree+Serif' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Hind' rel='stylesheet' type='text/css'>    
        <link href="css/site.css" rel="stylesheet"/>
        <script src="js/foundation.min.js"></script>
    </head>

    <body>   
        <?php include 'inc/header.inc.php'; ?>   
        <br>

        <div class="row" id="content">
            <div class="large-12 medium-12 small-12 columns">

                <ul class="breadcrumbs">
                    <li><a href="index.php" role="link">Home</a></li>
                    <li class="current">Members</li>
                </ul>

                <h2>Members</h2>   

                <?php
                require 'inc/connection.inc.php';
                require 'obj/members.obj.php';
                require 'obj/status.obj.php';
                require 'obj/squads.obj.php';
                require 'obj/roles.obj.php';
                require 'inc/forms.inc.php';

                $conn = dbConnect();

                $status = new Status();
                $squads = new Squads();
                $roles = new Roles();

                echo '<ul class="accordion" data-accordion>
                  <li class="accordion-navigation">
                    <a href="#search">Search Members</a>
                    <div id="search" class="content">';

                echo formStart();

                if (isset($_POST["btnSubmit"])) {
                    if (!empty($_POST["sltStatus"])) {
                        echo comboInputPostback(false, "Search by Member Status", "sltStatus", $_POST["sltStatus"], $status->listAllStatus($conn));
                    } else {
                        echo comboInputBlank(false, "Search by Member Status", "sltStatus", "All", $status->listAllStatus($conn));
                    }

                    if (!empty($_POST["sltSquad"])) {
                        echo comboInputPostback(false, "Search by Squad", "sltSquad", $_POST["sltSquad"], $squads->listAllSquads($conn));
                    } else {
                        echo comboInputBlank(false, "Search by Squad", "sltSquad", "All", $squads->listAllSquads($conn));
                    }

                    if (!empty($_POST["sltRoles"])) {
                        echo comboInputPostback(false, "Search by Member Role", "sltRole", $_POST["sltRole"], $roles->listAllRoles($conn));
                    } else {
                        echo comboInputBlank(false, "Search by Member Role", "sltRole", "All", $roles->listAllRoles($conn));
                    }

                    if (!empty($_POST["txtSearch"])) {
                        echo textInputPostback(false, "Search by Member Name", "txtSearch", $_POST["txtSearch"], 100);
                    } else {
                        echo textInputBlank(false, "Search by Member Name", "txtSearch", 100);
                    }
                } else {
                    echo comboInputBlank(false, "Search by Member Status", "sltStatus", "All", $status->listAllStatus($conn));
                    echo comboInputBlank(false, "Search by Squad", "sltSquad", "All", $squads->listAllSquads($conn));
                    echo comboInputBlank(false, "Search by Member Role", "sltRole", "All", $roles->listAllRoles($conn));
                    echo textInputBlank(false, "Search by Member Name", "txtSearch", 100);
                }

                echo formEndWithButton("Search");

                echo '</div></li></ul>';


                $memberItem = new Members();

                if (isset($_POST["btnSubmit"])) {
                    if (!empty($_POST["txtSearch"])) {
                        $membersList = $memberItem->listAllMembers($conn, $_POST["txtSearch"]);
                    } else {
                        $membersList = $memberItem->listAllMembers($conn);
                    }
                } else {
                    $membersList = $memberItem->listAllMembers($conn);
                }

                echo '<p class="right"><b>' . count($membersList) . ' results</b></p>';

                echo '<table class="large-12 medium-12 small-12 columns">
                        <tr role="row">
                            <th role="columnheader">Name</th>
                            <th role="columnheader">Squad</th>
                            <th role="columnheader">Role</th>
                            <th></th>
                        </tr>';

                foreach ($membersList as $member) {
                    $memberItem->setUsername($member["username"]);
                    $memberItem->getAllDetails($conn);

                    //set hyperlink to point to member search with squadID parameter
                    $link = "members/view.php?u=" . $memberItem->getUsername();

                    echo "<tr>";
                    echo '<td data-th="Name">' . $memberItem->getFirstName() . ' ' . $memberItem->getLastName() . '</td>';
                    if (!empty($member["squad"])) {
                        echo '<td data-th="Squad">' . $member["squad"] . '</td>';
                    } else {
                        echo '<td data-th="Squad"></td>';
                    }
                    echo '<td data-th="Role"></td>';
                    echo '<td class="none"><a href="members/view.php?u=' . $memberItem->getUsername() . '">View Details</td>';
                    echo "</tr>";
                }
                dbClose($conn);
                ?>
                </table>
            </div>
        </div>
        <?php include 'inc/footer.inc.php';?>
    </body>

</html>
