<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform($users)
    {


        return [
            'name' => $users->name,
            'email' => $users->email,
            'roleId' => $users->role_id
        ];
    }


}
