<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\AuditLog as Log;
use App\Models\PasswordReset; 
use App\Models\CostingChargesMaster;
use App\Models\JobServicesMaster;
use App\Models\LeadSourcesMaster;
use App\Models\ModesMaster;
use App\Models\QuotationChargesMaster;
use App\Models\ServicesMaster;
use App\Models\SurveyChecklistMaster;
use App\Models\TypesMaster;
use App\Models\AgentsMaster;
use App\Models\ClientsMaster;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'created_by',
        'updated_by',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    // Define the inverse relationship with the AuditLog model
    public function auditLogs()
    {
        return $this->hasMany(Log::class, 'user_id');
    }

    // Define the relationship with the PasswordReset model
    public function passwordReset()
    {
        return $this->hasOne(PasswordReset::class, 'email');
    }

    public function coastingChargesMasters()
    {
        return $this->hasMany(CostingChargesMaster::class, 'created_by');
    }

   
    public function updatedCoastingChargesMasters()
    {
        return $this->hasMany(CostingChargesMaster::class, 'updated_by');
    }

    public function jobServicesMasters()
    {
        return $this->hasMany(JobServicesMaster::class, 'created_by');
    }

   
    public function updatedJobServicesMasters()
    {
        return $this->hasMany(JobServicesMaster::class, 'updated_by');
    }

    public function leadSourcesMasters()
    {
        return $this->hasMany(LeadSourcesMaster::class, 'created_by');
    }

   
    public function updatedLeadSourcesMasters()
    {
        return $this->hasMany(LeadSourcesMaster::class, 'updated_by');
    }
   public function modesMasters()
    {
        return $this->hasMany(ModesMaster::class, 'created_by');
    }

   
    public function updatedModesMasters()
    {
        return $this->hasMany(ModesMaster::class, 'updated_by');
    }

    public function quotationChargesMasters()
    {
        return $this->hasMany(QuotationChargesMaster::class, 'created_by');
    }

   
    public function updatedQuotationChargesMasters()
    {
        return $this->hasMany(QuotationChargesMaster::class, 'updated_by');
    }
    public function servicesMasters()
    {
        return $this->hasMany(ServicesMaster::class, 'created_by');
    }

   
    public function updatedServicesMasters()
    {
        return $this->hasMany(ServicesMaster::class, 'updated_by');
    }
    
    public function surveyChecklistMasters()
    {
        return $this->hasMany(SurveyChecklistMaster::class, 'created_by');
    }

   
    public function updatedSurveyChecklistMasters()
    {
        return $this->hasMany(SurveyChecklistMaster::class, 'updated_by');
    }

public function typesMasters()
    {
        return $this->hasMany(TypesMaster::class, 'created_by');
    }

   
    public function updatedTypesMasters()
    {
        return $this->hasMany(TypesMaster::class, 'updated_by');
    }

    public function agentsMasters()
    {
        return $this->hasMany(AgentsMaster::class, 'created_by');
    }

    public function updatedAgentsMasters()
    {
        return $this->hasMany(AgentsMaster::class, 'updated_by');
    }

    public function clientsMasters()
    {
        return $this->hasMany(ClientsMaster::class, 'created_by');
    }

    public function updatedClientsMasters()
    {
        return $this->hasMany(ClientsMaster::class, 'updated_by');
    }
    
}
