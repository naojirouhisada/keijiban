<?php

try{
    $pdo = new PDO('mysql:host=localhost;dbname=keijiban;charset=utf8','root','');
}catch (PDOException $e) {
    exit('データベース接続失敗。'.$e->getMessage());
}

function db_select($query){
    $result = array();
    global $pdo;
    $stmt = $pdo->query($query);
    while($row = $stmt -> fetch(PDO::FETCH_ASSOC)) {
        $result[] = $row;
    }
    return $result;
};


function db_insert($query){
    global $pdo;
    $stmt = $pdo->prepare($query);
    $flag = $stmt->execute();
}


function db_update($query){
    global $pdo;
    $stmt = $pdo->prepare($query);
    $flag = $stmt->execute();
}
?>

