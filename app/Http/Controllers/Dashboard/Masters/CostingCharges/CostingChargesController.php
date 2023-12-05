<?php

namespace App\Http\Controllers\Dashboard\Masters\CostingCharges;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CostingChargesMaster;
use Illuminate\Validation\Rule;

class CostingChargesController extends Controller
{
    public function showCostingChargesCreation(){
        return view('dashboard.masters.CostingCharges.CostingChargesCreation');
    }

    public function processCostingChargesCreation(Request $request)
    {
        $validatedData = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('costing_charges_masters', 'name'),
            ],
            'status' => 'required|in:active,deactivate',
        ]);

        try {
            // Add data to the database
            $costingCharge = CostingChargesMaster::create([
                'created_by' => auth()->user()->id,
                'name' => $validatedData['name'],
                'status' => $validatedData['status'],
            ]);

            return response()->json(['message' => 'Costing charge created successfully', 'data' => $costingCharge], 201);
        } catch (\Exception $e) {
            // Handle exceptions
            return response()->json(['error' => 'Error creating costing charge', 'message' => $e->getMessage()], 500);
        }
    }
}
