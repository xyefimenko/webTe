<?php

require_once "classes/helper/Database.php";
require_once "classes/UserAction.php";
require_once "classes/Lectures.php";


class ActionsController
{
    private PDO $conn;
    private $together = ["name" => "", "joined" => "", "left" => ""];


    public function findNameFromTogethe($name){
       if($this->together["name"] == $name){
           echo $this->together["name"];
           return true;
       } else {
           echo "netu";
       }
        return false;
    }
    /**
     * @return mixed
     */
    public function getTogether()
    {
        return $this->together;
    }

    /**
     * @param mixed $together
     */
    public function setTogether($together): void
    {
        $this->together = $together;
    }


    public function __construct()
    {
        $this->conn = (new Database())->getConnection();
    }

//    public function getAllForMain(){
//        $stmt = $this->conn->prepare("select distinct name from user_actions;");
//        $stmt->execute();
//        $actions = $stmt->fetchAll(PDO::FETCH_CLASS, "UserAction");
//
//
//        return$actions;
//    }

    public function getAllFromActions(){
        $stmt = $this->conn->prepare("select name, action, timestamp from user_actions;");
        $stmt->execute();
        $actions = $stmt->fetchAll(PDO::FETCH_CLASS, "UserAction");


        foreach ($actions as $action) {
            $stmt2 = $this->conn->prepare("select timestamp from user_actions where name = 'Nazarii Khmil' and action  = 'Left';");
            $stmt2->execute();
            $result = $stmt2->fetchAll(PDO::FETCH_CLASS, "UserAction");
//            var_dump($result);
        }
//            var_dump($result);
//            if($this->findNameFromTogethe($action->getName())){
//                if($action->getAction() == "Joined"){
//                    $user_array = ["name" => $action->getName(), "joined" => $action->getTimeStamp(), "left" => null];
//                } elseif ($action->getAction() == "Left"){
//                    $user_array = ["name" => $action->getName(), "joined" => $action->getTimeStamp(), "left" => $action->getTimeStamp()];
//                }
//            }
//            $user_array = ["name" => $action->getName(), "joined" => $action->getTimeStamp(), "left" => $action->getTimeStamp()];
//            $this->together = $this->together + $user_array;
//            var_dump($this->together);


//            var_dump($a);
//            if($action->getAction() == "Joined") {
//                $action->setJoinedTime($action->getTimestamp());
////                echo $action->getJoinedTime();
//            } elseif ($action->getAction() == "Left"){
//                $action->setLeftTime($action->getTimestamp());
//                echo $action->getLeftTime() . " and " . $action->getJoinedTime() . " next ";

//                $left_time_ts = strtotime($action->getLeftTime());
//                $joined_time_ts = strtotime($action->getJoinedTime());
//                echo $joined_time_ts . " + " . $left_time_ts. " ========";
//                $diff_seconds = $left_time_ts - $joined_time_ts;
//                $diff_hours = $diff_seconds / 3600;
//                echo $diff_hours. " ";

//                echo $action->getLeftTime() - $action->getJoinedTime();
//            }


        //return $action;
    }

    public function getUserJoinedTime(){
        $stmt = $this->conn->prepare("select name, action, timestamp from user_actions;");
//        $stmt->bindParam(":email", $email, PDO::PARAM_STR);
        $stmt->execute();
        $actions = $stmt->fetchAll(PDO::FETCH_CLASS, "UserAction");
//
//        foreach ($actions as $a){
//            echo $a->getName(). " ===== ";
//        }
        return $actions;
    }

}
