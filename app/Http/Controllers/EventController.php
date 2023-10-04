<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(){
        $events = Event::all();
        return view('events.index',compact('events'));
    }

    public function create(){
        $menus = Menu::all();
        $districts = get_residential_districts();
        return view('events.create',compact('menus','districts'));
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'residential_district' => 'nullable',
            'ward' => 'nullable',
            'plot' => 'nullable',
            'menu_id' => 'nullable|exists:menus,id',
        ]);

        Event::create($request->all());
        return redirect()->route('events.index')->with('success','Event created successfully');
    }

    public function show(Event $event){
        return view('events.show',compact('event'));
    }

    public function edit(Event $event){
        $menus = Menu::all();
        $districts = get_residential_districts();
        return view('events.edit',compact('event','menus','districts'));
    }

    public function update(Request $request, Event $event){
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'residential_district' => 'nullable',
            'ward' => 'nullable',
            'plot' => 'nullable',
            'menu_id' => 'nullable|exists:menus,id',
        ]);

        $event->update($request->all());
        return redirect()->route('events.index')->with('success','Event updated successfully');
    }

    public function destroy(Event $event){
        $event->delete();
        return redirect()->route('events.index')->with('success','Event deleted successfully');
    }
}
