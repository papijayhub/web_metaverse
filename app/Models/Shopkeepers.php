<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Shopkeepers
 * @package App\Models
 * @version November 9, 2021, 8:52 am UTC
 *
 * @property string $Firstname
 * @property string $Middlename
 * @property string $Lastname
 * @property string $Gender
 * @property string $Birthdate
 * @property string $Address
 * @property string $Citizenship
 */
class Shopkeepers extends Model
{
    // use SoftDeletes;

    use HasFactory;

    public $table = 'shopkeepers';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'Firstname',
        'Middlename',
        'Lastname',
        'Gender',
        'Birthdate',
        'Address',
        'Citizenship'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'Firstname' => 'string',
        'Middlename' => 'string',
        'Lastname' => 'string',
        'Gender' => 'string',
        'Birthdate' => 'date',
        'Address' => 'string',
        'Citizenship' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'Firstname' => 'required|string|max:50',
        'Middlename' => 'required|string|max:50',
        'Lastname' => 'required|string|max:50',
        'Gender' => 'required|string|max:12',
        'Birthdate' => 'required',
        'Address' => 'nullable|string|max:50',
        'Citizenship' => 'required|string|max:50',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
