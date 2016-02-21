<?php
/**
 * Created by IntelliJ IDEA.
 * User: tseal
 * Date: 2/18/16
 * Time: 11:43 AM
 *
 * Objective: takes incomming text and performs search on that criteria
 * Input: Text from form
 * Output: Search results as json back to the calling ajax function
 * Assumptions: None
 */

include 'DataConnection.php';

class ICD10SearchController
{

    private $db_handle;

    function __construct()
    {
        $this->db_handle = new DataConnection();
    }

    public function getTerm()
    {

        $term = trim(strip_tags($_GET['term']));

        $a_json = array();
        $a_json_row = array();


        if ($data = $this->db_handle->connectDB()->query("SELECT ICD_CODE FROM icd_10_procedures2 WHERE icd_10_procedures2.ICD_CODE like '$term%' ORDER  by ICD_CODE asc limit 6;")) {
            while($row = mysqli_fetch_array($data)) {
                $firstname = htmlentities(stripslashes($row['ICD_CODE']));

                $a_json_row["id"] = "ICD Codes";
                $a_json_row["value"] = $firstname;

                array_push($a_json, $a_json_row);
            }
        }
        return $a_json;

        $this->db_handle->close();
    }

}




