<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    protected $fillable = [
        'name',
        'ssn',
        'date_of_birth',
        'loan_amount',
        'rate',
        'term',
        'apr'
    ];

    public function type() {
        return $this->belongsTo('App\LoanType');
    }
}
