<?php

/**
 * Created by PhpStorm.
 * User: tseal
 * Date: 12/9/15
 * Time: 6:25 PM
 */
class DataContainer
{

    private $_averageCost;
    private $_highestCost;
    private $_lowestCost;
    private $_numberOfSubmissions;



    public function setAverageCost($averageCost)
    {
        $this->_averageCost = $averageCost;
    }


    public function setHighestCost($highestCost)
    {
    $this->_highestCost = $highestCost;
    }

    public function setLowestCost($lowestCost)
    {
        $this->_lowestCost = $lowestCost;
    }

    public function setNumberOfSubmissions($submissions)
    {
        $this->_numberOfSubmissions = $submissions;
    }

    //getters

    public function getAverageCost()
    {
        return _averageCost;
    }

    public function getHighestCost()
    {
            return _highestCost;
    }

    public function getLowestCost()
    {
        return _lowestCost;
    }

    public function getNumberOfSubmissions()
    {
        return  _numberOfSubmissions;
    }

}