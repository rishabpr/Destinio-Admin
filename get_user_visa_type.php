<?php

include "connection.php";

if($_REQUEST['data']=='')
{

}



else {
    $query_visa = "select * from visa_styles where country_id=" . $_REQUEST['data'];
    $result_visa = mysqli_query($conn, $query_visa);
    $select = "<select onchange='visa_user_doc_id(this.value)' id='visa_type_id' data-rule-required='true' name='visa_type_id' class=' form-control' >";
    $select .= "<option value=''>Select Visa</option>";
    while ($row_visa = mysqli_fetch_array($result_visa)) {

        $select .= '<option value="' . $row_visa['id'] . '">' . $row_visa['visa_type'] . '</option>';
    }

    $select .= "</select>";
    echo " <label>VISA TYPE </label>";
    echo $select;
}
?>