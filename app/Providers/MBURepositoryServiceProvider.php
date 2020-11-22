<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Data\Models\MBU;
use App\Data\Repositories\MBURepository;

class MBURepositoryServiceProvider extends ServiceProvider
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
      $this->app->bind('MBURepository', function () {
              return new MBURepository(new MBU);
      });
    }
}
