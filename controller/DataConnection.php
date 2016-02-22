<?php

/* Objective: This class connects to the database
 *
 */

class DataConnection
{

    private static $database = "medreview";
    private static $errorStatus;
    private static $connection;

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
    static function connectDB() {

        try
        {
            $connection = mysqli_connect("healthdb.czeo9gdzri9u.us-west-2.rds.amazonaws.com","root","masterkey","medreview");
           // $connection = $connection;
            if(!$connection)
            {
                throw new Exception("Connection failed with message: \n ");
            }

        }
        catch(Exception $ex)
        {
            self::$errorStatus = $ex->getMessage();

        }

        return $connection;
    }


    static function selectDB($conn)
    {
        mysqli_select_db($conn,self::$database);
    }

    function close()
    {
        self::$connection->close();
    }

    /*
     * Objective: Interface for running the query
     * Input: query string
     * Output: list of results from the database
     */

    static function runQuery($query)
    {
        $result = self::$connection->prepare($query);

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



