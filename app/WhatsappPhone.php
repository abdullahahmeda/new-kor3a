<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WhatsappPhone extends Model
{
    public function getLinkAttribute()
    {
        return 'https://wa.me/' . substr($this->phone, 1) . '?text=' . rawurlencode($this->text);
    }
}
