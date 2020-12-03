<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Competition extends Model
{

    protected $guarded = [];

    public function tripDate()
    {
        Carbon::setlocale('ar');
        return Carbon::parse($this->trip_at)->isoFormat('dddd [الموافق] D-M-YYYY');
    }

    public function finishDate()
    {
        Carbon::setlocale('ar');
        return Carbon::createFromFormat($this->finish_at)->isoFormat('dddd [الموافق] D-M-YYYY');
    }

    public function getTripAtAttribute($value)
    {
        return Carbon::parse($value)->tz('Asia/Aden')->format('Y-m-d H:00:00');
    }

    public function getFinishAtAttribute($value)
    {
        return Carbon::parse($value)->tz('Asia/Aden')->format('Y-m-d H:00:00');
    }

    public function getResultPhoneCountryCodeAttribute() {
        return substr($this->result_phone, 0, 3);
    }

    public function participants()
    {
        return $this->hasMany(Participant::class);
    }

    public function winner() {
        return $this->belongsTo(Participant::class, 'winner_id');
    }

    public function directionText() {
        switch ($this->direction) {
            case 'saudia_yemen':
              return 'من السعودية إلى اليمن';
              break;
            case 'yemen_saudia':
              return 'من اليمن إلى السعودية';
              break;
            case 'in_yemen':
              return 'داخل المدن اليمنية';
              break;
            default:
              return '';
          } 
    }
}
