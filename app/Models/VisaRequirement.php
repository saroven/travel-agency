<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VisaRequirement extends Model
{
    protected $fillable = ['visa_rule_id', 'occupation', 'requirement', 'sort_order'];

    public function visaRule(): BelongsTo
    {
        return $this->belongsTo(VisaRule::class);
    }
}
