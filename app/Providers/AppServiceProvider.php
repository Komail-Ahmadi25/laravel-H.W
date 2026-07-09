<?php

// namespace App\Providers;

// // use App\Models\Post;
// use App\Models\User;
// // use App\Policies\PostPolicy;
// use Illuminate\Support\Facades\Gate;

use Illuminate\Support\ServiceProvider;

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
        // Gate::policy(Post::class, PostPolicy);
        // Gate::define('teacher-auth', function (User $user) {
        //     return $user->role === 'teacher';
        // });
        // Gate::define('student', function (User $u) {
        //     return $u->role === 'student';
        // });
        // Gate::define('delete-user', function (User $usetauth) {
        //     return $usetauth->role === 'admin';
        // });
        // Gate::define('update-user', function (User $userauth) {
        //     return $userauth->role === 'admin';
        // });
    }
}
