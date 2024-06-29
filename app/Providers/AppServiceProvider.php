<?php

namespace App\Providers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;
use libphonenumber\PhoneNumberUtil;

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
    public function boot()
    {
        Validator::extend('phone_number', function ($attribute, $value, $parameters, $validator) {
            $phoneUtil = PhoneNumberUtil::getInstance();
            try {
                $phoneNumber = $phoneUtil->parse($value, null);
                return $phoneUtil->isValidNumber($phoneNumber);
            } catch (\libphonenumber\NumberParseException $e) {
                return false;
            }
        });
    }
}
