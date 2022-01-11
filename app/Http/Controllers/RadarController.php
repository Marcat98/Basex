<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Radar;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;

class RadarController extends Controller
{
    /**
   * Login user
   *
   * @param  Request $request
   * @return \Illuminate\View\View
   */
  public function createRadar(Request $request)
  {

    $username = session()->get('user');
    $user = User::where('username', $username)->get()->first();
    $name = $request->name;
    $description = $request->description;

    if($user->isModerator()) {

      if (Radar::where('name', $name)->count()==0) {

        $radar = Radar::create([
          'name' => $name,
          'moderator_id' => $user->id,
          'description' => $description,
        ]);

        //Make entry in working_on
        DB::table('working_on')->insert([
          'user_id' => $user->id,
          'radar_id' => $radar->id,
        ]);

        return view('dashboard', [
          'message' => 'A blank project has been created and can now be edited. Project Name: '.$name,
        ]);

      } else {
        return view('dashboard', [
          'message' => 'Project could not be created. Make sure to enter an unique Project Name!',
        ]);
      }

    } else {
      return view('dashboard', [
        'message' => 'Only Moderators are allowed to create a new project.',
      ]);
    }
  }

    /**
   * Get Projects of user
   *
   * @param  Request $request
   * @return \Illuminate\View\View
   */
  public function getProjects(Request $request)
  {
    if(session()->has('loggedin')) {

      if($request->ajax()) {
        $username = session()->get('user');
        $user = User::where('username', $username)->get()->first();
        //echo($user->projects()->get());

        $projects = $user->projects()->get()->map(function ($project) {
                      return collect([
                          'name'        => $project->name,
                          'moderator'   => User::find($project->moderator_id)->username,
                          'description' =>  $project->description,
                          'link'        =>  route('showRadar', ['radarId' => $project->id]),
                      ]);
                  });;

        return Datatables::of($projects)->toJson();
      }
      return view('dashboard');

    } else {
      return view('dashboard', [
        'message' => 'You have to be logged in in order to see your projects',
      ]);
    }
  }

  /**
  * Displays a certain radar
  *
  * @param  Request $request
  * @return \Illuminate\View\View
  */
  public function showRadar(Request $request)
  {
      echo($request->radarId);
  }

}
