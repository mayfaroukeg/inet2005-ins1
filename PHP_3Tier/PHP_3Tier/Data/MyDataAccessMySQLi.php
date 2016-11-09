<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

require_once 'MyaDataAccess.php';
class MyDataAccessMySQLi extends MyaDataAccess
{

    private $dbConnection;
    private $result;

    // aDataAccess methods
    public function connectToDB()
    {
         $this->dbConnection = @new mysqli("localhost","root", "inet2005","sakila");
         if (!$this->dbConnection)
         {
               die('Could not connect to the Sakila Database: ' .
                        $this->dbConnection->connect_errno);
         }
    }

    public function closeDB()
    {  
        $this->dbConnection->close();
    }

    public function selectActors($start,$count)
    {
       $this->result = @$this->dbConnection->query("SELECT * FROM actor LIMIT $start,$count");
       if(!$this->result)
       {
               die('Could not retrieve records from the Sakila Database: ' .
                       $this->dbConnection->error);
       }

    }
    

    public function fetchActors()
    {
       if(!$this->result)
       {
               die('No records in the result set: ' .
                       $this->dbConnection->error);
       }
       return $this->result->fetch_array();
    }
    
    public function fetchActorID($row)
    {
       return $row['actor_id'];
    }

    public function fetchActorFirstName($row)
    {
       return $row['first_name'];
    }

    public function fetchActorLastName($row)
    {
       return $row['last_name'];
    }
    
    public function insertActor($firstName,$lastName)
    {
       $this->result = @$this->dbConnection->query("INSERT INTO actor (first_name,last_name) VALUES('$firstName','$lastName');");
       
       return $this->dbConnection->affected_rows;

    }

    public function searchActors($searchTerm)
    {
        $sql_statement = "SELECT * FROM actor WHERE first_name LIKE '%$searchTerm%' OR last_name LIKE '%$searchTerm%'   OR actor_id LIKE '$searchTerm' ";
        $this->result = @$this->dbConnection->query($sql_statement);




        return $this->result;

    }



    public function deleteActors($ID)
    {
        $sql_statement = "DELETE FROM actor WHERE actor_id = '$ID' ";
        $this->result = @$this->dbConnection->query($sql_statement);




        if(!$this->result)
        {
            die('Could not delete record from the Sakila Database: ');
        }
        Else
        {
            echo "record deleted";
        }
        return $this->dbConnection->affected_rows;

    }


    public function updateActor($ID, $firstName,$lastName)
    {
        $sql_statement = "UPDATE  actor SET first_name = '$firstName',last_name = '$lastName' where actor_id = '$ID';";
        $this->result = @$this->dbConnection->query($sql_statement);


        return $this->dbConnection->affected_rows;

    }
}

?>
