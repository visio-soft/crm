<?php

namespace Modules\CRM\Providers;

use Illuminate\Support\ServiceProvider;

class CRMServiceProvider extends ServiceProvider
{
    protected string $moduleName = 'CRM';
    protected string $moduleNameLower = 'crm';

    public function boot(): void
    {
        $this->registerConfig();
        $this->registerViews();
        $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');
        $this->registerRoutes();
    }

    public function register(): void
    {
        //
    }

    protected function registerConfig(): void
    {
        $configPath = __DIR__ . '/../../Config/config.php';
        
        $this->publishes([
            $configPath => config_path($this->moduleNameLower . '.php'),
        ], 'crm-config');
        
        $this->mergeConfigFrom($configPath, $this->moduleNameLower);
    }

    protected function registerViews(): void
    {
        $viewPath = __DIR__ . '/../../resources/views';

        $this->publishes([
            $viewPath => resource_path('views/vendor/crm'),
        ], 'crm-views');

        $this->loadViewsFrom($viewPath, $this->moduleNameLower);
    }

    protected function registerRoutes(): void
    {
        $this->loadRoutesFrom(__DIR__ . '/../../routes/web.php');
        $this->loadRoutesFrom(__DIR__ . '/../../routes/api.php');
    }

    public function provides(): array
    {
        return [];
    }
}
