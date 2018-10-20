<?php

namespace Lumby\Interactions;

trait CallsInteractions
{
    /**
     * Resolve and run the interaction with validation.
     * 
     * @param  string $interaction
     * @param  array  $data
     * @param  array  $arguments
     */
    public static function interaction($interaction, array $data = [], array $arguments = [])
    {
        return app($interaction, ['data' => $data, 'arguments' => $arguments])->run();
    }

    /**
     * Resolve and exacute the interaction without validation.
     * 
     * @param  string $interaction
     * @param  array  $data
     * @param  array  $arguments
     */
    public static function interact($interaction, array $data = [], array $arguments = [])
    {
        return app($interaction, ['data' => $data, 'arguments' => $arguments])->execute();
    }
}
