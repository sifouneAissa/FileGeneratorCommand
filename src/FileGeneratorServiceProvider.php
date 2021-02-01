<?php

namespace Devaissa\FileGeneratorCommand;

use Illuminate\Support\ServiceProvider;

class FileGeneratorServiceProvider  extends ServiceProvider
{

    protected $dev_commands = [
        'FileMake' => 'command.file.make'
    ];

    public function register()
    {
        $this->registerCommands($this->dev_commands);
    }



     /**
     * Register the given commands.
     *
     * @param array $commands
     */
    protected function registerCommands(array $commands)
    {
        foreach (array_keys($commands) as $command) {
            $method = "register{$command}Command";

            call_user_func_array([$this, $method], []);
        }
        
        $this->commands(array_values($commands));
    }


      /**
     * Register the command.
     */
    protected function registerFileMakeCommand()
    {
        $this->app->singleton('command.file.make', function ($app) {
            return new Console\Commands\MakeFile($app['files']);
        });
    }
}