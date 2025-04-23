<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guestbook;

class GuestbookController extends Controller
{
    public function index()
    {
        $entries = Guestbook::latest()->get();
        return view('guestbook.index', compact('entries'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:255',
        ]);

        Guestbook::create([
            'user_id' => auth()->id(),
            'message' => $request->message,
        ]);

        return redirect()->route('guestbook.index')->with('success', 'Message added!');
    }
}
