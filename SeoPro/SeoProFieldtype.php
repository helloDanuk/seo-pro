<?php

namespace Statamic\Addons\SeoPro;

use Statamic\Extend\Fieldtype;
use Statamic\CP\FieldtypeFactory;

class SeoProFieldtype extends Fieldtype
{
    public function preProcess($data)
    {
        return collect($data)->map(function ($value, $key) {
            $config = $this->getFieldConfig('fields.'.$key);
            $fieldtype = FieldtypeFactory::create(array_get($config, 'type'), $config);
            return $fieldtype->preProcess($value);
        })->all();
    }

    public function process($data)
    {
        return collect($data)->map(function ($value, $key) {
            $config = $this->getFieldConfig('fields.'.$key);
            $fieldtype = FieldtypeFactory::create(array_get($config, 'type'), $config);
            return $fieldtype->process($value);
        })->filter()->all();
    }
}
