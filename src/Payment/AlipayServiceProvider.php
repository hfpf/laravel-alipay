<?php namespace LaravelAlipay\Payment;

use Alipay\Payment\Payment;
use Illuminate\Support\ServiceProvider;

class AlipayServiceProvider extends ServiceProvider
{

    protected $defer = true;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->setupConfig();
    }

    public function setupConfig()
    {
        $source = realpath(__DIR__ . '/alipay-payment.php');
        if ($this->app->runningInConsole()) {
            $this->publishes([
                $source => config_path('alipay-payment.php')
            ]);
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(Payment::class, function ($app) {

            $payment = new Payment(config('alipay-payment'));
            return $payment;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            Payment::class
        ];
    }
}
