<?php

namespace App\Services;

use App\Models\Company;

class CompanyViewBuilderService
{
    public function buildViewData(Company $company, ?array $data = []): array
    {
        return [
            'hero' => $company->heroes,
            'products' => $company->products,
            'skills' => $company->skills,
            'services' => $company->services,
            'portfolio' => $company->projects,
            'info' => $company->infoWhy,
            'details' => $company->details,
            'about' => $company->about,
            'contacts' => $company->contacts,
            'product' => $data['elements']['Produtos'] ?? null,
            'experiencia' => $data['elements']['Experiência'] ?? null,
            'parceiros' => $data['elements']['Parceiros'] ?? null,
            'clients' => $data['elements']['Clientes'] ?? null,
            'premios' => $data['elements']['Premios'] ?? null,
            'works' => $data['elements']['Trabalhos'] ?? null,
            'whatsapp' => $company->packages->where('is_active', true)->where('package_name', 'Whatsapp')->first(),
            'phonenumber' => $company->contacts->first(),
            'companies' => $company->termpbHasCompany ? $company->termpbHasCompany->load('termsPBs') : null,
            'termos' => $company->termsCompany,
            'companyName' => $company,
            'color' => $company->color,
            'fundoAbout' => $company->fundos->where('tipo', 'AboutMain')->first(),
            'heroImage' => $company->fundos->where('tipo', 'Hero')->first(),
            'fundo' => $company->fundos->where('tipo', 'AboutSecund')->first(),
            'start' => $company->fundos->where('tipo', 'Start')->first(),
            'footer' => $company->fundos->where('tipo', 'Rodapé')->first(),
        ];
    }

    public function resolveView(Company $company, string $pageType = 'home'): string
    {
        return match ($company->companybusiness) {
            'Portfolio' => "themes.default.pages.{$pageType}",
            'Product'   => "site.pages.{$pageType}",
            'Service'   => "themes.service.pages.{$pageType}",
            default     => "themes.default.landing",
        };
    }
}