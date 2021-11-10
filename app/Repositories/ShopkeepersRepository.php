<?php

namespace App\Repositories;

use App\Models\Shopkeepers;
use App\Repositories\BaseRepository;

/**
 * Class ShopkeepersRepository
 * @package App\Repositories
 * @version November 9, 2021, 8:52 am UTC
*/

class ShopkeepersRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'Firstname',
        'Middlename',
        'Lastname',
        'Gender',
        'Birthdate',
        'Address',
        'Citizenship'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Shopkeepers::class;
    }
}
