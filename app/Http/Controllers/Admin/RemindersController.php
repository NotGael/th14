<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
Use App\Http\Requests\EditReminderRequest;
Use App\Http\Requests\CreateReminderRequest;
use App\Section;
use App\Reminder;

class RemindersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reminders = Reminder::get();
        return view('admin.reminders.index', compact('reminders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $reminder = new Reminder();
        $sections = Section::where('id', '<=', 5)->lists('name','id');
        return view('admin.reminders.create', compact('reminder', 'sections'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateReminderRequest $request)
    {
        $reminder = Reminder::create($request->all());
        $reminder->user_id = Auth::user()->id;
        $reminder->save();
        return redirect()->route('admin.rappels.index')->with('success', 'Le rappel a bien été sauvegardé');
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
        $reminder = Reminder::findOrFail($id);
        $sections = Section::where('id', '<=', 5)->lists('name','id');
        return view('admin.reminders.edit', compact('reminder', 'sections'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditReminderRequest $request, $id)
    {
        $reminder = Reminder::findOrFail($id);
        $reminder->update($request->all());
        return redirect()->route('admin.rappels.index')->with('success', 'Le rappel a bien été sauvegardé');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Reminder::destroy($id);
        return redirect()->route('admin.rappels.index');
    }
}
