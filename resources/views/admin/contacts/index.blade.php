<x-layout title="Admin Contacts">
    <div class="max-w-5xl min-h-screen mx-auto py-10">

        <div class="flex items-center justify-between mb-6">
            <h1 class="text-3xl font-bold tracking-tight">Contact messages</h1>

            {{-- Optional: message count --}}
            <span class="badge badge-primary badge-outline">
                {{ $contacts->total() }} total
            </span>
        </div>

        @if (session('success'))
            <div class="alert alert-success mb-4 rounded-xl shadow-sm">
                {{ session('success') }}
            </div>
        @endif

        @if ($contacts->isEmpty())

            <div class="card bg-base-100 shadow-sm rounded-2xl p-10 text-center">
                <p class="text-base-content/70">No contact messages yet.</p>
            </div>
        @else
            <div class="card bg-base-100 shadow-md rounded-2xl">
                <div class="card-body p-0">

                    <div class="overflow-x-auto rounded-2xl">
                        <table class="table table-zebra">
                            <thead class="bg-base-200 sticky top-0 z-10">
                                <tr class="text-sm text-base-content/70 uppercase tracking-wide">
                                    <th class="rounded-tl-2xl">Name</th>
                                    <th>Email</th>
                                    <th>Subject</th>
                                    <th>Received</th>
                                    <th class="rounded-tr-2xl text-right">Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($contacts as $contact)
                                    <tr class="hover:bg-base-200/60 transition-colors">
                                        <td class="font-medium">
                                            {{ $contact->name }}
                                        </td>

                                        <td>
                                            <span class="badge badge-outline">
                                                {{ $contact->email }}
                                            </span>
                                        </td>

                                        <td class="truncate max-w-xs">
                                            {{ $contact->subject }}
                                        </td>

                                        <td class="text-sm text-base-content/60">
                                            {{ $contact->created_at?->diffForHumans() }}
                                        </td>

                                        <td>
                                            <div class="flex gap-2 justify-end">

                                                <a href="{{ route('admin.contacts.show', $contact) }}"
                                                    class="btn btn-xs btn-ghost">
                                                    View
                                                </a>

                                                <a href="{{ route('admin.contacts.edit', $contact) }}"
                                                    class="btn btn-xs btn-outline">
                                                    Edit
                                                </a>

                                                <form method="POST"
                                                    action="{{ route('admin.contacts.destroy', $contact) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-xs btn-error btn-soft">
                                                        Delete
                                                    </button>
                                                </form>

                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>

                </div>
            </div>

            <div class="mt-6">
                {{ $contacts->links() }}
            </div>

        @endif
    </div>

</x-layout>
