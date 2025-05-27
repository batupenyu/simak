<?php

namespace App\Providers;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Str;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Support\Carbon;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Pagination\Paginator as PaginationPaginator;

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


        Carbon::setlocale('id');

        Relation::morphMap([
            'Comment'   => Comment::class,
        ]);

        Str::macro('currency', function ($price) {
            return number_format($price, 0, ',', '.');
        });

        Blade::directive('currency', function ($expression) {
            return " <?php echo number_format($expression,0,',','.'); ?>";
        });
        

        PaginationPaginator::useBootstrap();

        Carbon::setWeekStartsAt(Carbon::FRIDAY);
        Carbon::setWeekEndsAt(Carbon::THURSDAY);

        Carbon::setWeekendDays([
            Carbon::SUNDAY,
            Carbon::MONDAY,
        ]);

    }
}
