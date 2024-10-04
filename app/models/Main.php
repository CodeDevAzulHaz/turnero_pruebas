<?php 
class Main extends Model {

  function readAll($_table) {
    $_cols = array(
      array('t1', '*'),
    );   

    $table = $this->read('set', $_table, $_cols, null, null, null);
    return $table;
  }

  function readWhere($type, $field, $field_value, $table) {

    $_cols = array(
      array('t1', '*'),
    );

    $_where = array(
      array('t1', $field, $field_value),
    );

    $res = $this->read($type, $table, $_cols, $_where, null, null);

    return $res;
  }

  function readMultipleWhere($type, $fields, $values, $table) {

    $_cols = array(
      array('t1', '*'),
    );

    $_where = array(
      array('t1', $fields[0], $values[0], ' AND '),
      array('t1', $fields[1], $values[1]),
    );

    $res = $this->read($type, $table, $_cols, $_where, null, null);

    if ($res) {
      return $res;
    } else {
      return false;
    }
  }


}