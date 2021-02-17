<?php

namespace App\Providers;

use App\models\Admin;
use App\models\Admission;
use App\models\PasswordReset;
use App\models\Scholarship;
use App\models\Student;
use App\models\Trainer;
use App\Observers\AdminObserver;
use App\Observers\AdmissionObserver;
use App\Observers\PasswordResetObserver;
use App\Observers\ScholarshipObserver;
use App\Observers\StudentObserver;
use App\Observers\TrainerObserver;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
//        Admin::observe(AdminObserver::class);
//        Trainer::observe(TrainerObserver::class); done
//        Student::observe(StudentObserver::class); done
//        Admission::observe(AdmissionObserver::class);
//        Scholarship::observe(ScholarshipObserver::class);
//        PasswordReset::observe(PasswordResetObserver::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
