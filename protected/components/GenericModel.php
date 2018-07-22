<?php
/**
 * Created by IntelliJ IDEA.
 * User: admin
 * Date: 28.04.14
 * Time: 5:36
 */

class GenericModel extends CActiveRecord{

    protected function whereToSQL($where) {
        $sql = "";

        if (is_array($where)) {
            foreach ($where as $element) {
                if (strlen($sql)!=0) {
                    $sql .= ' ' . $element['statement'] . ' ';
                } else {
                    $sql = ' WHERE ';
                }
                $sql .= $element['key'] .'='.$element['value'];
            }
        } return $sql;
    }

    protected  function orderToSQL($order) {
        $sql = "";

        if (is_array($order)) {
            foreach ($order as $element) {
                if (strlen($sql)!=0) {
                    $sql .= ' ' . $element['statement'] . ' ';
                } else {
                    $sql = ' ORDER BY ';
                }
                $sql .= $element['key'] .'='.$element['value'];
            }
        } return $sql;
    }

    protected function appendWHERE($key, $value, $where = array(),  $statement = " AND ") {
        $where[] = array('key'=>$key, 'value'=>$value, 'statement'=>$statement);
        return $where;
    }

} 