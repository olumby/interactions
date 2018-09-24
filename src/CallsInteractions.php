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
    public static function interaction($interaction, array $parameters = [])
    {
        return app($interaction)->run($parameters);
    }

    public static function interact($interaction, array $parameters = [])
    {
        return app($interaction, ['parameters' => $parameters])->execute();
    }
}
