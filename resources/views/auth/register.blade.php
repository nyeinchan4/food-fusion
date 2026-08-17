<x-layout title="Register">
    <section class="bg-gray-50 min-h-screen flex items-center justify-center">
        <!-- register container -->
        <div class="bg-white flex rounded-2xl shadow-lg max-w-4xl p-5 items-center">

            <!-- form -->
            <div class="md:w-1/2 px-8 md:px-16">
                <h2 class="font-bold text-2xl text-accent">Register</h2>
                <p class="text-xs my-4 text-secondary">
                    Create a new account to get started
                </p>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <fieldset class="fieldset w-full">
                        <x-form-field>
                            <x-form-label>First Name</x-form-label>
                            <x-form-input type="text" name="first_name" placeholder="First Name" required />
                            <x-form-error name="first_name" />
                        </x-form-field>
                                                <x-form-field>
                            <x-form-label>Last Name</x-form-label>
                            <x-form-input type="text" name="last_name" placeholder="Last Name" required />
                            <x-form-error name="last_name" />
                        </x-form-field>

                        <x-form-field>
                            <x-form-label>Email</x-form-label>
                            <x-form-input type="email" name="email" placeholder="Email" required />
                            <x-form-error name="email" />

                        </x-form-field>

                        <x-form-field>
                            <x-form-label>Password</x-form-label>
                            <x-form-input type="password" name="password" placeholder="Password" required />
                            <x-form-error name="password" />
                        </x-form-field>

                        <x-form-field>
                            <x-form-label>Confirm Password</x-form-label>
                            <x-form-input type="password" name="password_confirmation" placeholder="Confirm Password"
                                required />
                            <x-form-error name="password_confirmation" />
                        </x-form-field>

                        <button class="btn btn-accent mt-4 w-full">
                            Register
                        </button>

                    </fieldset>
                        @error('error')
                        <p class="mt-2 text-error text-xs">{{ $message }}</p>
                    @enderror
                </form>

                <div class="mt-6 text-center">
                    <p class="text-xs text-secondary">
                        Already have an account?
                    </p>
                    <a href="{{ route('login') }}"
                        class="btn btn-outline btn-secondary w-full mt-4 hover:scale-105 duration-300">
                        Login
                    </a>
                </div>
            </div>

            <!-- image -->
            <div class="md:block hidden w-1/2">
                <img class="rounded-2xl"
                    src="{{ asset('assets/images/register-visual.webp') }}"
                    alt="Register image">
            </div>
        </div>
    </section>
</x-layout>
