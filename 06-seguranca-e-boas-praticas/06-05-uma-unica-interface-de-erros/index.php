<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("06.05 - Uma única interface de erros");

require __DIR__ . "/../source/autoload.php";

/*
 * [ message class ] Uma classe padrão para reportar ao usuário
 */
fullStackPHPClassSession("message class", __LINE__);

$message = new \Source\Core\Message();
$array = [$message, get_class_methods($message)];

echo "<pre>",print_r($array, true),"</pre>";
/*
 * [ message types ] Métodos para cada tipo de mensagem
 */
fullStackPHPClassSession("message types", __LINE__);

$error = $message->success("Essa é uma mensagem de sucesso!");

$array1 = [
    $message->getType(),
    $message->getText(),
    $message->render()
];

echo "<pre>",print_r($array1, true),"</pre>";

echo $message->info("Essa é uma mensagem renderizada !");
echo $message->success("Essa é uma mensagem renderizada !");
echo $message->warning("Essa é uma mensagem renderizada !");
echo $message->error("Essa é uma mensagem renderizada !");

/*
 * [ json message ] Mudando o padrão de retorno
 */
fullStackPHPClassSession("json message", __LINE__);

echo $message->info($message->error("Essa é uma mensagem renderizada")->json());

/*
 * [ flash message ] Uma mensagem via sessão para refresh de navegação
 */
fullStackPHPClassSession("flash message", __LINE__);

$session = new \Source\Core\Session();

$message->success("Essa é uma mensagem flash!")->flash();

//if ($flash = $session->flash()) {
//    echo $flash;
//    var_dump([
//       $flash->getType(),
//       $flash->getText()
//    ]);
//}

$array3 = [
    $_SESSION,
    $session->all()
];

echo "<pre>",print_r($array3, true),"</pre>";