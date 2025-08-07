<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use League\Csv\Reader; // Lembre-se de importar a classe Reader

class ProcessCsvFile implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public string $filePath;

    /**
     * Crie uma nova instância do job.
     */
    public function __construct(string $filePath)
    {
        $this->filePath = $filePath;
    }

    /**
     * Execute o job.
     */
    public function handle(): void
    {
        // 1. Use o try-catch para lidar com erros na fila
        try {
            // 2. Garanta que o arquivo existe
            if (!file_exists(storage_path('app/' . $this->filePath))) {
                Log::error('Erro: O arquivo CSV não foi encontrado no caminho: ' . $this->filePath);
                return;
            }

            // 3. Lê o arquivo CSV
            $csv = Reader::createFromPath($this->filePath, 'r');
            $csv->setHeaderOffset(0);

            $records = $csv->getRecords();

            // 4. Use uma transação de banco de dados para evitar dados inconsistentes
            DB::beginTransaction();

            foreach ($records as $record) {
                // Aqui você insere a lógica para salvar no banco de dados.
                // Exemplo: Supondo que você tenha um modelo Usuario
                // E que as colunas do CSV sejam 'nome' e 'email'
                User::create([
                    'nome' => $record['nome'],
                    'email' => $record['email'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            DB::commit();

            Log::info('Arquivo CSV processado com sucesso: ' . $this->filePath);

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Falha ao processar o arquivo CSV: ' . $this->filePath . ' Erro: ' . $e->getMessage());

            // A exceção será capturada pela fila e o job poderá ser re-tentado
            throw $e;
        }
    }
}