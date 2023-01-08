<?php

namespace App\Http\Controllers;

use App\Models\Files;
use App\Models\Shares;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

class FilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $user = auth()->user();
        $files = $user->files;
        $type = 'dashboard';
        return view('main.files.index', compact('files', 'type'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('main.files.upload');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|file',
        ]);
        $file = $request->file('file');
        $filename = $file->getClientOriginalName();
        $size = $file->getSize();

        //store file in public storage
        Storage::put('public/files/' . $filename, file_get_contents($file));
        $path = Storage::url('public/files/' . $filename);
        $type = $file->getMimeType();
        $file = Files::create([
            'name' => $filename,
            'path' => $path,
            'user_id' => auth()->user()->id,
            'type' => $type,
            'size' => $size,
        ]);

        //update Storage info to user
        $user = auth()->user();
        $user->used_space = $user->used_space + $size;
        $user->save();

        return redirect()->route('files.index');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $file_id = Crypt::decrypt($id);
        $file = Files::find($file_id);
        $user = auth()->user();
        $user->used_space = $user->used_space - $file->size;
        $user->save();

        //remove from share
        Shares::where('file_id', $file_id)->delete();
        $file->delete();


        return redirect()->route('files.index');

    }

    public function download($file_id)
    {
        $file_id=Crypt::decrypt($file_id);
        $file = Files::find($file_id);
        $filename = $file->name;
        $file_path = Storage::path('public/files/' . $filename);
        return response()->download($file_path, $filename);



    }

    public function shared(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $user = auth()->user();
        $share = $user->shared;
        $type = 'shared';
        return view('main.files.shared', compact('share', 'type'));
    }

    public function received(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $user = auth()->user();
        $share = $user->received;
        $type = 'received';
        return view('main.files.shared', compact('share', 'type'));
    }


    public function getSharingPage($file_id)
    {

        $file_id = Crypt::decrypt($file_id);
        $file = Files::find($file_id);
        $users = User::all()->except(auth()->user()->id);
        return view('main.files.send', compact('file', 'users'));
    }

    public function share(Request $request)
    {
        $request->validate([
            'file_id' => 'required',
            'receiver_id' => 'required',
        ]);
        $file_id = Crypt::decrypt($request->file_id);
        $receiver_id = Crypt::decrypt($request->receiver_id);
        $sender_id = auth()->user()->id;

        $share = Shares::create([
            'file_id' => $file_id,
            'sender_id' => $sender_id,
            'receiver_id' => $receiver_id,
            'status'=> 'sent',
        ]);
        return redirect()->route('files.shared');

    }


}
