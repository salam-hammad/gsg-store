<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    
    // Explicit configuration properties are defined in the model when there are modifications to the default behavior
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    // Specify the database connection in case there is more than one connection
    protected $connection = 'mysql';

    // Explicitly specify the model name for this table in case the model name differs from the table name
    protected $table = 'categories';
    
    protected $primaryKey = 'id';

    protected $keyType = 'int';

    // primaryKey is not auto increment => false      // primaryKey is auto increment => true 
    public $incrementing = true;

    // the table with timestamps
    public $timestamps = true;


}