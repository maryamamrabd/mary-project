<?php
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    // Show the contact form
    public function create()
    {
        return view('contact');
    }

    // Handle form submission
    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'email'     => 'required|email|max:255',
            'message'   => 'required|string',
        ]);

        Contact::create($validated);

        return redirect()->back()->with('success', 'Votre message a été envoyé avec succès!');
    }
}
