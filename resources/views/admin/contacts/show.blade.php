<x-layout title="Contact message">
    <div class="max-w-2xl mx-auto py-10 space-y-4">
        <div class="flex items-center justify-between gap-4">
            <h1 class="text-3xl font-semibold">Contact message</h1>
            <a href="{{ route('admin.contacts.edit', $contact) }}" class="btn btn-sm btn-outline">
                Edit
            </a>
        </div>

        <div class="space-y-2 text-sm text-base-content/80">
            <p><span class="font-semibold">Name:</span> {{ $contact->name }}</p>
            <p><span class="font-semibold">Email:</span> {{ $contact->email }}</p>
            <p><span class="font-semibold">Subject:</span> {{ $contact->subject }}</p>
            <p><span class="font-semibold">Received:</span> {{ $contact->created_at?->diffForHumans() }}</p>
        </div>

        <div class="prose max-w-none">
            <p>{{ $contact->message }}</p>
        </div>

        <div class="mt-6 flex gap-2">
            <a href="{{ route('admin.contacts.index') }}" class="btn btn-sm">
                Back to list
            </a>
            <form method="POST" action="{{ route('admin.contacts.destroy', $contact) }}">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-error" type="submit">
                    Delete
                </button>
            </form>
        </div>
    </div>
</x-layout>

