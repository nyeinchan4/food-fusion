<x-layout title="Edit contact">
    <div class="max-w-xl mx-auto py-10">
        <h1 class="text-3xl font-semibold mb-6">Edit contact message</h1>

        <form method="POST" action="{{ route('admin.contacts.update', $contact) }}">
            @csrf
            @method('PUT')

            <fieldset class="space-y-4">
                <x-form-field>
                    <x-form-label>Name</x-form-label>
                    <x-form-input type="text" name="name" value="{{ old('name', $contact->name) }}" required />
                    <x-form-error name="name" />
                </x-form-field>

                <x-form-field>
                    <x-form-label>Email</x-form-label>
                    <x-form-input type="email" name="email" value="{{ old('email', $contact->email) }}" required />
                    <x-form-error name="email" />
                </x-form-field>

                <x-form-field>
                    <x-form-label>Subject</x-form-label>
                    <x-form-input type="text" name="subject" value="{{ old('subject', $contact->subject) }}" required />
                    <x-form-error name="subject" />
                </x-form-field>

                <x-form-field>
                    <x-form-label>Message</x-form-label>
                    <textarea name="message" class="textarea textarea-bordered w-full" rows="6" required>{{ old('message', $contact->message) }}</textarea>
                    <x-form-error name="message" />
                </x-form-field>

                <x-form-button class="mt-2">
                    Save changes
                </x-form-button>
            </fieldset>
        </form>

        <div class="mt-4">
            <a href="{{ route('admin.contacts.index') }}" class="link link-hover text-sm">
                Back to list
            </a>
        </div>
    </div>
</x-layout>

