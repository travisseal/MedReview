<?php
/**
 * Created by IntelliJ IDEA.
 * User: tseal
 * Date: 2/21/16
 * Time: 5:09 PM
 */

include 'DataConnection.php';

class ZipcodeConnectionController
{

    public static function getTerm()
    {

        $term = trim(strip_tags($_GET['term']));
        $a_json = array();
        $a_json_row = array();


        if ($data = DataConnection::connectDB()->query("SELECT zip FROM medreview.zipCodes WHERE medreview.zipCodes.zip like '$term%'  limit 6;")) {
            while($row = mysqli_fetch_array($data)) {
                $zip = htmlentities(stripslashes($row['zip']));

                $a_json_row["id"] = "Description";
                $a_json_row["value"] = $zip;

                array_push($a_json, $a_json_row);
            }
        }
        return $a_json;

        DataConnection::close();
    }

}
