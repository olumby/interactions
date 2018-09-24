<?php

namespace Lumby\Interactions;

use Illuminate\Support\Facades\Validator;

abstract class Interaction
{
    use CallsInteractions;

    /**
     * Validator object.
     */
    protected $validator;

    /**
     * Parameters for the interaction.
     */
    protected $parameters;

    /**
     * Rules to validate the interaction.
     */
    protected $rules = [];

    /**
     * Set up the interaction
     * 
     * @param array $parameters
     */
    public function __construct(array $parameters = [])
    {
        $rules = method_exists($this, 'rules') ? $this->rules() : $this->rules;

        $this->parameters = $parameters;
        $this->validator = Validator::make($this->parameters, $rules);
    }

    /**
     * Run the interaction.
     *
     * @param  array  $parameters
     */
    public static function run(array $parameters = [])
    {
        $interactor = new static($parameters);

        $interactor->validator->validate();

        return $interactor->execute();
    }
}
