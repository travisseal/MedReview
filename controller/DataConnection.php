<?php

/* Objective: This class connects to the database
 *
 */

class DataConnection
{

    private $database = "medreview";
    private $errorStatus;
    private $connection;

    function __construct()
    {

        $conn = $this->connectDB();

        $this->selectDB($conn);

    }

    /*
     * Objective: connects to the database
     * Input: None
     * Output: connection object
     * Assumptions: none
     */
    function connectDB() {

        try
        {
            $connection = mysqli_connect("healthdb.czeo9gdzri9u.us-west-2.rds.amazonaws.com","root","masterkey","medreview");
            $this->connection = $connection;
            if(!$connection)
            {
                throw new Exception("Connection failed with message: \n ");
            }


            $this->selectDB($connection);

        }
        catch(Exception $ex)
        {
            $this->errorStatus = $ex->getMessage();

        }

        return $connection;
    }


    function selectDB($conn)
    {
        mysqli_select_db($conn,$this->database);
    }

    function close()
    {
        $this->connection->close();
    }

    /*
     * Objective: Interface for running the query
     * Input: query string
     * Output: list of results from the database
     */

    function runQuery($query)
    {
        $result = $this->_connection->prepare($query);

        while($row = mysqli_fetch_row($result))
        {
            $resultSet[] = $row;
        }

        return $resultSet;
    }

    function numRows($query) {
        $result  = mysql_query($query);
        $rowcount = mysql_num_rows($result);
        return $rowcount;
    }


}



