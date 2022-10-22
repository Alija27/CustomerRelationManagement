<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('role', function ($role) {
            return "<?php if (auth()->user()->role == $role) { ?>";
        });
        Blade::directive('endrole', function () {
            return "<?php } ?>";
        });
        Blade::directive('name', function ($name) {
            return "<?php echo ucwords($name); ?>";
        });
    }
}
