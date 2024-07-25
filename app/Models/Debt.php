<?php

namespace App\Models;

use App\Enums\TypeDebts;
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

    public function getColorAmount(): String
    {
        switch ($this->type) {
            case TypeDebts::I_LEND->getId():
                return "#00FF00";
                break;
            case TypeDebts::LEND_ME->getId():
                return "#FF0000";
                break;
            default:
                return null;
                break;
        }
    }

    public function getTypeName():String{
        switch ($this->type) {
            case TypeDebts::I_LEND->getId():
                return TypeDebts::I_LEND->getName();
                break;
            case TypeDebts::LEND_ME->getId():
                return TypeDebts::LEND_ME->getName();
                break;
            default:
                return null;
                break;
        }
    }

}
