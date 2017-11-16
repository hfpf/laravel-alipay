<?php namespace LaravelAlipay;

use Alipay\AopClient;
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
        $source = realpath(__DIR__ . '/alipay.php');
        if ($this->app->runningInConsole()) {
            $this->publishes([
                $source => config_path('alipay.php')
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
        $this->app->singleton(AopClient::class, function ($app) {

            $config = config('alipay');
            $aop = new AopClient();
            if ($config['gatewayUrl']) {
                $aop->gatewayUrl = $config['gatewayUrl'];
            }
            $aop->appId = $config['app_id'];
            $aop->rsaPrivateKey = $config['private_key'];
            $aop->alipayrsaPublicKey= $config['public_key'];
            $aop->apiVersion = '1.0';
            if (isset($config['sign_type'])) {
                $aop->signType = $config['sign_type'];
            }
            if (isset($config['charset'])) {
                $aop->postCharset = $config['charset'];
            }
            $aop->format='json';
            return $aop;
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
            AopClient::class
        ];
    }
}
