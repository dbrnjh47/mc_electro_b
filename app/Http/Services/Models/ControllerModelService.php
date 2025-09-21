<?php

namespace App\Http\Services\Models;

use InvalidArgumentException;

class ControllerModelService
{
    public $model = null;
    public function where(...$args)
    {
        $count = count($args);

        if ($count === 0) {
            throw new InvalidArgumentException('At least one argument required');
        }

        // Один аргумент
        if ($count === 1) {
            return $this->handleSingleWhereArgument($args[0]);
        }

        if ($count === 2) {
            $this->model->where($args[0], $args[1]);
        }

        if ($count === 3) {
            $this->model->where($args[0], $args[1], $args[2]);
        }
    }

    public function getModel()
    {
        return $this->model;
    }

    protected function handleSingleWhereArgument($arg)
    {
        if (is_array($arg)) {
            return $this->model->where($arg);
        }

        if (is_callable($arg)) {
            return $this->model->where($arg);
        }

        throw new InvalidArgumentException('Invalid argument type');
    }
}
