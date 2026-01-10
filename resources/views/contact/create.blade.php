<x-layout title="Contact">
    <div class="max-w-xl mx-auto py-12">

        <div class="mb-8 space-y-1 text-center">
            <h1 class="text-4xl font-extrabold tracking-tight">Contact us</h1>
            <p class="text-base-content/70 text-sm">
                We read every message. Replies typically within 24–48 hours.
            </p>
        </div>

        @if (session('success'))
            <div class="alert alert-success rounded-2xl shadow-sm mb-6">
                {{ session('success') }}
            </div>
        @endif

        <div class="card bg-base-100 shadow-xl rounded-2xl">
            <div class="card-body space-y-6">
                <form method="POST" action="{{ route('contact.store') }}">
                    @csrf

                    <fieldset class="space-y-5">

                        {{-- Name --}}
                        <x-form-field>
                            <x-form-label>Name</x-form-label>
                            <x-form-input type="text" name="name" class="input-bordered rounded-xl"
                                value="{{ old('name', $user?->first_name . ' ' . $user?->last_name) }}" required />
                            <x-form-error name="name" />
                        </x-form-field>

                        {{-- Email --}}
                        <x-form-field>
                            <x-form-label>Email</x-form-label>
                            <x-form-input type="email" name="email" class="input-bordered rounded-xl"
                                value="{{ old('email', $user?->email) }}" required />
                            <x-form-error name="email" />
                        </x-form-field>

                        {{-- Subject --}}
                        <x-form-field>
                            <x-form-label>Subject</x-form-label>
                            <x-form-input type="text" name="subject" class="input-bordered rounded-xl"
                                value="{{ old('subject') }}" required />
                            <x-form-error name="subject" />
                        </x-form-field>

                        {{-- Message --}}
                        <x-form-field>
                            <x-form-label>Message</x-form-label>
                            <textarea name="message" rows="6" class="textarea textarea-bordered rounded-xl w-full" required>{{ old('message') }}</textarea>
                            <x-form-error name="message" />
                        </x-form-field>

                        {{-- Submit --}}
                        <div class="pt-2">
                            <button type="submit" class="btn btn-primary w-full rounded-xl">
                                Send message
                            </button>
                        </div>

                    </fieldset>
                </form>

            </div>
        </div>
    </div>

</x-layout>
