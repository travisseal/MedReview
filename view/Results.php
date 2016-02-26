<?php

/*
 * This script demonstrates a very basic statistics result from the database. It is called right after the data is inserted by the
 * DataConnection class
 *
 */

require_once '../model/DataConnection.php';

try {
    $conn = new PDO("mysql:host=healthdb.czeo9gdzri9u.us-west-2.rds.amazonaws.com;dbname=medreview", 'root', 'masterkey');

    $result = $conn->query('select zipCode,price,diagnosisDescription,diagnosisICDCode
                            from userdata
                            where price in (select max(price)
                                           from userdata
                                           where zipCode = zipCode)')->fetch(PDO::FETCH_ASSOC);
    if ($result) {

        print "<p1>";
        print("<b>"."The most expensive zip-code is:  " . " </b> ". $result['zipCode']);
        print "<br>";
        print "<br>";
        print("<b>"."with price of:$  ". " </b> ". money_format('%=*(#10.2n', $result['price']));
        print "<br>";
        print "<br>";
        print("<b>"."The diagnosis is:  ". " </b> ".$result['diagnosisDescription']);
        print "<br>";
        print "<br>";
        print("<b>"."The ICD10-Code is:  ". " </b> ".$result['diagnosisICDCode']);
        print "</p1>";

    }
    else
    {
        echo 'nothing in the result sets';
    }
} catch (PDOException $pe) {
    die("Error occurred:" . $pe->getMessage());
}