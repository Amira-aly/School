<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{

    protected $namespace = 'App\Http\Controllers';
    public const HOME = '/dashboard';
    public const STUDENT = '/student/dashboard';
    public const TEACHER = '/teacher/dashboard';
    public const PARENT = '/parent/dashboard';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        //
    }

    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/student.php'));
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/parent.php'));
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/teacher.php'));
    }

    protected function mapApiRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api.php'));
    }
}
