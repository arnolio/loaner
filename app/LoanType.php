<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoanType extends Model
{
    public function loans() {
        return $this->hasMany('App\Loan');
    }
}
