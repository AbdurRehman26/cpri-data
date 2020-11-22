<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Data\Models\Region;
use App\Data\Repositories\RegionRepository;

class RegionRepositoryServiceProvider extends ServiceProvider
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
      $this->app->bind('RegionRepository', function () {
              return new RegionRepository(new Region);
      });
    }
}
