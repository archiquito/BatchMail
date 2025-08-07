<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmailListRequest;
use App\Models\EmailList;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class EmailListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /** @var User $user */
        // /** @var EmailList $list */
        $user = Auth::user();
        return view('email-list.index', ['emailList' => $user->emailList()->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('email-list.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmailListRequest $request)
    {
        $data = $request->validated();

        /** @var User $user */
        $user = Auth::user();

        $handleFile = $request->processCsv($data['csv']->getRealPath());
        if ($handleFile) {
            DB::transaction(function () use ($data, $handleFile, $user) {
                $emailList = EmailList::query()->create(['title' => $data['title'], 'user_id' => $user->id]);
                $emailList->subscribers()->createMany($handleFile);
            });
        }

        return Redirect::route('email-list.index')->with('status', 'Email list-created');
    }

    /**
     * Display the specified resource.
     */
    public function show(EmailList $emailList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EmailList $emailList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, EmailList $emailList)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EmailList $emailList)
    {
        dd('entrou');
        $emailList->delete();
        return redirect()->route('email-list.index')->with('message', 'Lista excluída com sucesso!');
    }
}
