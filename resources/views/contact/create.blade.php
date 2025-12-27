<x-layout title="Contact">
    <div class="max-w-xl mx-auto py-10">
        <h1 class="text-3xl font-semibold mb-6">Contact us</h1>

        @if (session('success'))
            <p class="mb-4 text-sm text-success">
                {{ session('success') }}
            </p>
        @endif

        <form method="POST" action="{{ route('contact.store') }}">
            @csrf

            <fieldset class="space-y-4">
                <x-form-field>
                    <x-form-label>Name</x-form-label>
                    <x-form-input type="text" name="name"
                        value="{{ old('name', $user?->first_name . ' ' . $user?->last_name) }}" required />
                    <x-form-error name="name" />
                </x-form-field>

                <x-form-field>
                    <x-form-label>Email</x-form-label>
                    <x-form-input type="email" name="email" value="{{ old('email', $user?->email) }}" required />
                    <x-form-error name="email" />
                </x-form-field>

                <x-form-field>
                    <x-form-label>Subject</x-form-label>
                    <x-form-input type="text" name="subject" value="{{ old('subject') }}" required />
                    <x-form-error name="subject" />
                </x-form-field>

                <x-form-field>
                    <x-form-label>Message</x-form-label>
                    <textarea name="message" class="textarea textarea-bordered w-full" rows="6" required>{{ old('message') }}</textarea>
                    <x-form-error name="message" />
                </x-form-field>

                <x-form-button class="mt-2">
                    Send message
                </x-form-button>
            </fieldset>
        </form>
    </div>
</x-layout>

