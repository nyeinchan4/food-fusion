<x-layout title="Admin Contacts">
    <div class="max-w-4xl mx-auto py-10">
        <h1 class="text-3xl font-semibold mb-6">Contact messages</h1>

        @if (session('success'))
            <p class="mb-4 text-sm text-success">
                {{ session('success') }}
            </p>
        @endif

        @if ($contacts->isEmpty())
            <p class="text-sm text-base-content/70">No contact messages yet.</p>
        @else
            <div class="overflow-x-auto">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Received</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($contacts as $contact)
                            <tr>
                                <td>{{ $contact->name }}</td>
                                <td>{{ $contact->email }}</td>
                                <td>{{ $contact->subject }}</td>
                                <td>{{ $contact->created_at?->diffForHumans() }}</td>
                                <td class="flex gap-2 justify-end">
                                    <a href="{{ route('admin.contacts.show', $contact) }}"
                                        class="btn btn-xs btn-outline">
                                        View
                                    </a>
                                    <a href="{{ route('admin.contacts.edit', $contact) }}"
                                        class="btn btn-xs btn-outline">
                                        Edit
                                    </a>
                                    <form method="POST" action="{{ route('admin.contacts.destroy', $contact) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-xs btn-error" type="submit">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $contacts->links() }}
            </div>
        @endif
    </div>
</x-layout>

