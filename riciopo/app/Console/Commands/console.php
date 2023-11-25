<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\MercadoLivreController;

class console extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:console';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {


       // Caminho para o arquivo TSV
$tsvFilePath = 'planilha/planilha.tsv';

// Abre o arquivo TSV para leitura
$file = fopen($tsvFilePath, 'r');

// Verifica se o arquivo foi aberto com sucesso
if ($file) {
    // Lê a primeira linha que geralmente contém os cabeçalhos das colunas
    $headers = fgetcsv($file, 1000, "\t");

    // Índices das colunas desejadas
    $columnsToPrint = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16];

    // Loop para ler cada linha do arquivo
    while (($data = fgetcsv($file, 1000, "\t")) !== FALSE) {
        // $data é um array contendo os dados da linha atual

        // Itera sobre os índices das colunas desejadas e imprime as informações
        foreach ($columnsToPrint as $index) {
            echo "$headers[$index]: $data[$index]\n";
        }

       // echo "<hr>"; // Adiciona uma linha horizontal para separar os registros
    }

    // Fecha o arquivo após a leitura
    fclose($file);
} else {
    // Se o arquivo não puder ser aberto, exibe uma mensagem de erro
    echo "Erro ao abrir o arquivo TSV.";
}


        return Command::SUCCESS;
    }
}
