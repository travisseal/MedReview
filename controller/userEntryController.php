<?PHP
include "DataContainer.php";

if($_POST)
{
    try
    {
        //Create the object

        $container = new DataContainer();

        //set the properties

        $item->setUserZip($_POST['name']);
        $item->setGender(intval($_POST['cost']));
        $item->setICD(intval($_POST['merchant']));
        $item->setDiagnosis($_POST['review']);
        $item->setFacility($_POST['zip']);


        //insert the data

        DataConnection::insertObject($item);


    }
    catch (Exception $ex)
    {
        echo 'Cannot create object. Check parameters';
        echo "\n";
        echo $ex;
    }



}
else
{
    echo 'No data';
}
