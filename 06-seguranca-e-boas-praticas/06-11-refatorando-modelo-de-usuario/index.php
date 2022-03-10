<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("06.11 - Refatorando modelo de usuário");

require __DIR__ . "/../source/autoload.php";

/*
 * [ find ]
 */
fullStackPHPClassSession("find", __LINE__);
$model = new \Source\Models\User();

$user = $model->find("id = :id", "id=1");

var_dump($user);


/*
 * [ find by id ]
 */
fullStackPHPClassSession("find by id", __LINE__);

$user2 = $model->findById(5);

var_dump($user2);

/*
 * [ find by email ]
 */
fullStackPHPClassSession("find by email", __LINE__);

$user3 = $model->findByEmail("sidney38@email.com.br");

var_dump($user3);

/*
 * [ all ]
 */
fullStackPHPClassSession("all", __LINE__);

$list = $model->all(2, 3);

var_dump($list);


/*
 * [ save ]
 */
fullStackPHPClassSession("save create", __LINE__);

$user = $model->bootstrap("Jasson", "Stathan", "jason_lpc@gmail.com", "123456");

if ($user->save()) {
    echo message()->success("Cadastro efetivado com sucesso!");
}else {
    echo $user->message();
    echo message()->info($user->message()->json());
}

/*
 * [ save update ]
 */
fullStackPHPClassSession("save update", __LINE__);

$user = (new \Source\Models\User())->findById(81);



$user->first_name = "Frederick";
$user->last_name = "Johnson";
$user->password = passwd(123456);

if ($user->save()) {
    echo message()->success("Cadastro atualizado com sucesso!");
}else {
    echo $user->message();
    echo message()->info($user->message()->json());
}

var_dump($user);