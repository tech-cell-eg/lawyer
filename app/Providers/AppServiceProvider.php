<?php

namespace App\Providers;

use App\Models\Appointment;
use App\Models\Card;
use App\Models\Payment;
use App\Models\Review;
use App\Models\User;
use App\Observers\AppointmentObserver;
use App\Observers\CardObserver;
use App\Observers\PaymentObserver;
use App\Observers\ReviewObserver;
use App\Observers\UserObserver;
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
        Appointment::observe(AppointmentObserver::class);
        User::observe(UserObserver::class);
        Card::observe(CardObserver::class);
        Payment::observe(PaymentObserver::class);
        Review::observe(ReviewObserver::class);
    }
}
