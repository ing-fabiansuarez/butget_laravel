<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Debt
 *
 * @property $id
 * @property $type
 * @property $amount
 * @property $description
 * @property $Who
 * @property $due_date
 * @property $created_at
 * @property $updated_at
 *
 * @property DebtDetail[] $debtDetails
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Debt extends Model
{


    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['space_id','type', 'amount', 'description', 'Who', 'due_date'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function debtDetails()
    {
        return $this->hasMany(\App\Models\debtDetails::class, 'id', 'debt_id');
    }


}
