<?php
 
namespace App\Models;
 

use Illuminate\Database\Eloquent\Model;
 
class Todo extends Model
{
    public $timestamps = false;
    protected $table = 'todo';
    public static function getTodo()
    {
        //return self::all();
        return self::join('category', 'category.id', '=', 'todo.category_id')
        ->select('todo.name', 'category.id','category.name AS category_name','category.created_at')
        ->get();
    }
}
