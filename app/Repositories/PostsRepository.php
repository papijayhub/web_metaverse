<?php

namespace App\Repositories;

use App\Models\Posts;
use App\Repositories\BaseRepository;

/**
 * Class PostsRepository
 * @package App\Repositories
 * @version November 19, 2021, 11:02 am PST
*/

class PostsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'category',
        'description',
        'userid'
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
        return Posts::class;
    }
}
