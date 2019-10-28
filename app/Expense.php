<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    public function expenseReport(){
        return $this->belongsTo(ExpenseReport::class);//Perteneces a un reporte relacion
    }
}
