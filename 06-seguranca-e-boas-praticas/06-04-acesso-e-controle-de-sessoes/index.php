<?php

use Source\Core\Session;

require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("06.04 - Acesso e controle de sessões");

require __DIR__ . "/../source/autoload.php";

/*
 * [ session ] Uma classe statless para manipulação de sessões
 */
fullStackPHPClassSession("session", __LINE__);

$session = new Source\Core\Session();

$user = (new \Source\Models\User())->load(1);

//var_dump($user->id);

$session->set("login", $user->id);
//$session->regenerate();

// $session->set("stats", ["name", "job"]);

// if (!$session->has("login")) {
//     echo "<p>Logar-se</p>";
//     $user = (new \Source\Models\User())->load(1);
//     $session->set("login", $user->data());
// }



if (isset($_SESSION["login"])) {
    echo "A sessão existe!";
}else {
    echo "A sessão não existe";
}


var_dump(
    $_SESSION,
    $session->login
    //$session->all(),
    // session_id(),

    // $session->stats
);