<?php

namespace FabianGO\Models;

interface BaseModel
{
    /**
     * Initialize model with a set of data retrieved from database or created in controllers
     *
     * @param array $params
     */
    function initialize(array $params);

    /**
     * Returns model data in array format (ready for database insertion)
     *
     * @return array
     */
    function toArray();
}