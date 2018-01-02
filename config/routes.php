<?php

  return array(
  '/form/authorization' => 'check/form', // view -> formAuthorization.php || checkController and formAction
  '/authorization' => 'check/authorization', // view -> form else index.php || checkController and auhorizationAction = (Model check) getCheckAdmin
  '/addtask' => 'task/addTask', // view -> taskList.php || taskController and addTaskAction = (Model task) getAddTask
  '/unlock' => 'administrator/unlock', // unset
  '/page-([0-9]+)' => 'task/index/$1', // пагинация
  '/update/([0-9]+)' => 'task/update/$1', // view -> formTask.php || taskController and updateAction (Model task) getTaskId 
  '' => 'task/index' // view -> index.php || taskController and indexAction = (Model task) getTaskList
  
  );
  
?>