<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Http\Requests\StoreTeamRequest;
use App\Http\Requests\UpdateTeamRequest;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    return view('tampilan.dasboard.teams',[
        'title' => 'Teams',
        'teams' => Team::latest()->filter(request(['search']))->paginate(8)
    ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     return view('tampilan.dasboard.addTeam',[
        'title' => 'Add Team'
     ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTeamRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTeamRequest $request)
    {
        $validateData = $request->validate([
            'name' => 'required',
            'image' => 'required|file|max:1500',
            'teamImage' => 'required|file|max:1500',
            'join' => 'required',
            'slug' => 'required|unique:teams',
            'deskripsi' => 'required',
            'level' => 'required'
        ]);

        $validateData['image']= $request->file('image')->store('team');
        $validateData['teamImage']= $request->file('teamImage')->store('team');

        Team::create($validateData);

        return redirect('/dashboard/teams')->with('success', 'Add Team Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        return view('tampilan.dasboard.detailTeam',[
            'title' => 'Detail Team',
            'team' => $team
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        return view('tampilan.dasboard.editTeam',[
            'title' => 'Edit Team',
            'team' => $team
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTeamRequest  $request
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTeamRequest $request, Team $team)
    {
        $rules = [
            'name' => 'required',
            'image' => 'file|max:1500',
            'teamImage' => 'file|max:1500',
            'join' => 'required',
            'deskripsi' => 'required',
            'level' => 'required'
        ];

        if($request['slug'] != $team['slug']){
            $rules['slug'] = 'required|unique:teams';
        }

        $validateData = $request->validate($rules);

        if($request->file('image')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validateData['image'] = $request->file('image')->store('team');
        }

        if($request->file('teamImage')){
            if($request->oldTeamImage){
                Storage::delete($request->oldTeamImage);
            }
            $validateData['teamImage'] = $request->file('teamImage')->store('team');
        }

        Team::where('id', $team->id)->update($validateData);

        return redirect('/dashboard/teams')->with('successUpdated','Updated Succesfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        if($team->image){
            Storage::delete($team->image);
        }

        if($team->teamImage){
            Storage::delete($team->teamImage);
        }

        Team::destroy($team->id);


        return redirect('/dashboard/teams')->with('succesDelete','Deleted Succesfully');
    }
}
