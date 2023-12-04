<?php

namespace App\Http\Controllers\Dashboard\Masters\CostingCharges;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CostingChargesController extends Controller
{
    public function showCostingChargesCreation(){
        return view('dashboard.masters.CostingCharges.CostingChargesCreation');
    }
}
