<?php
/**
 * Created by IntelliJ IDEA.
 * User: tseal
 * Date: 2/20/16
 * Time: 12:47 AM
 */

include 'DataConnection.php';

class FacilitiesSearchController
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


        if ($data = $this->db_handle->connectDB()->query("select DISTINCT ProviderName from facilities  WHERE facilities.ProviderName like '$term%' ORDER  by ProviderName asc limit 6;")) {
            while($row = mysqli_fetch_array($data)) {
                $firstname = htmlentities(stripslashes($row['ProviderName']));

                $a_json_row["id"] = "ICD Codes";
                $a_json_row["value"] = $firstname;

                array_push($a_json, $a_json_row);
            }
        }
        return $a_json;

        $this->db_handle->close();
    }
}