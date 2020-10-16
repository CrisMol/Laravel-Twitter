<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entry;

class EntryController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

    public function create()
    {
    	return view('entries.create');
    }

    public function store(Request $request)
    {
    	$data = $request->validate([
    		'title' => 'required|min:7|max:255|unique:entries',
    		'content' => 'required|min:25|max:3000'
    	]);

    	//Crear nueva entrada
    	$entry = new Entry();
    	$entry->title = $data['title'];
    	$entry->content = $data['content'];
    	$entry->user_id = auth()->id();
    	$entry->save();

    	$status = 'Tu entrada ha sido publicada exitosamente';
    	return back()->with(compact('status'));
    }

    public function edit(Entry $entry)
    {
        /*if (auth()->id() !== $entry->user_id) {
            return redirect('/');
        }*/

        $this->authorize('update', $entry);

    	return view('entries.edit', compact('entry'));
    }

    public function update(Request $request, Entry $entry)
    {
        /*if (auth()->id() !== $entry->user_id) {
            return redirect('/');
        }*/

        $this->authorize('update', $entry);

    	$data = $request->validate([
    		'title' => 'required|min:7|max:255|unique:entries,id,'.$entry->id,
    		'content' => 'required|min:25|max:3000'
    	]);

    	$entry->title = $data['title'];
    	$entry->content = $data['content'];
    	$entry->update();

    	$status = 'Tu entrada ha sido editada exitosamente';
    	return back()->with(compact('status'));
    }
}
