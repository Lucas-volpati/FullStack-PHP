<?php



require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("06.12 - Efetuando cadastro de usuário");



require __DIR__ . "/../source/autoload.php";

use Source\Core\Session;

$session = new Session;

$session->set("cadastro", 1);

$session->regenerate();



/*
 * [ register ] Uma rotina de cadastro blindada contra ataques XSS e CSRF.
 */
fullStackPHPClassSession("register", __LINE__);

require __DIR__ . "/form.php";

$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);

if ($post) {
    $data = (object) $post;

    if (!csrf_verify($post)) {
        $error = message()->warning("Erro ao enviar, favor tentar submeter novamente!");
    }else {
        $user = new Source\Models\User();
        $user->bootstrap(
            $data->first_name,
            $data->last_name,
            $data->email,
            $data->password
        );

        if (!$user->save()) {
            echo $user->message();
        }else {
            echo $user->message()->success("Cadastro realizado com sucesso!");
            // unset($data);
        }

        var_dump($user->data());
    }

    var_dump($data, $error, $data->csrf, session()->csrf_token);
}