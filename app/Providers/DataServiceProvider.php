<?php

namespace App\Providers;

use App\Models\admin\Client;
use App\Models\admin\Contact;
use App\Models\admin\Setting;
use App\Models\admin\Statistic;
use Illuminate\Support\ServiceProvider;

class DataServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer([
            'front.layouts.main',
            'front.layouts.navbar',
            'front.layouts.topbar',
            'front.layouts.footer',
            'front.home.index',
            'front.free_qoute.mail.template',
            'front.contact.mail.template',
            'administrator.profile.reset_password.template',
            'administrator.layouts.main',
            'administrator.authentication.main',
            'administrator.authentication.header',
            'administrator.authentication.footer',
            'administrator.authentication.main',
            'administrator.authentication.login',
            'administrator.logs.export'
        ], function ($view) {
            $settings = Setting::get()->toArray();
        
            $settings = array_column($settings, 'value', 'name');
            $view->with('settings', $settings);
        });

        view()->composer([
            'front.layouts.topbar',
            'front.layouts.footer',
            'front.contact.index',
            'front.free_qoute.mail.template',
            'front.contact.mail.template',
            'administrator.profile.reset_password.template',
        ], function ($view) {
            $contact = Contact::get()->toArray();
        
            $contact = array_column($contact, 'value', 'name');
            $view->with('contact', $contact);
        });

        view()->composer([
            'front.layouts.client',
        ], function ($view) {
            $client = Client::all();
        
            $view->with('client', $client);
        });

        view()->composer([
            'front.layouts.footer',
        ], function ($view) {
            $Statistic = Statistic::orderBy('visit_time', 'desc')->get();
        
            $view->with('Statistic', $Statistic);
        });
    }
}
