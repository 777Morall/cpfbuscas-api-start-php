<?php
declare(strict_types=1);
require __DIR__.'/src/Client.php';
$plan=json_decode(file_get_contents(__DIR__.'/plan.json'),true,512,JSON_THROW_ON_ERROR);
function client(): Client {
    global $plan;
    return new Client(getenv('CPFBUSCAS_TOKEN') ?: '', $plan['rpm'], getenv('CPFBUSCAS_BASE_URL') ?: 'https://cpfbuscas.net/api/v1');
}
set_exception_handler(static function(Throwable $e): void {
    fwrite(STDERR,$e->getMessage().PHP_EOL);
    if ($e instanceof ApiException && $e->status===429) fwrite(STDERR,'Aguarde; limite compartilhado entre todas as chaves. Retry-After: '.($e->retryAfter ?? 'não informado').PHP_EOL);
    exit(1);
});
