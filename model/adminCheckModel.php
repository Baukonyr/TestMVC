<?php


class adminCheckModel{
  
  public static function adminCheck(){
    
    if(isset($_POST['checkAdmin'])){
      
      $login = '';
      $password = '';
      
      $login = $_POST['login'];
      $password = $_POST['password'];
      
      $db = db::getConnection();
      
      $sql = 'SELECT id, login FROM t WHERE login = :login AND password = :password';
      
      $result = $db->prepare($sql);
      $result->bindParam(':login', $login, PDO::PARAM_STR);
      $result->bindParam(':password', $password, PDO::PARAM_STR);
      $result->execute();
      
      $user = $result->fetch();
      
      return $user;
    }else{
      return false;
    }
  }
}