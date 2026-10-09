<?php

namespace App\Providers;

use Dedoc\Scramble\Scramble;
use Illuminate\Support\Facades\Gate;
use Dedoc\Scramble\Support\Generator\OpenApi;
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
    // Canlıda veya lokalde kimlerin /docs/api adresini görebileceğini buradan ayarlarsınız
    Scramble::afterOpenApiGenerated(function (OpenApi $openApi) {
        // Ekstra global ayarlar yapılabilir
    });

    Gate::define('viewApiDocs', function ($user = null) {
        // Geliştirme aşamasında herkesin görmesine izin vermek için:
        return true; 
        
        // Veya sadece belirli e-postalara izin vermek için:
        // return in_array($user?->email, ['admin@example.com']);
    });
}
}
