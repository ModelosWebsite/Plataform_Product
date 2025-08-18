<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;

class UploadGoogleDrive
{
    public  string $company;
    public string $companynif;
    public string $folder;
    public  $file;
    public string  $url;
    public function __construct($company, $companynif, $folder, $file)
    {
        $this->company = $company;
        $this->companynif = $companynif;
        $this->folder = $folder;
        $this->file = $file;

        $this->url = 'https://xzero.live/api/send/file';
    }

    public  function sendFile()
    {
        try {

            $response = Http::withHeaders([
                'accept' => 'application/json'
            ])->attach(
                'file',
                file_get_contents($this->file->getRealPath()),
                $this->file->getClientOriginalName()
            )->post($this->url, [
                'company' => $this->company,
                'companynif' => $this->companynif,
                'folder' => $this->folder,
            ]);
            
            return $response['path'];
        } catch (\Throwable $th) {
            Log::error('errors', [
                'error' => $th->getMessage(),
                'line' => $th->getLine(),
                'file' => $th->getFile()
            ]);
            return null;
        }
    }
}
