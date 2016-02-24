<?php
/**
 * Created by IntelliJ IDEA.
 * User: tseal
 * Date: 2/22/16
 * Time: 10:56 AM
 *
 *
 * Objective: This is the base class for all controllers to execute queries from
 *            This allows me to keep DRY code
 */

require_once "../model/DataConnection.php";

abstract class BaseModel
{
    public $selectValue;
    public $tableName;
    public $filter;

    public function getTerm()
    {

        $jsonArray = array();
        $jsonrowArray = array();

        if ($data = DataConnection::connectDB()->query("SELECT DISTINCT $this->selectValue from $this->tableName where $this->selectValue like '$this->filter%' limit 6  ")) {
            while($row = mysqli_fetch_array($data)) {
                $firstname = htmlentities(stripslashes($row[$this->selectValue]));

                $jsonrowArray["id"] = "ICD Codes";
                $jsonrowArray["value"] = $firstname;

                array_push($jsonArray, $jsonrowArray);
            }
        }

        return $jsonArray;

    }
}

