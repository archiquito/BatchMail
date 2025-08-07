<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Log;
use Illuminate\Foundation\Http\FormRequest;

class EmailListRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'max:255'],
            'csv' => ['required', 'file', 'mimes:csv']
        ];
    }

    public function processCsv(string $filePath)
    {
        $handle = fopen($filePath, 'r');
        if ($handle === false) {
            Log::error("Erro: Não foi possível abrir o arquivo: " . $filePath);
            return;
        }
        $items = [];
        $header = ['name', 'email'];

        while (($row = fgetcsv($handle)) !== false) {
            if ($row[0] !== '' && !filter_var($row[1], FILTER_VALIDATE_EMAIL)) {
                continue;
            }
            $data = array_combine($header, $row);
            $items[] = $data;
        }
        fclose($handle);

        return $items;
    }
}
