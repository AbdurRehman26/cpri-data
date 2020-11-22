<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Data\Models\SubRegion;
use App\Data\Repositories\SubRegionRepository;

class SubRegionRepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
      $this->app->bind('SubRegionRepository', function () {
              return new SubRegionRepository(new SubRegion);
      });
    }
}
