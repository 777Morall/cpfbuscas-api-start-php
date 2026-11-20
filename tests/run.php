<?php
declare(strict_types=1);
require __DIR__.'/../src/Client.php';
$checks=0;
function check(bool $ok): void { global $checks; if (!$ok) throw new RuntimeException('Teste falhou'); $checks++; }
$seen=[];
$fake=static function($method,$url,$headers) use (&$seen) { $seen=[$method,$url,$headers]; return [200,'{"fixture":true}',null]; };
$api=new Client('fake-token',1000000,'https://cpfbuscas.net/api/v1',$fake);
check($api->query('cnpj',['cnpj'=>'00000000000000'])===['fixture'=>true]);
check($seen[0]==='GET' && str_ends_with($seen[1],'/query/cnpj?cnpj=00000000000000'));
check(in_array('Authorization: Bearer fake-token',$seen[2],true));
$api->query('endereco',['uf'=>'SP','logradouro'=>'Rua Teste & Exemplo']);
check(str_contains($seen[1],'logradouro=Rua%20Teste%20%26%20Exemplo'));
foreach ([['cnpj',[]],['inexistente',[]],['cep',['cep'=>[]]],['cep',['cep'=>'00000000','extra'=>'x']]] as [$module,$params]) {
    try { $api->query($module,$params); check(false); } catch (InvalidArgumentException) { check(true); }
}
foreach ([401,403,404,422,429,503] as $status) {
    $count=0;
    $bad=new Client('fake',20,'https://cpfbuscas.net/api/v1',static function() use ($status,&$count) { $count++; return [$status,'{}','60']; });
    try { $bad->me(); check(false); } catch (ApiException $e) { check($e->status===$status && $e->retryAfter==='60' && $count===1); }
}
try { (new Client('fake',20,'https://cpfbuscas.net/api/v1',fn()=>[200,'<html>',null]))->me(); check(false); } catch (RuntimeException $e) { check($e->getMessage()==='Resposta JSON inválida.'); }
try { new Client('fake',20,'https://example.com'); check(false); } catch (InvalidArgumentException) { check(true); }
echo "$checks verificações passaram; nenhum acesso à API real.\n";
