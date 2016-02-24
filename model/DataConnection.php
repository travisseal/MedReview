<?php


class DataConnection
{
    private static $errorStatus;
    private static $connection;
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
        mysqli_select_db($conn,"medreview");
    }
    static function close()
    {
        self::$connection->close();
    }
    static function insertItem(Item $item)
    {
       static $zipCode,$facility, $diagnosisDescription,$diagnosisICDCode,$price;



        $connection = self::connectDB();

        $stmt = $connection->prepare("insert into medreview.userdata (zipCode,facility,diagnosisDescription,diagnosisICDCode,price) values(?,?,?,?,?)");



        $stmt->bind_param("sssss",$zipCode,$facility,$diagnosisDescription,$diagnosisICDCode,$price);

        $zipCode = $item->getUserZip();
        $facility = $item->getFacility();
        $diagnosisDescription = $item->getDiagnosis();
        $diagnosisICDCode = $item->getIcd();
        $price = $item->getPrice();

        $stmt->execute();
        $connection->close();

        }


}



