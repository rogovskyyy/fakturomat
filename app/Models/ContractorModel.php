<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContractorModel extends Model
{
    use HasFactory;

    protected $table = 'contractor';
    public $timestamps = true;
}
