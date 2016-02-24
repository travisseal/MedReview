<?php
/**
 * Created by IntelliJ IDEA.
 * User: tseal
 * Date: 2/22/16
 * Time: 2:40 PM
 */
require "../model/BaseModel.php";

class ICD10SearchModel extends BaseModel
{
    public function getTerm()
    {
        $this->selectValue = "ICD_CODE";
        $this->tableName = "medreview.icd_10_procedures2";
        $this->filter = $_GET['term'];

        return parent::getTerm();
    }

}