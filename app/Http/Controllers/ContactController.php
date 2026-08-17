<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function create(Request $request): View
    {
        $user = $request->user();

        return view('contact.create', compact('user'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'inquiry_type' => ['required', 'string', 'max:50'],
            'subject' => ['required', 'string', 'max:255'],
            'message' => ['required', 'string', 'max:1000'],
        ]);

        // Determine estimated response time based on inquiry type
        $responseTime = '24-48 hours';
        if ($validated['inquiry_type'] === 'Technical Support') {
            $responseTime = '12-24 hours';
        } elseif ($validated['inquiry_type'] === 'Business Inquiry') {
            $responseTime = '2-3 business days';
        }

        Contact::create([
            'user_id' => $request->user()?->id,
            'name' => $validated['name'],
            'email' => $validated['email'],
            'inquiry_type' => $validated['inquiry_type'],
            'subject' => $validated['subject'],
            'message' => $validated['message'],
        ]);

        return redirect()
            ->route('contact.create')
            ->with('success', 'Your message has been sent. We will respond within ' . $responseTime . '.');
    }

    public function index(Request $request): View|RedirectResponse
    {
        $user = $request->user();

        if (! $user || ! $user->is_admin) {
            return redirect('/');
        }

        $contacts = Contact::query()
            ->orderByDesc('created_at')
            ->paginate(20);

        return view('admin.contacts.index', compact('contacts'));
    }

    public function show(Request $request, Contact $contact): View|RedirectResponse
    {
        $user = $request->user();

        if (! $user || ! $user->is_admin) {
            return redirect('/');
        }

        return view('admin.contacts.show', compact('contact'));
    }

    public function edit(Request $request, Contact $contact): View|RedirectResponse
    {
        $user = $request->user();

        if (! $user || ! $user->is_admin) {
            return redirect('/');
        }

        return view('admin.contacts.edit', compact('contact'));
    }

    public function update(Request $request, Contact $contact): RedirectResponse
    {
        $user = $request->user();

        if (! $user || ! $user->is_admin) {
            return redirect('/');
        }

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'subject' => ['required', 'string', 'max:255'],
            'message' => ['required', 'string'],
        ]);

        $contact->update($validated);

        return redirect()
            ->route('admin.contacts.index')
            ->with('success', 'Contact updated.');
    }

    public function destroy(Request $request, Contact $contact): RedirectResponse
    {
        $user = $request->user();

        if (! $user || ! $user->is_admin) {
            return redirect('/');
        }

        $contact->delete();

        return redirect()
            ->route('admin.contacts.index')
            ->with('success', 'Contact deleted.');
    }
}

