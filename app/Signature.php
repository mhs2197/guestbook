<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Signature extends Model
{
    public function scopeIgnoreFlagged($query)
    {
        return $query->where('flagged_at', null);
    }

    public function flag()
    {
        return $this->update(['flagged_at' => \Carbon\Carbon::now()]);
    }
}
