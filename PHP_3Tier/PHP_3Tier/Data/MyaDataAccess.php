<?php


require_once '../Data/MyDataAccessMySQLi.php';


abstract class MyaDataAccess
{
    private static $m_DataAccess;

    public static function getInstance()
    {
        // singleton
        if(self::$m_DataAccess == null)
        {
            self::$m_DataAccess = new MyDataAccessMySQLi();

        }
        return self::$m_DataAccess;
    }

    public abstract function connectToDB();

    public abstract function closeDB();

    public abstract function selectActors($start,$count);

    public abstract function fetchActors();
    
    public abstract function fetchActorID($row);

    public abstract function fetchActorFirstName($row);

    public abstract function fetchActorLastName($row);
    
    public abstract function insertActor($firstName,$lastName);

    public abstract function searchActors($searchTerm);
    public abstract function deleteActors($ID);
    public abstract function  updateActor($ID, $firstName,$lastName);


}
?>
