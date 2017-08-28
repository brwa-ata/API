<?php

namespace App\Transformers;

use App\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @param User $user
     * @return array
     */
    public function transform(User $user)
    {
        return [
            //BAM SHEWAYA ATWANYN NAWY COLUMNAKAN BGORYN W LA REGAY AWANAY KA XOMAN DAMANNAWA BOYAN KARYAN LASAR BKAYN
            'identifier' => (int)$user->id,
            'name' => (string)$user->name,
            'email' => (string)$user->email,
            'isVerified' => (int)$user->verified,
            'isAdmin' => ($user->admin  === '1'),
            'creationDate' => (string)$user->created_at ,
            'lastChange' => (string)$user->updated_at ,
            'deleteDate' => isset($user->deleted_at) ? (string) $user->deleted_at : null,



            'links' =>
                [
                    [
                        'rel' => 'self',
                        'href' => route('users.show' , $user->id),
                    ],
                ]


        ];
    }



    /**
     * @param $index
     * @return mixed|null
     */
    public static function originalAttribute($index)
    {
        $attribute =  [
            'identifier' => 'id',
            'name' => 'name',
            'email' => 'email',
            'isVerified' => 'verified',
            'isAdmin' => 'admin',
            'creationDate' => 'created_at' ,
            'lastChange' => 'updated_at' ,
            'deleteDate' => 'deleted_at',
        ];

        return isset($attribute[$index]) ? $attribute[$index] : null;

    }

}
