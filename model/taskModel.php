<?php



class taskModel{
  /*
  public static function getTaskList($pagetest = 1){
    $offset = $pagetest;
    $taskList = array();
    // подключитьс€ к базе
    $db = db::getConnection();
    // запрос к базе на получени€ данных
    $sql = 'SELECT * FROM task ORDER BY time DESC LIMIT 3 OFFSET ' . $offset;
    
    $result = $db->query($sql);
    
    $i = 0;
    while ($row = $result->fetch()){
      $taskList[$i]['id'] = $row['id'];
      $taskList[$i]['name'] = $row['name'];
      $taskList[$i]['email'] = $row['email'];
      $taskList[$i]['text'] = $row['text'];
      $taskList[$i]['image'] = $row['image'];
      $taskList[$i]['time'] = $row['time'];
      $taskList[$i]['status'] = $row['status'];
      $i++;
    }
    return $taskList;
  }
  */
  public static function getTaskList ($page){
    
    $page = intval($page);
    $offset = ($page - 1) * 3; // ƒобавить -1
    
    $taskList = array();
    // подключитьс€ к базе
    $db = db::getConnection();
    // запрос к базе на получени€ данных
    $sql = 'SELECT * FROM task ORDER BY time DESC LIMIT 3 OFFSET ' . $offset;
    
    $result = $db->query($sql);
    
    $i = 0;
    while ($row = $result->fetch()){
      $taskList[$i]['id'] = $row['id'];
      $taskList[$i]['name'] = $row['name'];
      $taskList[$i]['email'] = $row['email'];
      $taskList[$i]['text'] = $row['text'];
      $taskList[$i]['image'] = $row['image'];
      $taskList[$i]['time'] = $row['time'];
      $taskList[$i]['status'] = $row['status'];
      $i++;
    }
    return $taskList;
  }
  
  public static function addTask(){
    
    
    if(isset($_POST)){
    $name = '';
    $email = '';
    $text = '';
    $image = '';
    $status = '1';
    
    $db = db::getConnection();
    //  остыль, попробовать заменить
    $sql = 'SELECT MAX(id) FROM task';
    $id = $db->query($sql);
    $id = $id->fetch();
    $imagea = $_SERVER['DOCUMENT_ROOT'] . "/upload/{$id[0]}.jpeg";
    
    $image = "/upload/{$id[0]}.jpeg";
    
    //
    if (is_uploaded_file($_FILES['image']['tmp_name'])){
      move_uploaded_file($_FILES['image']['tmp_name'], $imagea);
    }
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $text = $_POST['text'];
    
    
    
    $sql = 'INSERT INTO task (name, email, text, image, status) '
      . 'VALUES (:name, :email, :text, :image, :status)';
      
      $result = $db->prepare($sql);
      
      $result->bindParam(':name', $name, PDO::PARAM_STR);
      $result->bindParam(':email', $email, PDO::PARAM_STR);
      $result->bindParam(':text', $text, PDO::PARAM_STR);
      $result->bindParam(':image', $image, PDO::PARAM_STR);
      $result->bindParam(':status', $status, PDO::PARAM_STR);
      
      
      $result->execute();
      unset($_POST['submit']);
      return true;
    }else{
      return false;
    }
      
    return true;
  }
  
  public static function upTask($id){
    
    $db = db::getConnection();
    
    $result = $db->query('SELECT * FROM task WHERE id=' .$id);
    $result->setFetchMode(PDO::FETCH_ASSOC);
    $row = $result->fetch();
    
    
    return $row;
  }
  
  public static function getTotalTask(){
    
    $db = db::getConnection();
    
    $result = $db->query('SELECT count(id) AS count FROM task');
    
    $result->setFetchMode(PDO::FETCH_ASSOC);
    $row = $result->fetch();
    
    return $row['count'];
  }
}