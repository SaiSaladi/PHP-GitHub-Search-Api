<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Value extends Model
{
    protected $fillable = array('id', 'name', 'html_url','made_at','pushed_at','description','stargazers_count');
}
