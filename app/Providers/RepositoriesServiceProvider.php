<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider
{

    /**
     * @return void
     */
    public function register()
    {
        $this->readAndBind();
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Read all Repositories and bind them
     */
    private function readAndBind()
    {
        $reposDir = app_path('Repositories/Eloquent');
        $reposfiles = array_diff(scandir($reposDir), array('.', '..'));
        if (count($reposfiles) > 0) {
            foreach ($reposfiles as $file) {
                $fileName = explode('.', $file)[0];
                $repoName = "App\Repositories\Eloquent\\" . $fileName;
                $interfaceName = "App\Repositories\\" . $fileName . 'Interface';
                $this->app->bind($interfaceName, $repoName);
            }
        }
    }
}
