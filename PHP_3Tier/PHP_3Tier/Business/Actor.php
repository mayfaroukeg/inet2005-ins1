<?php

require_once '../Business/MyiBusinessObject.php';
require_once '../Data/MyaDataAccess.php';

class Actor implements MyiBusinessObject
{

    private $m_firstName;
    private $m_lastName;


    public function __construct(  $in_fname, $in_lname)
    {


        $this->m_firstName = $in_fname;
        $this->m_lastName = $in_lname;


    }




    public function getID()
    {
        return ($this->m_actorId);
    }

    public function getFirstName()
    {
        return ($this->m_firstName);
    }

    public function getLastName()
    {
        return ($this->m_lastName);
    }

    public static function retrieveSome($start, $count)
    {
        $myDataAccess = MyaDataAccess::getInstance();
        $myDataAccess->connectToDB();

        $myDataAccess->selectActors($start, $count);

        while ($row = $myDataAccess->fetchActors()) {
            $currentActor = new self($myDataAccess->fetchActorFirstName($row),
                $myDataAccess->fetchActorLastName($row),
            $myDataAccess->fetchActorID($row));
            $currentActor->m_actorId = $myDataAccess->fetchActorID($row);
            $arrayOfActorObjects[] = $currentActor;
        }

        $myDataAccess->closeDB();

        return $arrayOfActorObjects;
    }


    public static function search($searchTerm)


    {

        $searchTerm = $_POST["searchTerm"];


        $myDataAccess = MyaDataAccess::getInstance();
        $myDataAccess->connectToDB();

        $myDataAccess->searchActors($searchTerm);

        while ($row = $myDataAccess->fetchActors()) {
            $currentActor = new self($myDataAccess->fetchActorFirstName($row),
                $myDataAccess->fetchActorLastName($row) );
            $currentActor->m_actorId = $myDataAccess->fetchActorID($row);
            $arrayOfActorObjects[] = $currentActor;
        }
        $myDataAccess->closeDB();

        return $arrayOfActorObjects;
    }


    public static function delete($ID)


    {

        $ID = $_POST["ID"];


        $myDataAccess = MyaDataAccess::getInstance();
        $myDataAccess->connectToDB();

        $myDataAccess->deleteActors($ID);

    }


    public static function updateActor($ID, $firstName, $lastName)


    {

        $ID = $_POST["ID"];
        $firstName= $_POST["firstName"];
        $lastName= $_POST["lastName"];


        $myDataAccess = MyaDataAccess::getInstance();
        $myDataAccess->connectToDB();

        $myDataAccess->updateActor($ID, $firstName, $lastName);

    }



    public function save()
    {
        $myDataAccess = MyaDataAccess::getInstance();
        $myDataAccess->connectToDB();

        $recordsAffected = $myDataAccess->insertActor($this->m_firstName, $this->m_lastName);

        $myDataAccess->closeDB();

        return "$recordsAffected row(s) affected!";

    }
}
?>
