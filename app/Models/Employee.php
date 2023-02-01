<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class Employee extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';

    public $timestamps = false; 
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'employee_id',
    ];


}
