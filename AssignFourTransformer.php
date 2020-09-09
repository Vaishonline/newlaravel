<?php

namespace App\Transformers;
use App\User;
use App\classUser;
use League\Fractal\TransformerAbstract;

class AssignFourTransformer extends TransformerAbstract
{


    public function transform($finale)
    {

        return $finale;
    }


}