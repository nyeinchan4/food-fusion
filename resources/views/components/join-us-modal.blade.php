<dialog id="join_us_modal" class="modal">
    <div class="modal-box w-11/12 max-w-lg">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="font-bold text-2xl mb-4 text-center">Join Food Fusion</h3>
        <p class="text-sm text-center mb-6 text-base-content/70">Create an account to save recipes and join the community.</p>
        
        <form id="join-us-form" class="space-y-4">
            <div class="grid grid-cols-2 gap-4">
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">First Name</span>
                    </label>
                    <input type="text" name="first_name" placeholder="John" class="input input-bordered w-full" required />
                    <span class="text-error text-xs mt-1 hidden" id="error-first_name"></span>
                </div>
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Last Name</span>
                    </label>
                    <input type="text" name="last_name" placeholder="Doe" class="input input-bordered w-full" required />
                    <span class="text-error text-xs mt-1 hidden" id="error-last_name"></span>
                </div>
            </div>

            <div class="form-control">
                <label class="label">
                    <span class="label-text">Email</span>
                </label>
                <input type="email" name="email" placeholder="john@example.com" class="input input-bordered w-full" required />
                <span class="text-error text-xs mt-1 hidden" id="error-email"></span>
            </div>

            <div class="form-control">
                <label class="label">
                    <span class="label-text">Password</span>
                </label>
                <input type="password" name="password" placeholder="********" class="input input-bordered w-full" required />
                <span class="text-error text-xs mt-1 hidden" id="error-password"></span>
            </div>

            <div class="form-control">
                <label class="label">
                    <span class="label-text">Confirm Password</span>
                </label>
                <input type="password" name="password_confirmation" placeholder="********" class="input input-bordered w-full" required />
            </div>

            <div class="form-control mt-6">
                <button type="submit" class="btn btn-primary w-full" id="join-us-submit">Create Account</button>
            </div>
            
            <div id="join-us-general-error" class="alert alert-error hidden mt-4 text-sm py-2"></div>
            <div id="join-us-success" class="alert alert-success hidden mt-4 text-sm py-2"></div>
        </form>
        
        <div class="text-center mt-4 text-sm">
            Already have an account? <a href="{{ route('login') }}" class="link link-primary">Log in</a>
        </div>
    </div>
</dialog>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('join-us-form');
        const submitBtn = document.getElementById('join-us-submit');
        const successMsg = document.getElementById('join-us-success');
        const generalError = document.getElementById('join-us-general-error');

        form.addEventListener('submit', async function(e) {
            e.preventDefault();
            
            // Reset errors
            document.querySelectorAll('[id^="error-"]').forEach(el => {
                el.classList.add('hidden');
                el.textContent = '';
            });
            generalError.classList.add('hidden');
            successMsg.classList.add('hidden');
            
            // Loading state
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<span class="loading loading-spinner"></span> Creating...';

            const formData = new FormData(form);
            const data = Object.fromEntries(formData.entries());

            try {
                const response = await fetch('{{ route("register") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify(data)
                });

                const result = await response.json();

                if (response.ok) {
                    successMsg.textContent = result.message || 'Account created successfully!';
                    successMsg.classList.remove('hidden');
                    form.reset();
                    
                    // Optional: Close modal or redirect after delay
                    setTimeout(() => {
                        window.location.href = result.redirect || '{{ route("login") }}';
                    }, 2000);
                } else {
                    if (result.errors) {
                        Object.keys(result.errors).forEach(key => {
                            const errorEl = document.getElementById(`error-${key}`);
                            if (errorEl) {
                                errorEl.textContent = result.errors[key][0];
                                errorEl.classList.remove('hidden');
                            }
                        });
                    } else {
                        generalError.textContent = result.message || 'Something went wrong.';
                        generalError.classList.remove('hidden');
                    }
                }
            } catch (error) {
                console.error('Error:', error);
                generalError.textContent = 'An unexpected error occurred. Please try again.';
                generalError.classList.remove('hidden');
            } finally {
                submitBtn.disabled = false;
                submitBtn.textContent = 'Create Account';
            }
        });
    });
</script>
