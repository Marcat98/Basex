<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Radar;

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

        Radar::create([
          'name' => $name,
          'moderator_id' => $user->id,
          'description' => $description,
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
}
