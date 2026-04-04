const ADMIN_USERNAME = 'admin';
const ADMIN_PASSWORD = 'admin';
const AUTH_STORAGE_KEY = 'xii_tkj3_admin_auth';

function isAdminLoggedIn() {
    return localStorage.getItem(AUTH_STORAGE_KEY) === 'true';
}

function setAdminLoggedIn(value) {
    localStorage.setItem(AUTH_STORAGE_KEY, value ? 'true' : 'false');
    window.dispatchEvent(new CustomEvent('authchange', { detail: { isLoggedIn: value } }));
}

function ensureAuthModal() {
    if (document.getElementById('authModal')) {
        return;
    }

    const wrapper = document.createElement('div');
    wrapper.innerHTML = `
        <div class="auth-modal hidden" id="authModal" aria-hidden="true">
            <div class="auth-panel">
                <div class="auth-panel-top">
                    <div class="auth-panel-title">Login Admin</div>
                    <button type="button" class="auth-close-btn" id="closeAuthModal" aria-label="Tutup login">&times;</button>
                </div>
                <form id="authForm">
                    <div class="auth-field">
                        <label for="authUsername">Username</label>
                        <input type="text" id="authUsername" autocomplete="username" required>
                    </div>
                    <div class="auth-field">
                        <label for="authPassword">Password</label>
                        <input type="password" id="authPassword" autocomplete="current-password" required>
                    </div>
                    <div class="auth-actions">
                        <button type="submit" class="auth-submit-btn">Masuk</button>
                        <span id="authStatus" class="auth-status"></span>
                    </div>
                </form>
            </div>
        </div>
    `;

    document.body.appendChild(wrapper.firstElementChild);

    const modal = document.getElementById('authModal');
    const closeBtn = document.getElementById('closeAuthModal');
    const form = document.getElementById('authForm');
    const status = document.getElementById('authStatus');

    function closeModal() {
        modal.classList.add('hidden');
        modal.setAttribute('aria-hidden', 'true');
        document.body.classList.remove('auth-modal-open');
        status.textContent = '';
        status.className = 'auth-status';
        form.reset();
    }

    closeBtn.addEventListener('click', closeModal);
    modal.addEventListener('click', (e) => {
        if (e.target === modal) closeModal();
    });

    window.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
            closeModal();
        }
    });

    form.addEventListener('submit', (e) => {
        e.preventDefault();
        const username = document.getElementById('authUsername').value.trim();
        const password = document.getElementById('authPassword').value.trim();

        if (username === ADMIN_USERNAME && password === ADMIN_PASSWORD) {
            setAdminLoggedIn(true);
            closeModal();
            return;
        }

        status.textContent = 'Username atau password salah.';
        status.className = 'auth-status error';
    });
}

function openAuthModal() {
    ensureAuthModal();
    const modal = document.getElementById('authModal');
    modal.classList.remove('hidden');
    modal.setAttribute('aria-hidden', 'false');
    document.body.classList.add('auth-modal-open');
    const usernameInput = document.getElementById('authUsername');
    if (usernameInput) {
        usernameInput.focus();
    }
}

function requireAdminAccess() {
    if (isAdminLoggedIn()) {
        return true;
    }

    openAuthModal();
    return false;
}

function updateAuthToggle() {
    const authToggle = document.getElementById('authToggle');
    if (!authToggle) return;

    if (isAdminLoggedIn()) {
        authToggle.textContent = 'Logout';
        authToggle.dataset.state = 'logged-in';
    } else {
        authToggle.textContent = 'Login';
        authToggle.dataset.state = 'logged-out';
    }
}

function initAuthUI() {
    ensureAuthModal();
    const authToggle = document.getElementById('authToggle');
    if (authToggle && !authToggle.dataset.bound) {
        authToggle.dataset.bound = 'true';
        authToggle.addEventListener('click', () => {
            if (isAdminLoggedIn()) {
                setAdminLoggedIn(false);
                return;
            }

            openAuthModal();
        });
    }

    updateAuthToggle();
}

window.isAdminLoggedIn = isAdminLoggedIn;
window.requireAdminAccess = requireAdminAccess;

window.addEventListener('authchange', updateAuthToggle);
window.addEventListener('DOMContentLoaded', initAuthUI);
