<?php 

require 'databasetmp.php';

$query = "SELECT * FROM gebruikers";
$statement = $pdo->prepare($query);

$statement->execute();

// $users = $statement->fetchAll(PDO::FETCH_OBJ);
// $users = $statement->fetchAll(PDO::FETCH_NUM);
// $users = $statement->fetchAll(PDO::FETCH_ASSOC);
$users = $statement->fetchAll(PDO::FETCH_BOTH);


if(count($users) > 0){

    
    foreach ($users as $user){
        echo '<br>' . 'id: '. $user['id'] . ", username: " . $user[1] .
        ", password: " . $user['password'] . '<br>';
    }

        // ASSOC
    // foreach ($users as $user){
    //     echo '<br>' . 'id: '. $user['id'] . ", username: " . $user['username'] .
    //     ", password: " . $user['username'] . '<br>';
    // }

    // Numeric
    // foreach ($users as $user){
    //     echo '<br>' . 'id: '. $user[0] . ", username: " . $user[1] .
    //     ", password: " . $user[2] . '<br>';
    // }

    // obj
    // foreach ($users as $user){
    //     echo '<br>' . 'id: '. $user->id . ", username: " . $user->username .
    //     ", password: " . $user->password . '<br>';
    // }
}

$pdo = null;

?>