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
     * Data for the interaction.
     */
    protected $data;

    /**
     * Validated data for the interaction.
     */
    protected $validated;

    /**
     * Additional arguments for the interaction.
     */
    protected $arguments;

    /**
     * Rules to validate the interaction.
     */
    protected $rules = [];

    /**
     * Set up the interaction
     * 
     * @param array $parameters
     */
    public function __construct(array $data = [], array $arguments = [])
    {
        $this->data = $data;
        $this->arguments = $arguments;
    }

    /**
     * Run the interaction.
     *
     * @param  array  $parameters
     */
    public function run()
    {
        $this->validator = Validator::make(
            $this->data,
            method_exists($this, 'rules') ? $this->rules() : $this->rules
        );

        $this->validated = $this->validator->validate();

        return $this->execute();
    }
}
