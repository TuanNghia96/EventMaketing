<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Gate;

class Type extends Model
{
    public $timestamps = true;
    protected $table = 'types';
    protected $fillable = [
        'name',
        'status',
    ];

    const CATEGORIES = [
        0 => 'Giảm giá',
        1 => 'Ra mắt sp mới',
        2 => 'Hội chợ',
        3 => 'Kỷ niệm thày lập, khai trương',
        4 => 'Hội nghị, hội thảo',
        5 => 'Ngày lễ',
    ];

    const TYPES = [
        1 => 'Thời trang',
        2 => 'Điện tử',
        3 => 'Phong cách số',
        4 => 'Hàng tiêu dùng',
        5 => 'Đồ ăn',
        6 => 'Khác',
    ];

    /**
     * Scope a query to only include active.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('status', '=', true);
    }

    /**
     * relationship to events
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function events()
    {
        return $this->hasMany(Event::class);
    }

    /**
     * disable status
     *
     * @return bool
     */
    public function disable()
    {
        if ($this->status) {
            $this->status = false;
            return $this->save();
        }
        return false;
    }

    /**
     * disable status
     *
     * @return bool
     */
    public function enable()
    {
        if (!$this->status) {
            $this->status = true;
            return $this->save();
        }
        return false;
    }
}
