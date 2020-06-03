<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    public $timestamps = true;
    protected $table = 'categories';
    protected $fillable = [
        'name',
    ];

    const CATEGORIES = [
        0 => 'Giảm giá',
        1 => 'Ra mắt sp mới',
        2 => 'Hội chợ',
        3 => 'Kỷ niệm thày lập, khai trương',
        4 => 'Hội nghị, hội thảo',
        5 => 'Ngày lễ',
    ];


    /**
     * relationship to events
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
