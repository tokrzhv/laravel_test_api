<?php

namespace App\Providers;

use Faker\Provider\uk_UA\Company;
use Faker\Provider\uk_UA\Person;
use Faker\Provider\uk_UA\PhoneNumber;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Faker\Generator;

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
        Paginator::useBootstrapFive();
        Paginator::useBootstrapFour();

        $faker = $this->app->make(Generator::class);
        $faker->addProvider(new PhoneNumber($faker));
        $faker->addProvider(new Person($faker));
        $faker->addProvider(new Company($faker));
    }
}

