<?php 

namespace Poing\Ylem;
  
class Facade extends \Illuminate\Support\Facades\Facade
{
    /**
     * {@inheritDoc}
     */
    protected static function getFacadeAccessor()
    {
        return 'Poing\Ylem\Models\';
    }
}
