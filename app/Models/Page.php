<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'url',
        'description',
        'parent_page_id',
        'created_by',
        'updated_by',
        'sort_order'

    ];


    // START FOR JS TREE
    protected $maps = ['text' => 'name', 'children' => 'sub_pages'];

    protected $hidden = ['name', 'sub_pages'];


    protected $appends = ['text', 'children'];

    public function getTextAttribute()
    {
        return $this->name;
    }

    public function getChildrenAttribute()
    {
        return $this->sub_pages;
    }
    //END FOR JS TREE


    // relationships with the table itself to loop over the pages and subpages
    public function pages()
    {
        return $this->hasMany(Page::class, 'parent_page_id');
    }

    public function sub_pages()
    {
        return $this->hasMany(Page::class, 'parent_page_id')->with('pages');
    }

    //ORM relationships

    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }
}
