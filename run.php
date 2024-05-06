<?php

if (count($argv) != 3) {
    echo "Por favor, forneça exatamente dois parâmetros.\n";
    exit(1);
}

$primeiro =  intval($argv[1]);
$ultimo =   intval($argv[2]);

if (!is_integer($primeiro) || !is_integer($ultimo)) {
    echo "Fornece somente números";
    exit(1);
}



date_default_timezone_set('America/Sao_Paulo');

if (file_exists(__DIR__ . "/satis.json")) {

    $data = json_decode(file_get_contents(__DIR__ . "/satis.json"));

    $result = "LOG EM " . date("d/m/Y - H:i\n\n");

    for ($key = 0; $key <= count($data->repositories); $key++) {

        if ($key >= $primeiro && $key <= $ultimo) {
            $result .= $data->repositories[$key]->name . ":\n";
            exec("php bin/satis  build satis.json /app/repo {$data->repositories[$key]->name}", $output) . "\n\n";
            $result .= implode("\n", array_slice($output, 0, 7));
            $result .= "\n-----------------------------------------\n\n";
        }
    }

    file_put_contents(__DIR__ . '/logs/log_' . date("d-m-Y") . '.log', $result, FILE_APPEND);
}
