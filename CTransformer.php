<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;

class CTransformer extends TransformerAbstract
{

    public function transform($c)
    {
        return [
            $c
        ];
    }
}
