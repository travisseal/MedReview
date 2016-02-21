<?PHP
include "DataContainer.php";

if($_POST)
{
    try
    {
        //Create the object

        $container = new DataContainer();

        //set the properties

        $item->setName($_POST['name']);
        $item->setCost(intval($_POST['cost']));
        $item->setMerchant(intval($_POST['merchant']));
        $item->setReview($_POST['review']);
        $item->setZip($_POST['zip']);


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
