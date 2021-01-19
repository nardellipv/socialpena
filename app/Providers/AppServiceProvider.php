<?php

namespace App\Providers;

use App\Comment;
use App\Post;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

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
        view::composer(
            [
                'web.parts.profile._editInterest',
                'web.parts.profile._changePassword',
                'web.parts.profile._socialNetwork',
                // 'web.parts._featurePhoto',
            ],
            function ($view) {
                $user = User::where('id', Auth::user()->id)
                    ->first();

                $view->with([
                    'user' => $user,
                ]);
            }
        );

        view::composer(
            [
                'web.parts._asideRight',
            ],
            function ($view) {
                $postLikes = Post::with(['user'])
                    ->orderBy('like', 'DESC')
                    ->take(3)
                    ->get();

                $view->with([
                    'postLikes' => $postLikes,
                ]);
            }
        );

        view::composer(
            [
                'web.parts._asideLeft',
            ],
            function ($view) {
                $postComments = Comment::with(['post', 'user'])
                    ->orderBy('comment', 'DESC')
                    ->take(3)
                    ->get();

                $view->with([
                    'postComments' => $postComments,
                ]);
            }
        );
    }
}
