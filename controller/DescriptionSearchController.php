<?php
/**
 * Created by IntelliJ IDEA.
 * User: tseal
 * Date: 2/19/16
 * Time: 2:14 PM
 */

include 'DataConnection.php';

class DescriptionSearchController
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


        if ($data = $this->db_handle->connectDB()->query("SELECT LongDesec FROM icd_10_procedures2 WHERE icd_10_procedures2.LongDesec like '$term%' ORDER  by LongDesec asc limit 6;")) {
            while($row = mysqli_fetch_array($data)) {
                $longDescription = htmlentities(stripslashes($row['LongDesec']));

                $a_json_row["id"] = "Description";
                $a_json_row["value"] = $longDescription;

                array_push($a_json, $a_json_row);
            }
        }
        return $a_json;
        //echo json_encode($a_json);
        //flush();
        $this->db_handle->close();
    }

}


