<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsModel extends Model {
    use HasFactory;

    public $timestamps = false;
    protected $connection = 'mysql';
    protected $table = 'news_models';
    protected $primaryKey = 'id';

}
