<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
    //campaign show function
    public function campaignShow()
    {
        $data = Campaign::orderByDesc('id')->get();

        return view('admin.campaign.campaign_show', compact('data'));
    }

    //campaign Add Page function
    public function campaignAddPage()
    {
        return view('admin.campaign.campaign_add');
    }
}
