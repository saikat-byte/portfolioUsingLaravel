<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    public function rPortfolioCategory()
    {
        return $this->belongsTo(PortfolioCategory::class, 'portfolio_category_id');
    }
}
