<?php

namespace App\Services;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Log;

class GoogleDriveService
{
    protected string $baseUrl;
    protected array $headers;

    public function __construct()
    {
        $this->baseUrl = rtrim(env('XZERO_FILE_URL'));
        $this->headers = [
            'Authorization' => 'Bearer ' . env('KYTUTES_API_TOKEN'),
            'Accept'        => 'application/json',
        ];
    }
    /**
     * Envia um ficheiro para a API do xzero
     *
     * @param UploadedFile|string $file
     * @param array $extraData
     * @return Response
     */
    static function sendFile($file, array $extraData = []): Response
    {
        try {
            if ($file instanceof UploadedFile) {
                $filePath = $file->getRealPath();
                $fileName = $file->getClientOriginalName();
            } else {
                $filePath = $file;
                $fileName = basename($file);
            }

            return Http::withHeaders($this->headers)
            ->attach('file', file_get_contents($filePath), $fileName)
            ->post($this->baseUrl, $extraData);
        } catch (\Throwable $th) {
            Log::error("Enviar Ficheiro no Google Drive", [
                "message" => $th->getMessage(),
                "file" => $th->getFile(),
                "line" => $th->getLine(),
            ]);
        }
    }
}