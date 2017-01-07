<?php

namespace FabianGO\Models;

abstract class BaseModel
{

    /**
     * Initialize model with a set of data retrieved from database or created in controllers
     *
     * @param array $params
     */
    abstract function initialize(array $params);

    /**
     * Returns model data in array format (ready for database insertion)
     *
     * @return array
     */
    abstract function toArray();
}