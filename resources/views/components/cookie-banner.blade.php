<div data-cookie-banner class="fixed inset-x-0 bottom-0 z-30">
    <div class="mx-auto max-w-4xl px-4 pb-4">
        <div class="alert bg-base-100 shadow-lg border border-base-300 rounded-2xl">
            <div class="flex-1">
                <h3 class="font-semibold text-sm">We use cookies</h3>
                <p class="text-xs text-base-content/70">
                    FoodFusion uses cookies to improve your experience, remember preferences, and understand how the site is used.
                    You can accept or reject optional cookies at any time.
                </p>
                <a href="{{ route('privacy') }}" class="link link-hover text-xs mt-1 inline-block">
                    Learn more in our privacy policy
                </a>
            </div>
            <div class="flex flex-col sm:flex-row gap-2 sm:items-center">
                <button type="button" data-cookie-reject class="btn btn-ghost btn-sm">
                    Reject
                </button>
                <button type="button" data-cookie-accept class="btn btn-primary btn-sm">
                    Accept cookies
                </button>
            </div>
        </div>
    </div>

    <script>
        (function () {
            var banner = document.querySelector('[data-cookie-banner]');

            if (!banner) {
                return;
            }

            if (banner.dataset.cookieReady === 'true') {
                return;
            }

            var stored;

            try {
                stored = window.localStorage.getItem('foodfusion_cookie_consent');
            } catch (e) {
                stored = null;
            }

            if (stored === 'accepted' || stored === 'rejected') {
                banner.classList.add('hidden');
                return;
            }

            banner.dataset.cookieReady = 'true';

            var acceptButton = banner.querySelector('[data-cookie-accept]');
            var rejectButton = banner.querySelector('[data-cookie-reject]');

            function close() {
                banner.classList.add('hidden');
            }

            function sendConsent(accepted) {
                try {
                    window.localStorage.setItem('foodfusion_cookie_consent', accepted ? 'accepted' : 'rejected');
                } catch (e) {}

                var isAuth = window.foodfusionUserIsAuthenticated === true ||
                    window.foodfusionUserIsAuthenticated === 'true';

                if (!isAuth) {
                    return;
                }

                var tokenMeta = document.querySelector('meta[name="csrf-token"]');
                var token = tokenMeta ? tokenMeta.getAttribute('content') : '';

                fetch('/cookie-consent', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': token,
                        'Accept': 'application/json',
                    },
                    body: JSON.stringify({ accepted: !!accepted }),
                }).catch(function () {});
            }

            if (acceptButton) {
                acceptButton.addEventListener('click', function () {
                    sendConsent(true);
                    close();
                });
            }

            if (rejectButton) {
                rejectButton.addEventListener('click', function () {
                    sendConsent(false);
                    close();
                });
            }
        })();
    </script>
</div>
