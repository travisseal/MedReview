<?php
/**
 * Created by IntelliJ IDEA.
 * User: tseal
 * Date: 2/20/16
 * Time: 12:47 AM
 *
 * Objective: Handles the database query by using super global
 * Input: $_GET superglobal
 * Output: json data with results from the database
 * Assumptions: The first word in the search is the 'base' word where every word after that high precedence as it relates to the first word
 */

include 'DataConnection.php';

class FacilitiesSearchController
{

    public static function getTerm()
    {

        $term = trim(strip_tags($_GET['term']));

        $a_json = array();
        $a_json_row = array();


        if ($data = DataConnection::connectDB()->query("select DISTINCT ProviderName from facilities  WHERE match(ProviderName)  against (+'$term' in boolean mode) limit 6;")) {
            while($row = mysqli_fetch_array($data)) {
                $firstname = htmlentities(stripslashes($row['ProviderName']));

                $a_json_row["id"] = "ICD Codes";
                $a_json_row["value"] = $firstname;

                array_push($a_json, $a_json_row);
            }
        }
        return $a_json;

        DataConnection::close();
    }
}