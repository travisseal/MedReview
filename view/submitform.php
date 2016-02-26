<?PHP
require '../model/Item.php';

/*
 * This is the form handler. When a post object (array) is passed into the method called by the index.php,
 * a new object is created and its properties populated with the data.
 */




DataConnection::getStats();

if(isset($_POST['userZip'],$_POST['userGender'],$_POST['facilitySearch'],$_POST['diagnosisDesc'],$_POST['icd10search'],$_POST['price']))
{
    try
    {
        //Create the object

        $item = new Item();

        //set the properties

        $item->setUserZip($_POST['userZip']);
        $item->setGender($_POST['userGender']);
        $item->setFacility($_POST['facilitySearch']);
        $item->setDiagnosis($_POST['diagnosisDesc']);
        $item->setICD($_POST['icd10search']);
        $item->setPrice($_POST['price']);

        //DataConnection::insertItem($item);

        //echo DataConnection::getStats();

        DataConnection::close();

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
    echo 'No data was sent';
    echo "<pre>".print_r($_REQUEST, 1)."</pre>";

}