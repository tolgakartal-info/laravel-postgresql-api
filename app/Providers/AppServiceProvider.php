<?php

namespace App\Providers;

use Dedoc\Scramble\Scramble;
use Illuminate\Support\Facades\Gate;
use Dedoc\Scramble\Support\Generator\OpenApi;
use Dedoc\Scramble\Support\Generator\SecurityScheme;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    { 
        // Scramble arayüzüne Sanctum / Bearer Token desteğini güvenli ve hatasız ekler
        Scramble::afterOpenApiGenerated(function (OpenApi $openApi) {
            $openApi->secure(
                SecurityScheme::http('bearer', 'JWT')
            );
        });

        Gate::define('viewApiDocs', function ($user = null) {
            // Geliştirme aşamasında herkesin görmesine izin vermek için:
            return true; 
            
            // Veya sadece belirli e-postalara izin vermek için:
            // return in_array($user?->email, ['admin@example.com']);
        });
    }
}
