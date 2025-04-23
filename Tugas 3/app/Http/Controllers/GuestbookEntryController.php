<?php

namespace App\Http\Controllers;

use App\Models\GuestbookEntry;
use Illuminate\Http\Request;

class GuestbookEntryController extends Controller
{
    public function index()
    {
        $entries = GuestbookEntry::latest()->get();
        return view('guestbook.index', compact('entries'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'message' => 'required|string',
        ]);

        GuestbookEntry::create($request->all());

        return redirect()->back()->with('success', 'Terima kasih telah mengisi buku tamu!');
    }
}