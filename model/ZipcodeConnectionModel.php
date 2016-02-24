<?php
/**
 * Created by IntelliJ IDEA.
 * User: tseal
 * Date: 2/21/16
 * Time: 5:09 PM
 */

require "../model/BaseModel.php";

class ZipcodeConnectionModel extends BaseModel
{

    public function getTerm()
    {
        $this->selectValue = "zip";
        $this->tableName = "medreview.zipCodes ";
        $this->filter = $_GET['term'];

        return parent::getTerm();

    }

}
