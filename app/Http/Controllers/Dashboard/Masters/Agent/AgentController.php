<?php

namespace App\Http\Controllers\Dashboard\Masters\Agent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    public function showAgentCreation(){
        return view('dashboard.masters.agent.agentCreation');
    }
}
