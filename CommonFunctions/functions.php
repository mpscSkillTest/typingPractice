<?php
function getFieldFromTable($field, $tableName, $clause, $clause_value)
{
	$sql_bal = "SELECT " . $field . " as field_value from " . $tableName . " where " . $clause . "='" . $clause_value . "'";

	$result_bal = mysqli_query($GLOBALS['conn'], $sql_bal);

	if ($row_bal = @mysqli_fetch_array($result_bal)) {

		@extract($row_bal);

		if ($field_value) {

			// error_log('getFieldFromTable return value: '.$field_value);
			return $field_value;
		} else {

			// error_log('getFieldFromTable return value: Nothing');
			return "";
		}
	}
}

function getFieldFromTableMultiple($field, $tableName, $clause, $clause_value, $clause1, $clause_value1){
  
	$sql_bal = "SELECT " . $field . " as field_value FROM " . $tableName . " WHERE " . $clause . " = '" . $clause_value . "' AND " . $clause1 . "='" . $clause_value1 . "' ";
	error_log("MULTIPLE-> " . $sql_bal);

	$result_bal = mysqli_query($GLOBALS['conn'], $sql_bal);

     	if ($row_bal = @mysqli_fetch_array($result_bal)) {

	    @extract($row_bal);

	    if ($field_value) {

	      // error_log('getFieldFromTable return value: '.$field_value);
	      return $field_value;
	    } else {

	      // error_log('getFieldFromTable return value: Nothing');
	      return "";
	    }
	}
}

?>