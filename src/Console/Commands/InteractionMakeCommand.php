<?php

namespace Lumby\Interactions\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputOption;

class InteractionMakeCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'make:interaction';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new interaction class';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Interaction';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        if ($this->option('method')) {
            $stub = '/stubs/interaction.method.stub';
        }

        $stub = $stub ?? '/stubs/interaction.stub';

        return __DIR__ . $stub;
    }

    /**
     * Get the default namespace for the class.
     *
     * @param string $rootNamespace
     *
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Interactions';
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['method', 'm', InputOption::VALUE_NONE, 'Generate an interaction a rules method instead of property.'],
        ];
    }
}
