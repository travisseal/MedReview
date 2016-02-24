<?php
include "DataConnection.php";
/**
 * This is the Item class
 *
 *
 *
 * Created by PhpStorm.
 * User: tseal
 * Date: 11/30/15
 * Time: 11:28 PM
 */
class Item
{
    // properties

    private $userZip;
    private $gender;
    private $facility;
    private $diagnosis; // eg store, hospital
    private $icdCode;
    private $price;


    //getters

    public function getUserZip()
    {
        return strval($this->userZip);
    }

    public function getGender()
    {
        return strval($this->gender);
    }

    public function getFacility()
    {
        return strval($this->facility);
    }

    public function getDiagnosis()
    {
        return strval($this->diagnosis);
    }

    public function getIcd()
    {
        return strval($this->icdCode);
    }

    public function getPrice()
    {
        return strval($this->price);
    }

    //setters

    /*
     *  Function that sets the name
     *
     * Parameters:
     *  the name must be less than 255 chars in length
     *  the name must be more than 0 in length
     *
     *
     */

    public function setUserZip($inZip)
    {
         $this->userZip = $inZip;
    }

    /*
	 * setCost Function
	 *
	 * Parameters:
	 *  cost must be greater than 0
	 *
	 */

    public function setGender($inGender)
    {
        try
        {
            $this->gender = $inGender;

        }
        catch (Exception $ex)
        {
            return "Invalid gender identity";
        }

    }

    /*
	 * Needs to allow for alpha numeric inputs
	 *
	 */

    public function setFacility($inFacility)
    {
        try
        {
            $this->facility =$inFacility;
        }
        catch (Exception $ex)
        {
            return "Invalid facility";
        }
    }

    public function setDiagnosis($inDiagnosis)
    {
        try
        {
           $this->diagnosis = $inDiagnosis;

        }
        catch (Exception $ex)
        {
            return "Invalid Diagnosis";
        }
    }

    public function setICD($inICD)
    {
        $this->icdCode = $inICD;
    }
    public function setPrice($inPrice)
    {
        $this->price = $inPrice;
    }

}
?>
