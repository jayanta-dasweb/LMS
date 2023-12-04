<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\AgentsMaster;

class ClientsMaster extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'company_name',
        'email',
        'mobile_number',
        'landline_number',
        'designation',
        'registered_address',
        'communication_address',
        'city',
        'country',
        'pincode',
        'agent_id',
        'status',
        'created_by',
        'updated_by',
    ];

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function agent()
    {
        return $this->belongsTo(AgentsMaster::class, 'agent_id');
    }
}
