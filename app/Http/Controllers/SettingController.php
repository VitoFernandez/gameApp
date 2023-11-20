<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingController extends Controller
{
    //
    
    public function index() {
        /*Radio Buttons*/
        
        $checked = session('afterInsert', 'showGames');
        $checkedList = 'checked';
        $checkedCreate = '';
        
        if($checked != 'showGames'){
            $checkedList = '';
            $checkedCreate = 'checked';
        }
             return view('settings.index',['checkedList' => $checkedList,
                                        'checkedCreate' => $checkedCreate]);
    }
        public function update(Request $request){

        session(['afterInsert'=> $request->afterInsert]);
        
        return  back();
        
    }
}
