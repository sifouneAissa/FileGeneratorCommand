<?php

namespace Devaissa\FileGeneratorCommand\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Illuminate\Support\Str;

class MakeFile extends GeneratorCommand
{
  
     /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = 'make:file {name : The name of the class} {--cat=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new file ';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'File';


    protected $stubs = [
        'interface',
        'trait',
        'class'
    ];
    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {   
        $stub = '/stubs/make-'.$this->option('cat').'.stub';
        
        return __DIR__  .$stub;
    }

    /**
     * Get the destination class path.
     *
     * @param  string $name
     * @return string
     */
    protected function getPath($name)
    {
        $name = Str::replaceFirst($this->laravel->getNamespace(), '', $name);


        return $this->laravel->basePath() .  DIRECTORY_SEPARATOR .'app'. DIRECTORY_SEPARATOR . str_replace('\\', DIRECTORY_SEPARATOR, $name) . '.php';
    }


    public function handle()
    {
        $cat = $this->option('cat');

        if (!$cat){
            $this->error('category is empty');
            $this->error('--cat= '.implode(" || ",$this->stubs));
            return false;
        } if($cat && !in_array($cat,$this->stubs)){
            $this->error('category is unavailable');
            $this->error('--cat= '.implode(" || ",$this->stubs));
            return false;
        }
        
        parent::handle();
    }
 
}


