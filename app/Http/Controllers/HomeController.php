<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Services\Actors;
use App\Models\actor;
use App\Models\User;
use App\Models\spell;
use App\Models\matches;
use App\Jobs\playagain;

class HomeController extends Controller
{
    //
    public function index()
    {  
      if(Auth::user()){
      $user_list = User::with(['actorData'])->where('id',Auth::user()->id)->first();
      return view('home.index',compact('user_list'));
      }
      else{
        return view('home.index');
      }
    }

    public function storeActors(Actors $actor){
         $spellsList = $actor->getCharacters();    
      foreach($spellsList as $item){
            $spell = new actor();
            $spell->name = $item->name;
            $spell->house = $item->house;
            $spell->save();
      }    
    }

    public function chooseActors(){
         $actors = actor::whereNot('house',' ')->get();
      return view('home.choose-actors',compact('actors'));
    }

    public function allotUsers(Request $req){
       User::find(Auth::user()->id)->update([
        'actor_id'=> $req->actor_id
       ]);
       
       return redirect('/')->with('success','Player chosen');
    }

    public function chooseHouse(){
      $userlist = User::with(['actorData'])->whereNot('id',Auth::user()->id)->get();
      $house_name = User::with(['actorData'])->where('id',Auth::user()->id)->first();
      $other_house = actor::select('house')->whereNot('house',$house_name['actorData']['house'])->whereNot('house','')->get();
      return view('home.choose-house',compact('other_house'));
    }

    public function showAlongPlayer(Request $req){
      $userlist = User::select('users.name','users.id')->join('actors','users.actor_id','=','actors.id')->where('house',$req->house)->get();
      $spellslist = spell::where('description','LIKE',"%Curse%")->get();
      $player_id = Auth::user()->id;
    return view('home.show_alongplayers',compact('userlist','spellslist','player_id'));
    }

    public function storePlayAlong(Request $req){
      
         matches::insert([
          'player_id' => $req->player_id,
          'playalong_id' => json_encode($req->playalong_id),
          'spell_id'=> $req->spell_id,
          'score' => '10',
          'time_taken' => '7',
         ]);

         return redirect('/')->with('success','played match won');

    }

    public function playGame(){
      playAgain::dispatch();
      return redirect('/follow-character')->with('success',"job succeded");
    }
}
