<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Team;
use App\TeamCertificate;
use App\TeamGallery;
use App\TeamMember;
use Illuminate\Support\Str;
use Image;
use Illuminate\Support\Facades\Log;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Team::get()->toArray();
        return view('admin.teams.index', compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.teams.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $status = 0;
        $msg = "";
        $team = new Team;
        $team->name = $request->name;
        $team->slug = $this->create_slug_title($team->name);
        $team->status = 1;

        if ($team->save()) {
            $status = 1;
            $msg = "Team created successfully.";
            session()->flash('message', $msg);
        }

        return response()->json([
            'status' => $status,
            'message' => $msg
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $team = Team::find($id);
        return view('admin.teams.edit', compact('team'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $status = 0;
        $msg = "";
        $team = Team::find($request->id);
        $team->name = $request->name;
        $team->slug = $this->create_slug_title($team->name);
        $team->status = 1;

        if ($team->save()) {
            $status = 1;
            $msg = "Team updated successfully.";
            session()->flash('message', $msg);
        }

        return response()->json([
            'status' => $status,
            'message' => $msg
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $status = 0;
        $http_status_code = 400;
        $msg = "";
        $path = 'public/teams/';

        if (Team::find($id)->delete()) {
            Storage::deleteDirectory($path . $id);
            $status = 1;
            $http_status_code = 200;
            $msg = "Team has been deleted";
        }

        return response()->json([
            'status' => $status,
            'message' => $msg
        ], $http_status_code);
    }

    public function teamList()
    {
        $teams = Team::all();
        return response()->json([
            'data' => $teams
        ]);
    }

    public function teamMembers($id)
    {
        $data['team_members'] = TeamMember::get()->toArray();
        $data['team'] = Team::find($id)->toArray();
        $data['breadcrumb'] = '<span class="kt-subheader__separator kt-hidden"></span><div class="kt-subheader__breadcrumbs"> <a href=' . route('admin.dashboard') . ' class="kt-subheader__breadcrumbs-link">Dashboard</a> <span class="kt-subheader__breadcrumbs-separator"></span> <a href="' . route('admin.teams.index') . '" class="kt-subheader__breadcrumbs-link">Teams</a> <span class="kt-subheader__breadcrumbs-separator"></span> <a href="" class="kt-subheader__breadcrumbs-link">Members</a></div>';

        return view('admin.teamMembers.index', $data);
    }

    public function teamMemberList($id)
    {
        $team_members = Team::find($id)->team_members;
        return response()->json([
            'data' => $team_members
        ]);
    }
}
