<?php

use Source\Models\User;

require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("06.08 - Camada de manipulação pt3");

require __DIR__ . "/../source/autoload.php";

/*
 * [ validate helpers ] Funções para sintetizar rotinas de validação
 */
fullStackPHPClassSession("validate", __LINE__);

$message = new \Source\Core\Message();

$email = "cursos@upinside.com";

if (!is_email($email)) {
    echo $message->error("Email");
}else {
    echo $message->success("Email");
}


$passwd = "12345678123456781234567812345678123456781";

echo mb_strlen($passwd);

if (!is_passwd($passwd)) {
    echo $message->error("Senha");
}else {
    echo $message->success("Senha");
}
/*
 * [ navigation helpers ] Funções para sintetizar rotinas de navegação
 */
fullStackPHPClassSession("navigation", __LINE__);

var_dump(url("/blog/titulo-do-artigo"));
var_dump(url("blog/titulo-do-artigo"));

if (empty($_GET)) {
    redirect("?f=true");
}


/*
 * [ class triggers ] São gatilhos globais para criação de objetos
 */
fullStackPHPClassSession("triggers", __LINE__);


var_dump(user()->load(1));

echo message()->error("Esse é um erro!");
echo message()->warning("Esse é um aviso");

// session("User", user()->load(2));

// var_dump(session()->all());
