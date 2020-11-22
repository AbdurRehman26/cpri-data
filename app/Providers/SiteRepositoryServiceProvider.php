<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Data\Models\Site;
use App\Data\Repositories\SiteRepository;

class SiteRepositoryServiceProvider extends ServiceProvider
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
      $this->app->bind('SiteRepository', function () {
              return new SiteRepository(new Site);
      });
    }
}
