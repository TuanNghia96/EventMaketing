<?php


namespace App\Facade;


class CloudinaryFacade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'App\Support\Cloudinary';
    }
}