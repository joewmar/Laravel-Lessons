<?php

namespace App\Providers;

use App\Models\Students;
use Facade\FlareClient\View;
use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\View as FacadesView;
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
        // Laravel Part 6: View Partials and Components
        FacadesView::share('title', 'Student Admin');
        FacadesView::composer('students.index', function($view){
            $view->with('students', Students::all());
        });
    }
}
