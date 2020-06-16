<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Gate;

class Type extends Model
{
    use SoftDeletes;
    public $timestamps = true;
    protected $table = 'types';
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

    const TYPES = [
        1 => 'Thời trang',
        2 => 'Điện tử',
        3 => 'Phong cách số',
        4 => 'Hàng tiêu dùng',
        5 => 'Đồ ăn',
        6 => 'Khác',
    ];

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        if (Gate::allows('edit-settings')) {
            static::addGlobalScope('withTrashed', function (Builder $builder) {
                $builder->withTrashed();
            });
        }
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
}
