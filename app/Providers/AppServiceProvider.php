<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\Paginator;
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
        // page active display
        Blade::directive('active', function ($expression) {
            return "<?php echo request()->routeIs($expression) ? 'active' : ''; ?>";
        });

        // default fetch the logged profile data
        View::composer(['vendor.layouts.partials.header', 'admin.layouts.partials.header'], function ($view) {
                $view->with('user', auth()->user());
            });
        
        // page theme
        Paginator::useBootstrapFive(); 
    }
}
