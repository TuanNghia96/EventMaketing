<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    public $timestamps = true;
    protected $table = 'notification';
    protected $fillable = [
        'title',
        'message',
        'type',
    ];

    const ICON_TYPE = [
       1 => '<div class="notif-icon notif-primary"><i class="fa fa-plus-circle" aria-hidden="true"></i></div>',
       2 => '<div class="notif-icon notif-danger"><i class="fa fa-minus-circle" aria-hidden="true"></i></div>',
    ];

    /**
     * Scope a query by unread
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $phone
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeUnread($query)
    {
        return $query->where('status', true);
    }

    /**
     * change status to read
     */
    public function read()
    {
        $this->status = false;
        $this->save();
    }
}
