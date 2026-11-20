<?php
declare(strict_types=1);
require __DIR__.'/../bootstrap.php';
$module=$argv[1] ?? '';
if ($module==='') { fwrite(STDERR,"Uso: php examples/consulta.php me | modulo campo=valor\n"); exit(1); }
$params=[];
foreach (array_slice($argv,2) as $arg) {
    if (!str_contains($arg,'=')) throw new InvalidArgumentException('Use campo=valor.');
    [$key,$value]=explode('=',$arg,2); $params[$key]=$value;
}
$api=client();
$result=$module==='me' ? $api->me() : $api->query($module,$params);
echo json_encode($result,JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE|JSON_THROW_ON_ERROR).PHP_EOL;
