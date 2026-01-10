<x-layout title="Login">
    <section class="bg-gray-50 min-h-screen flex items-center justify-center">
        <!-- login container -->
        <div class="bg-white flex rounded-2xl shadow-lg max-w-4xl p-5 items-center">

            <!-- form -->
            <div class="md:w-1/2 px-8 md:px-16">
                <h2 class="font-bold text-2xl text-accent">Login</h2>
                <p class="text-xs my-4 text-secondary">If you are already a member, easily log in</p>

                <!-- use your original login card here -->
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <fieldset class="fieldset w-full">
                        <x-form-field>
                            <x-form-label class="x-form-label">Email</x-form-label>
                            <x-form-input type="email" name="email" class="x-form-input x-form-input-bordered"
                                placeholder="Email" required />
                        </x-form-field>

                        <x-form-field>
                            <x-form-label class="x-form-label">Password</x-form-label>
                            <x-form-input type="password" name="password" class="x-form-input x-form-input-bordered"
                                placeholder="Password" required />
                        </x-form-field>

                        <div>
                            {{-- <a href="#" class="link link-hover">Forgot password?</a> --}}
                        </div>

                        <button class="btn btn-accent mt-4 w-full">Login</button>
                    </fieldset>
                    @error('error')
                        <p class="mt-2 text-error text-xs">{{ $message }}</p>
                    @enderror
                </form>


                <div class="mt-6 grid grid-cols-3 items-center text-gray-400">
                    <hr class="border-gray-400">
                    <p class="text-center text-sm">OR</p>
                    <hr class="border-gray-400">
                </div>
                <p class="text-xs text-secondary mt-8">Don't have an account?</p>

                <a href='/register' class="btn btn-outline btn-secondary hover:scale-105 duration-300 w-full my-4">
                    Register
                </a>



                {{-- <div class="mt-3 text-xs flex justify-between items-center text-[#002D74]">
                    <button class="py-2 px-5 bg-white border rounded-xl hover:scale-110 duration-300">Register</button>
                </div> --}}
            </div>

            <!-- image -->
            <div class="md:block hidden w-1/2">
                <img class="rounded-2xl"
                    src="{{ asset('assets/images/login-visual.webp') }}"
                    alt="Login image">
            </div>
        </div>
    </section>
</x-layout>
