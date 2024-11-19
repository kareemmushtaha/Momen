<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminGroup extends Model
{
    protected $table    = 'admin_groups';

    protected $fillable = [
        'name',
        'setting_show',
        'admingroup_add',
        'admingroup_show',
        'admingroup_delete',
        'admingroup_edit',

        'page_add',
        'page_show',
        'page_delete',
        'page_edit',

        'admin_add',
        'admin_show',
        'admin_delete',
        'admin_edit',

        'contect_add',
        'contect_show',
        'contect_delete',
        'contect_edit',

        'socail_add',
        'socail_show',
        'socail_delete',
        'socail_edit',
        
        'links_add',
        'links_show',
        'links_delete',
        'links_edit',
        

     ];
}
