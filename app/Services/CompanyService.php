<?php

namespace App\Services;

use App\Repositories\CompanyRepository;
use Illuminate\Contracts\Cache\Repository as CacheRepository;
use App\Models\Company;
use Illuminate\Support\Facades\Log;

class CompanyService
{
    protected CompanyRepository $repo;
    protected CacheRepository $cache;

    public function __construct(CompanyRepository $repo, CacheRepository $cache)
    {
        $this->repo = $repo;
        $this->cache = $cache;
    }

    /**
     * Busca a company pelo hash, usando cache (contrato de cache para garantir resolução do container).
     */
    public function getByHash(string $hash): Company
    {
        $cacheKey = "company:hash:{$hash}";

        return $this->cache->remember($cacheKey, now()->addHour(), function () use ($hash) {
            return $this->repo->findByHashOrFail($hash);
        });
    }

    /**
     * Prepara os dados usados pela view home e retorna array com company e elements.
     */
    public function getCompanyDataForHome(Company $company): array
    {
        try {
            $company->load([
                'heroes',
                'products',
                'infoWhy',
                'details',
                'about',
                'contacts',
                'color',
                'fundos',
                'packages',
                'termsCompany',
                'termpbHasCompany.termsPBs',
                'elements'
            ]);

            $elements = $company->elements->whereIn('element', ['Produtos','Experiência','Parceiros','Clientes'])->keyBy('element');

            return ['company' => $company, 'elements' => $elements];
        } catch (\Throwable $th) {
            Log::error('CompanyService@getCompanyDataForHome: ' . $th->getMessage());
            // rethrow ou retorna array vazio dependendo do teu fluxo
            throw $th;
        }
    }
}