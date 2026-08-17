<x-layout title="Contact">
    <div class="py-12">
        <!-- Hero Section -->
        <div class="mb-12 space-y-2 text-center max-w-3xl mx-auto px-4">
            <h1 class="text-4xl font-extrabold tracking-tight">Contact Us</h1>
            <p class="text-base-content/70 text-lg max-w-2xl mx-auto">
                We're here to help! Choose your preferred way to reach us below.
            </p>
        </div>

        <!-- Success Message -->
        @if (session('success'))
            <div class="alert alert-success rounded-2xl shadow-sm mb-6 max-w-3xl mx-auto">
                <div class="flex items-center gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 stroke-current" fill="none" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <div>
                        <h3 class="font-bold">Message Sent Successfully!</h3>
                        <p class="text-sm">{{ session('success') }} We'll respond within 24-48 hours.</p>
                    </div>
                </div>
            </div>
        @endif

        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Business Information -->
                <div class="lg:col-span-1 space-y-8">
                    <!-- Address Section -->
                    <div class="card bg-base-100 shadow-lg rounded-2xl overflow-hidden">
                        <div class="card-body">
                            <h2 class="text-2xl font-bold mb-4 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                Our Location
                            </h2>
                            <address class="not-italic space-y-2 text-base-content/80">
                                <p class="font-medium">Food Fusion Headquarters</p>
                                <p>123 Culinary Avenue</p>
                                <p>Foodie District, FF 12345</p>
                                <p>Myanmar</p>
                            </address>
                        </div>
                    </div>

                    <!-- Contact Information -->
                    <div class="card bg-base-100 shadow-lg rounded-2xl overflow-hidden">
                        <div class="card-body">
                            <h2 class="text-2xl font-bold mb-4 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 text-secondary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                                Contact Details
                            </h2>
                            <div class="space-y-4">
                                <div>
                                    <p class="font-medium">General Inquiries:</p>
                                    <p><a href="mailto:info@foodfusion.com" class="link link-hover text-primary">info@foodfusion.com</a></p>
                                    <p><a href="tel:+959123456789" class="link link-hover">+95 9 123 456 789</a></p>
                                </div>
                                <div>
                                    <p class="font-medium">Customer Support:</p>
                                    <p><a href="mailto:support@foodfusion.com" class="link link-hover text-primary">support@foodfusion.com</a></p>
                                    <p><a href="tel:+959987654321" class="link link-hover">+95 9 987 654 321</a></p>
                                </div>
                                <div>
                                    <p class="font-medium">Business Hours:</p>
                                    <p>Monday - Friday: 9:00 AM - 6:00 PM</p>
                                    <p>Saturday: 10:00 AM - 4:00 PM</p>
                                    <p>Sunday: Closed</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Social Media Links -->
                    <div class="card bg-base-100 shadow-lg rounded-2xl overflow-hidden">
                        <div class="card-body">
                            <h2 class="text-2xl font-bold mb-4 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 text-accent" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                </svg>
                                Connect With Us
                            </h2>
                            <div class="flex flex-wrap gap-4">
                                <a href="https://facebook.com/foodfusion" class="btn btn-outline btn-primary" target="_blank" rel="noopener noreferrer">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-current">
                                        <path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"></path>
                                    </svg>
                                    Facebook
                                </a>
                                <a href="https://twitter.com/foodfusion" class="btn btn-outline btn-info" target="_blank" rel="noopener noreferrer">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-current">
                                        <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"></path>
                                    </svg>
                                    Twitter
                                </a>
                                <a href="https://instagram.com/foodfusion" class="btn btn-outline btn-secondary" target="_blank" rel="noopener noreferrer">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-current">
                                        <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                                    </svg>
                                    Instagram
                                </a>
                                <a href="https://youtube.com/foodfusion" class="btn btn-outline btn-error" target="_blank" rel="noopener noreferrer">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-current">
                                        <path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"></path>
                                    </svg>
                                    YouTube
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contact Form and Map -->
                <div class="lg:col-span-2 space-y-8">
                    <!-- Contact Form -->
                    <div class="card bg-base-100 shadow-xl rounded-2xl">
                        <div class="card-body space-y-6">
                            <h2 class="text-2xl font-bold mb-2 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                Send Us a Message
                            </h2>
                            <p class="text-base-content/70 mb-4">
                                Fill out the form below and we'll get back to you within 24-48 hours.
                            </p>
                            <form method="POST" action="{{ route('contact.store') }}" class="space-y-5">
                                @csrf

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                                    {{-- Name --}}
                                    <x-form-field>
                                        <x-form-label>Full Name</x-form-label>
                                        <x-form-input type="text" name="name" class="input-bordered rounded-xl"
                                            value="{{ old('name', $user?->first_name . ' ' . $user?->last_name) }}" required />
                                        <x-form-error name="name" />
                                    </x-form-field>

                                    {{-- Email --}}
                                    <x-form-field>
                                        <x-form-label>Email Address</x-form-label>
                                        <x-form-input type="email" name="email" class="input-bordered rounded-xl"
                                            value="{{ old('email', $user?->email) }}" required />
                                        <x-form-error name="email" />
                                    </x-form-field>
                                </div>

                                {{-- Inquiry Type --}}
                                <x-form-field>
                                    <x-form-label>Inquiry Type</x-form-label>
                                    <select name="inquiry_type" class="select select-bordered w-full rounded-xl" required>
                                        <option value="" disabled {{ old('inquiry_type') ? '' : 'selected' }}>Select an inquiry type</option>
                                        <option value="General Question" {{ old('inquiry_type') == 'General Question' ? 'selected' : '' }}>General Question</option>
                                        <option value="Technical Support" {{ old('inquiry_type') == 'Technical Support' ? 'selected' : '' }}>Technical Support</option>
                                        <option value="Recipe Suggestion" {{ old('inquiry_type') == 'Recipe Suggestion' ? 'selected' : '' }}>Recipe Suggestion</option>
                                        <option value="Business Inquiry" {{ old('inquiry_type') == 'Business Inquiry' ? 'selected' : '' }}>Business Inquiry</option>
                                        <option value="Feedback" {{ old('inquiry_type') == 'Feedback' ? 'selected' : '' }}>Feedback</option>
                                        <option value="Other" {{ old('inquiry_type') == 'Other' ? 'selected' : '' }}>Other</option>
                                    </select>
                                    <x-form-error name="inquiry_type" />
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
                                    <div class="relative">
                                        <textarea name="message" rows="6" class="textarea textarea-bordered rounded-xl w-full" 
                                            maxlength="1000" required>{{ old('message') }}</textarea>
                                        <div class="absolute bottom-2 right-2 text-xs text-base-content/60">
                                            <span id="char-count">0</span>/1000 characters
                                        </div>
                                    </div>
                                    <p class="text-xs text-base-content/60 mt-1">Please be specific with your inquiry to help us assist you better.</p>
                                    <x-form-error name="message" />
                                </x-form-field>

                                {{-- Submit --}}
                                <div class="pt-2">
                                    <button type="submit" class="btn btn-primary rounded-xl">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                                        </svg>
                                        Send Message
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Map -->
                    <div class="card bg-base-100 shadow-xl rounded-2xl overflow-hidden">
                        <div class="card-body p-4">
                            <h2 class="text-2xl font-bold mb-2 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 text-secondary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7" />
                                </svg>
                                Find Us
                            </h2>
                            <div class="h-80 rounded-xl overflow-hidden">
                                <iframe 
                                    width="100%" 
                                    height="100%" 
                                    frameborder="0" 
                                    style="border:0" 
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d488797.9766570747!2d95.90136529844741!3d16.838952489114393!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c1949e223e196b%3A0x56fbd271f8080bb4!2sYangon%2C%20Myanmar%20(Burma)!5e0!3m2!1sen!2sus!4v1673891020561!5m2!1sen!2sus" 
                                    allowfullscreen="" 
                                    loading="lazy" 
                                    referrerpolicy="no-referrer-when-downgrade">
                                </iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- FAQ Section -->
            <div class="mt-12 max-w-4xl mx-auto">
                <h2 class="text-3xl font-bold mb-8 text-center">Frequently Asked Questions</h2>
                
                <div class="space-y-4">
                    <div class="collapse collapse-plus bg-base-100 shadow-md rounded-xl">
                        <input type="radio" name="faq-accordion" checked="checked" /> 
                        <div class="collapse-title text-xl font-medium">
                            How do I submit my own recipe to Food Fusion?
                        </div>
                        <div class="collapse-content"> 
                            <p>You can submit your recipes through our Community Cookbook section. Simply create an account, navigate to the Community Cookbook, and click on "Share Your Recipe". Fill out the form with your recipe details, upload photos if available, and submit for review.</p>
                        </div>
                    </div>
                    
                    <div class="collapse collapse-plus bg-base-100 shadow-md rounded-xl">
                        <input type="radio" name="faq-accordion" /> 
                        <div class="collapse-title text-xl font-medium">
                            What types of recipes are accepted on Food Fusion?
                        </div>
                        <div class="collapse-content"> 
                            <p>We welcome all types of recipes, from traditional dishes to innovative fusion creations. Our platform celebrates culinary diversity, so feel free to share recipes from any cuisine or dietary preference. All submissions are reviewed to ensure they meet our community guidelines.</p>
                        </div>
                    </div>
                    
                    <div class="collapse collapse-plus bg-base-100 shadow-md rounded-xl">
                        <input type="radio" name="faq-accordion" /> 
                        <div class="collapse-title text-xl font-medium">
                            How can I report an issue with the website?
                        </div>
                        <div class="collapse-content"> 
                            <p>If you encounter any technical issues, please use our contact form and select "Technical Support" as the inquiry type. Provide as much detail as possible, including the device and browser you're using, and steps to reproduce the issue. Our tech team will investigate and respond within 48 hours.</p>
                        </div>
                    </div>
                    
                    <div class="collapse collapse-plus bg-base-100 shadow-md rounded-xl">
                        <input type="radio" name="faq-accordion" /> 
                        <div class="collapse-title text-xl font-medium">
                            Do you offer cooking classes or workshops?
                        </div>
                        <div class="collapse-content"> 
                            <p>Yes! Food Fusion regularly hosts cooking classes and workshops both online and at our culinary center in Yangon. Check our Events section for upcoming classes, or contact us directly for private group bookings and corporate team-building cooking events.</p>
                        </div>
                    </div>
                    
                    <div class="collapse collapse-plus bg-base-100 shadow-md rounded-xl">
                        <input type="radio" name="faq-accordion" /> 
                        <div class="collapse-title text-xl font-medium">
                            How can I collaborate with Food Fusion?
                        </div>
                        <div class="collapse-content"> 
                            <p>We're always open to collaborations with chefs, food bloggers, nutritionists, and brands that align with our values. Please use our contact form and select "Business Inquiry" as the inquiry type. Include details about your proposal, and our partnerships team will get back to you.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Character counter for message textarea
        document.addEventListener('DOMContentLoaded', function() {
            const textarea = document.querySelector('textarea[name="message"]');
            const charCount = document.getElementById('char-count');
            
            if (textarea && charCount) {
                // Update on page load
                charCount.textContent = textarea.value.length;
                
                // Update on input
                textarea.addEventListener('input', function() {
                    charCount.textContent = textarea.value.length;
                });
            }
        });
    </script>
</x-layout>
