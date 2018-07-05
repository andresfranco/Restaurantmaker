<?php
use Phalcon\Mvc\Model\Resultset\Simple as Resultset;
class Robot extends \Phalcon\Mvc\Model {
    public static function towersp($param1='',$param2='') {
        $sql = "CALL testprocedure("."'".$param1."','".$param2."'".");";
        $robot = new Robot();
        return new Resultset(null, $robot, $robot->getReadConnection()->query($sql));
    }
}
