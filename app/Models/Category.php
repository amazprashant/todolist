<?php
 
namespace App\Models; // Remove the extra 'Category' segment from the namespace

use Illuminate\Database\Eloquent\Model;
 
class Category extends Model
{
    public $timestamps = false;
    protected $table = 'category';

    public static function getCategory()
    {
        return self::all();
    }
}

?>