<?php

// @author Alan Thom (1103803)
// A class to represent a Gala object
// Contains all attributes and relevant methods to get/set attributes and create, read, update and delete records

class Galas {

    // ***** PROPERTIES *****    
    protected $id;
    private $title, $description, $date, $isAccredited, $isLongCourse, $venueID, $warmUpTime, $organiser, $fees, $confirmationDate, $cutOffDate, $notes;
    
    // ***** CONSTRUCTOR *****
    function __construct($id = 'zzz') {
        $this->id = $id;
    }
        
    // ***** GETTERS *****
    public function getID() {
        return $this->id;
    }
    public function getTitle() {
        return $this->title;
    }    
    public function getDescription() {
        return $this->description;
    }    
    public function getDate() {
        return $this->date;
    }
    public function getIsAccredited() {
        return $this->isAccredited;
    }
    public function getIsLongCourse() {
        return $this->isLongCourse;
    }     
    public function getVenueID() {
        return $this->venueID;
    }    
    public function getWarmUpTime() {
        return $this->warmUpTime;
    }
    public function getOrganiser() {
        return $this->organiser;
    }
    public function getFees() {
        return $this->fees;
    }    
    public function getConfirmationDate() {
        return $this->confirmationDate;
    }
    public function getCutOffDate() {
        return $this->cutOffDate;
    }    
    public function getNotes() {
        return $this->notes;
    }    
    
    // ***** SETTERS *****    
    public function setID($id) {
        $this->id = $id;
    }    
    public function setTitle($title) {
        $this->title = $title;
    }    
    public function setDescription($description) {
        $this->description = $description;
    }    
    public function setDate($date) {
        $this->date = $date;
    }
    public function setIsAccredited($isAccredited) {
        $this->isAccredited = $isAccredited;
    }
    public function setIsLongCourse($isLongCourse) {
        $this->isLongCourse = $isLongCourse;
    }    
    public function setVenueID($venueID) {
        $this->venueID = $venueID;
    }    
    public function setWarmUpTime($warmUpTime) {
        $this->warmUpTime = $warmUpTime;
    }  
    public function setOrganiser($organiser) {
        $this->organiser = $organiser;
    }  
    public function setFees($fees) {
        $this->fees = $fees;
    }
    public function setConfirmationDate($confirmationDate) {
        $this->confirmationDate = $confirmationDate;
    }
    public function setCutOffDate($cutOffDate) {
        $this->cutOffDate = $cutOffDate;
    }
    public function setNotes($notes) {
        $this->notes = $notes;
    }
    
    // ***** OTHER METHODS *****    
    public function getAllDetails($conn, $id) {
        $sql = "SELECT * FROM galas WHERE id = ':id'";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);

        try {
            $stmt->execute();
            $results = $stmt->fetchAll();
            
            /*foreach ($results as $row) {
                $this->setID($row["id"]);
                $this->setTitle($row["title"]);
                $this->setDescription($row["description"]);
                $this->setDate($row["date"]);
                $this->setIsAccredited($row["isAccredited"]);
                $this->setIsLongCourse($row["isLongCourse"]);
                $this->setVenueID($row["venueID"]);
                $this->setWarmUpTime($row["warmUpTime"]);
                $this->setOrganiser($row["organiser"]);
                $this->setFees($row["fees"]);
                $this->setConfirmationDate($row["confirmationDate"]);
                $this->setCutOffDate($row["cutOffDate"]);
                $this->setNotes($row["notes"]);
            }*/
            return $results;
        } catch (PDOException $e) {
            return "Query failed: " . $e->getMessage();
        }    
    }    
    
    public function setAllDetails() {
        // INCOMPLETE       
    }
    
    public function create($conn) {
        $sql = "INSERT INTO galas VALUES (:id, :title, :description, :thedate, :venueID, :warmUpTime, :organiser, :fees, :confirmationDate, :cutOffDate, :notes, :isAccredited, :isLongCourse)";
        
        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':id', $this->getID(), PDO::PARAM_STR);
        $stmt->bindParam(':title', $this->getTitle(), PDO::PARAM_STR);
        $stmt->bindParam(':description', $this->getDescription(), PDO::PARAM_STR);
        $stmt->bindParam(':thedate', $this->getDate(), PDO::PARAM_STR);
        $stmt->bindParam(':venueID', $this->getVenueID(), PDO::PARAM_INT);
        $stmt->bindParam(':warmUpTime', $this->getWarmUpTime(), PDO::PARAM_STR);
        $stmt->bindParam(':organiser', $this->getOrganiser(), PDO::PARAM_STR);
        $stmt->bindParam(':fees', $this->getFees(), PDO::PARAM_STR);
        $stmt->bindParam(':confirmationDate', $this->getConfirmationDate(), PDO::PARAM_STR);
        $stmt->bindParam(':cutOffDate', $this->getCutOffDate(), PDO::PARAM_STR);
        $stmt->bindParam(':notes', $this->getNotes(), PDO::PARAM_STR);
        $stmt->bindParam(':isAccredited', $this->getIsAccredited(), PDO::PARAM_INT);
        $stmt->bindParam(':isLongCourse', $this->getIsLongCourse(), PDO::PARAM_INT);

        try {
            $stmt->execute(); 
            return true;
        } catch (PDOException $e) {
            return "Create failed: " . $e->getMessage();
        }    
    }    
    
    public function update($conn) {
        $sql = "UPDATE galas SET title = :title, description = :description, date = :thedate, venueID = :venueID, warmUpTime = :warmUpTime, organiser = :organiser, fees = :fees, confirmationDate = :confirmationDate, cutOffDate = :cutOffDate, notes = :notes, isAccredited = :isAccredited, isLongCourse = :isLongCourse WHERE id = :id";
        
        $stmt = $conn->prepare($sql);
        
        $stmt->bindParam(':id', $this->getID(), PDO::PARAM_STR);
        $stmt->bindParam(':title', $this->getTitle(), PDO::PARAM_STR);
        $stmt->bindParam(':description', $this->getDescription(), PDO::PARAM_STR);
        $stmt->bindParam(':thedate', $this->getDate(), PDO::PARAM_STR);
        $stmt->bindParam(':venueID', $this->getVenueID(), PDO::PARAM_INT);
        $stmt->bindParam(':warmUpTime', $this->getWarmUpTime(), PDO::PARAM_STR);
        $stmt->bindParam(':organiser', $this->getOrganiser(), PDO::PARAM_STR);
        $stmt->bindParam(':fees', $this->getFees(), PDO::PARAM_STR);
        $stmt->bindParam(':confirmationDate', $this->getConfirmationDate(), PDO::PARAM_STR);
        $stmt->bindParam(':cutOffDate', $this->getCutOffDate(), PDO::PARAM_STR);
        $stmt->bindParam(':notes', $this->getNotes(), PDO::PARAM_STR);
        $stmt->bindParam(':isAccredited', $this->getIsAccredited(), PDO::PARAM_INT);
        $stmt->bindParam(':isLongCourse', $this->getIsLongCourse(), PDO::PARAM_INT);

        try {
            $stmt->execute(); 
            return true;
        } catch (PDOException $e) {
            return "Update failed: " . $e->getMessage();
        }  
    }  
    
    public function delete($conn) {
        $sql = "DELETE FROM galas WHERE id = :id";
        
        $stmt = $conn->prepare($sql);
        
        $stmt->bindParam(':id', $this->getID(), PDO::PARAM_STR);

        try {
            $stmt->execute(); 
            return true;
        } catch (PDOException $e) {
            return "Update failed: " . $e->getMessage();
        }    
    }
    
    public function listAll($conn) {       
        $sql = "SELECT g.id, v.id AS venueID FROM galas g, venues v WHERE g.venueID = v.id ORDER BY g.date DESC";
        
        $stmt = $conn->prepare($sql);  
        
         try {
            $stmt->execute();
            $results = $stmt->fetchAll();
            return $results;
        } catch (PDOException $e) {
            return "Database query failed: " . $e->getMessage();
        }
    }

    public function listAllGalas($conn) {       
        $sql = "SELECT id, title, date FROM galas ORDER BY date DESC";
        
        $stmt = $conn->prepare($sql);  
        
         try {
            $stmt->execute();
            $results = $stmt->fetchAll();
            $array = array();
            foreach ($results as $result) {
                $array[$result["id"]] = $result["title"] . ' (' . date("d/m/Y", strtotime( $result["date"])) . ')';
            }
            
            return $array;
        } catch (PDOException $e) {
            return "Database query failed: " . $e->getMessage();
        }
    }
    
    public function doesExist($conn,$id) {
        $sql = "SELECT * FROM galas WHERE id = :galaID LIMIT 1";
        
        $stmt = $conn->prepare($sql); 
        $stmt->bindParam(':galaID', $id, PDO::PARAM_INT);
        
         try {
            $stmt->execute();
            $results = $stmt->fetchAll();
            if ($stmt->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            return "Database query failed: " . $e->getMessage();
        }
    }

    public function listAllUpcomingGalas($conn) {       
        $sql = "SELECT g.id, v.id AS venueID FROM galas g, venues v WHERE g.venueID = v.id AND g.date >= current_date ORDER BY g.date ASC";
        
        $stmt = $conn->prepare($sql);  
        
         try {
            $stmt->execute();
            $results = $stmt->fetchAll();
            return $results;
        } catch (PDOException $e) {
            return "Database query failed: " . $e->getMessage();
        }
    }
    
    public function listAllCompletedGalas($conn, $limit=null) {       
        $sql = "SELECT g.id, v.id AS venueID FROM galas g, venues v WHERE g.venueID = v.id AND g.date < current_date ORDER BY g.date DESC";
        
        if (!is_null($limit)) {
            $sql .= ' LIMIT :limit';
        }

        $stmt = $conn->prepare($sql);  
        
        if (!is_null($limit)) {
            $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        }

         try {
            $stmt->execute();
            $results = $stmt->fetchAll();
            return $results;
        } catch (PDOException $e) {
            return "Database query failed: " . $e->getMessage();
        }
    }

    public function listAllGalasForSwimmer($conn, $member) {
        $sql = 'SELECT DISTINCT s.galaID FROM swim_times s, galas g, WHERE s.member = :member AND s.galaID = g.id ORDER BY g.date DESC';        
        $stmt = $conn->prepare($sql);       

        $stmt->bindParam(':member', $member, PDO::PARAM_STR);
        
        try {
            $stmt->execute();
            $results = $stmt->fetchAll();

            return $results;
        } catch (PDOException $e) {            
            return "Query failed: " . $e->getMessage();
        }    
    }
    
    public function listAllGalasForSwimmerAndStroke($conn, $member, $stroke) {
        $sql = 'SELECT DISTINCT s.galaID FROM swim_times s, galas g, gala_events e WHERE s.member = :member AND s.galaID = g.id AND s.eventID = e.id AND e.strokeID = :stroke ORDER BY g.date DESC';        
        $stmt = $conn->prepare($sql);       

        $stmt->bindParam(':member', $member, PDO::PARAM_STR);
        $stmt->bindParam(':stroke', $stroke, PDO::PARAM_INT); 
        
        try {
            $stmt->execute();
            $results = $stmt->fetchAll();

            return $results;
        } catch (PDOException $e) {            
            return "Query failed: " . $e->getMessage();
        }    
    } 

    public function doEventsExist($conn) {
        $sql = "SELECT * FROM gala_events WHERE galaID = :galaID LIMIT 1";
        
        $stmt = $conn->prepare($sql); 
        $stmt->bindParam(':galaID', $this->getID(), PDO::PARAM_STR);
        
         try {
            $stmt->execute();
            $results = $stmt->fetchAll();
            if (count($results) > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            return "Database query failed: " . $e->getMessage();
        }
    }

        public function doResultsExist($conn) {
        $sql = "SELECT * FROM swim_times WHERE galaID = :galaID LIMIT 1";
        
        $stmt = $conn->prepare($sql); 
        $stmt->bindParam(':galaID', $this->getID(), PDO::PARAM_STR);
        
         try {
            $stmt->execute();
            $results = $stmt->fetchAll();
            if (count($results) > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            return "Database query failed: " . $e->getMessage();
        }
    }
                
    public function numberOfResults($conn) {
        $sql = "SELECT member FROM swim_times WHERE galaID = :galaID";
        
        $stmt = $conn->prepare($sql); 
        $stmt->bindParam(':galaID', $galaID, PDO::PARAM_STR);
        
         try {
            $stmt->execute();
            $results = $stmt->fetchAll();
            return count($results);
        } catch (PDOException $e) {
            return "Database query failed: " . $e->getMessage();
        }
    } 
    
    public function isInputValid($conn,$id,$title,$description,$date,$venueID,$warmUp,$organiser,$confirm,$cutOff,$fees,$notes) {
        if ($this->isIDValid($conn,$id) && $this->isTitleValid($title) && $this->isDescriptionValid($description) && $this->isDateValid($date) && $this->isVenueIDValid($conn,$venueID) && $this->isWarmUpValid($warmUp) && $this->isOrganiserValid($organiser) && $this->isConfirmValid($confirm) && $this->isCutOffValid($cutOff) && $this->isFeesValid($fees) && $this->isNotesValid($notes)) {
            return true;
        } else {
            return false;
        }
    }
    
    public function isIDValid($conn,$id) {
        if ($id == $this->getID()) {
            return true;
        } else {
            if (count($id) > 0 && count($id) <= 8) {
            $sql = "SELECT * FROM galas WHERE UPPER(id) = UPPER(:galaID) LIMIT 1";
        
            $stmt = $conn->prepare($sql); 
            $stmt->bindParam(':galaID', $id, PDO::PARAM_INT);
            
             try {
                $stmt->execute();
                $results = $stmt->fetchAll();
                if ($stmt->rowCount() > 0) {
                    return false;
                } else {
                    return true;
                }
            } catch (PDOException $e) {
                return "Database query failed: " . $e->getMessage();
            }
        } else {
            return false;
        }
    }
    }
    
    public function isTitleValid($title) {
        if (count($title) > 0 && count($title) <= 250) {
            return true;
        } else {
            return false;
        }
    }
    
    public function isDescriptionValid($description) {
        if (count($description) <= 250) {
            return true;
        } else {
            return false;
        }
    }
    
    
    public function isDateValid($date) {
        if (strtotime($date)) {
            return true;
        } else {
            return false;
        }
    }

    public function isVenueIDValid($conn,$venueID) {
        $sql = "SELECT * FROM venues WHERE id = :venueID LIMIT 1";
        
        $stmt = $conn->prepare($sql); 
        $stmt->bindParam(':venueID', $venueID, PDO::PARAM_INT);
        
         try {
            $stmt->execute();
            $results = $stmt->fetchAll();
            if ($stmt->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            return "Database query failed: " . $e->getMessage();
        }
    }

    public function isWarmUpValid($warmUp) {
        if (count($warmUp) > 0 && count($warmUp) <= 11) {
            return true;
        } else {
            return false;
        }
    }

    public function isOrganiserValid($organiser) {
        if (count($organiser) > 0 && count($organiser) <= 50) {
            return true;
        } else {
            return false;
        }

     }

    public function isConfirmValid($confirm) {
        if (strtotime($confirm)) {
            return true;
        } else {
            return false;
        }
    }

    public function isCutOffValid($cutOff) {
        if (strtotime($cutOff)) {
            return true;
        } else {
            return false;
        }
    }

     public function isFeesValid($fees) {
        if (!empty($fees)) {
            if (is_numeric(($fees))) {
                return true;
            } else {
                return false;
            }
        } else {
            return true;
        }
    }

    public function isNotesValid($notes) {
        if (count($notes) <= 500) {
            return true;
        } else {
            return false;
        }
    }
}

?>
