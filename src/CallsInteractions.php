<?php

namespace Lumby\Interactions;

trait CallsInteractions
{
    /**
     * Resolve and run the interaction.
     * 
     * @param  string $interaction
     * @param  array  $parameters
     */
    public static function interact($interaction, array $parameters = [])
    {
        $class = class_basename($interaction);
        
        return call_user_func_array([app($class), 'run'], $parameters);
    }
}
