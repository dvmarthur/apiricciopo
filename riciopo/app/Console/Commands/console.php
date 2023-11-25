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


        // Caminho para o arquivo CSV
        $csvFilePath = 'planilha/catalogo_isapaB2B (1).csv';

        // Abre o arquivo CSV para leitura
        $file = fopen($csvFilePath, 'r');

        // Verifica se o arquivo foi aberto com sucesso
        if ($file) {
            // Loop para ler cada linha do arquivo
            while (($data = fgetcsv($file, null, ',')) !== FALSE) {


               // die(var_dump($data));
                // $data é um array contendo os dados da linha atual

                // Aqui, você pode realizar operações com os dados, se necessário
                // Neste exemplo, vamos apenas imprimir os dados na tela
                echo "Sku: " . $data[0] . "\n";
                echo "Descrição: " . $data[1] . "\n";
                echo "Sessão: " . $data[2] . "\n";
                // ... adicione mais campos conforme necessário

               // echo "<hr>"; // Adiciona uma linha horizontal para separar os registros
            }

            // Fecha o arquivo após a leitura
            fclose($file);
        } else {
            // Se o arquivo não puder ser aberto, exibe uma mensagem de erro
            echo "Erro ao abrir o arquivo CSV.";
        }


        return Command::SUCCESS;
    }
}
