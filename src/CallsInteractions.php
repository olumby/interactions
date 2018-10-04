<?php

namespace Lumby\Interactions;

trait CallsInteractions
{
    /**
     * Resolve and run the interaction.
     * 
     * @param  string $interaction
     * @param  array  $parameters
     * @param  array  $arguments
     */
    public static function interaction($interaction, array $data = [], array $arguments = [])
    {
        return app($interaction, ['data' => $data, 'arguments' => $arguments])->run();
    }

    public static function interact($interaction, array $data = [], array $arguments = [])
    {
        return app($interaction, ['data' => $data, 'arguments' => $arguments])->execute();
    }
}
