<?php

  /**
  * Управления объектом таск
  *
  **/
class taskController{
  
  /**
  * 
  *
  **/

  public function indexAction($page = 1){
    
    
    
    $taskList = taskModel::getTaskList($page);
    $total = taskModel::getTotalTask();
    
    
    $pagination = new Pagination($total, $page, 3, 'page-');
    
    
    require_once (ROOT . '/view/index.php');
    
    
    return true;
  }

}
?>