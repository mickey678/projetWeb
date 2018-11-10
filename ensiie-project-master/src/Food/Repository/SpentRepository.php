<?php
namespace Spent\Food;
include_once '../../src/Adapter/DatabaseFactory.php';
class Spent{

  public function __construct()
  {
      $this->dbAdapter = new \Adapter\DatabaseFactory();
      $this->dbAdapterFunction= $this->dbAdapter->getDbAdapter();
  }
  public function seeAllWasteProducts(){
    try{
        $statement=$this->dbAdapterFunction->prepare('select * from "waste"');
        //$statement->bindParam('table',$table);
        $statement->execute();
        $row = $statement->fetchAll();
        return  $row;
    }catch(PDOException $ex){
        echo $ex->getMessage();
    }
  }
  public function seeAllProducts(){
    try{
        $statement=$this->dbAdapterFunction->prepare('select * from "food"');
        //$statement->bindParam('table',$table);
        $statement->execute();
        $row = $statement->fetchAll();
        return  $row;
    }catch(PDOException $ex){
        echo $ex->getMessage();
    }
  }

}


?>