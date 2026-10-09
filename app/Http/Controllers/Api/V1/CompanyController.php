<?php
namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\V1\Controller;
use App\Http\Requests\Api\V1\StoreCompanyRequest;
use App\Http\Resources\Api\V1\CompanyResource;
use App\Services\CompanyService;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class CompanyController extends Controller
{
    protected CompanyService $companyService;

    public function __construct(CompanyService $companyService)
    {
        $this->companyService = $companyService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = $this->companyService->getAllCompanies();
        return CompanyResource::collection($companies);
    } 

    /**
     * Create a resource.
     */
    public function store(StoreCompanyRequest $request): JsonResponse
    {
        // İstek zaten StoreCompanyRequest ile valide edildiği için güvenle kullanabiliriz
        $company = $this->companyService->createCompany($request->validated());

        return (new CompanyResource($company))
            ->additional([
                'message' => 'Şirket başarıyla oluşturuldu.'
            ])
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }
}