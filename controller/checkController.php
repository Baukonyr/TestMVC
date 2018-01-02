<?php

class administratorController{
  
  public function adminAction(){
    
    $check = adminCheckModel::adminCheck();
    
    if($check){
      header('Location: http://localhost/adminTaskList');
    }else{
      
    require_once(ROOT . '/view/adminForm.php');
    }
    return true;
  }
  
  public function adminTaskListAction($page = 1){
    
    $taskList = taskModel::taskList($page);
    $total = taskModel::getTotalTask();
    
    
    $pagination = new Pagination($total, $page, 3, 'page-');
    //var_dump($taskList);
    require_once(ROOT . '/view/adminTaskList.php');
    
    return true;
  }
  
  public function unlockAction(){
    unset($_SESSION['id']);
    
    header('Location: http://localhost');
  }
}

?>