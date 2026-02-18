<?php

namespace App\Providers;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Support\Carbon;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Pagination\Paginator as PaginationPaginator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

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
        // Comment::class not available - commented out
        // Relation::morphMap([
        //     'Comment'   => Comment::class,
        // ]);

        Str::macro('currency', function ($price) {
            return number_format($price, 0, ',', '.');
        });

        Str::macro('imageUrl', function ($path) {
            return url('image/' . ltrim($path, '/'));
        });

        Blade::directive('currency', function ($expression) {
            return " <?php echo number_format($expression,0,',','.'); ?>";
        });

        Blade::directive('image', function ($path) {
            return "<?php echo url('image/' . ltrim($path, '/')); ?>";
        });

        PaginationPaginator::useBootstrap();

        Carbon::setWeekStartsAt(Carbon::FRIDAY);
        Carbon::setWeekEndsAt(Carbon::THURSDAY);

        Carbon::setWeekendDays([
            Carbon::SUNDAY,
            Carbon::MONDAY,
        ]);

        // Share current user with all views
        View::composer('layout.sidebar', function ($view) {
            $user = Auth::user();
            if (!$user) {
                // If no authenticated user, try to get from session or use first user
                $user = User::first();
            }
            $view->with('user', $user);
        });

    }
}
