<?php

namespace App\Services;

use App\Models\Company;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;
use Exception;

class CompanyService
{
    /**
     * Tüm şirketleri liste halinde getirir.
     * İsteğe bağlı olarak sayfalama (pagination) da eklenebilir.
     */
    public function getAllCompanies(): Collection
    {
        // Tüm şirketleri veritabanından çeker
        return Company::latest()->get();
    }

    /**
     * Yeni bir şirket oluşturur.
     */
    public function createCompany(array $data): Company
    {
        return DB::transaction(function () use ($data) {
            // İleride burada ek işlemler (örn: varsayılan rol atama, hoşgeldin maili vb.) yapılabilir.
            
            $company = Company::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'tax_number' => $data['tax_number'],
                'phone' => $data['phone'] ?? null,
            ]);

            return $company;
        });
    }
}