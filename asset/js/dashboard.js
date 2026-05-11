/**
 * Dashboard JavaScript
 * Shared functionality untuk dashboard
 */

document.addEventListener('DOMContentLoaded', function () {
  initializeTheme();
  initializeSidebar();
  initializeUserMenu();
});

/**
 * Initialize theme toggle
 */
function initializeTheme() {
  const themeToggle = document.getElementById('themeToggle');
  const savedTheme = localStorage.getItem('theme') || 'light';

  document.documentElement.setAttribute('data-theme', savedTheme);

  themeToggle?.addEventListener('click', function () {
    const currentTheme = document.documentElement.getAttribute('data-theme');
    const newTheme = currentTheme === 'light' ? 'dark' : 'light';

    document.documentElement.setAttribute('data-theme', newTheme);
    localStorage.setItem('theme', newTheme);

    // Update icon
    themeToggle.innerHTML = newTheme === 'light'
      ? '<i class="fa-solid fa-sun"></i>'
      : '<i class="fa-regular fa-moon"></i>';
  });
}

/**
 * Initialize sidebar toggle
 */
function initializeSidebar() {
  const sidebarToggle = document.getElementById('sidebarToggle');
  const sidebar = document.querySelector('.sidebar');

  sidebarToggle?.addEventListener('click', function () {
    sidebar?.classList.toggle('active');
  });

  // Close sidebar when clicking outside on mobile
  document.addEventListener('click', function (e) {
    if (!sidebar?.contains(e.target) && !sidebarToggle?.contains(e.target)) {
      sidebar?.classList.remove('active');
    }
  });
}

/**
 * Initialize user menu
 */
function initializeUserMenu() {
  const userMenuTrigger = document.getElementById('userMenuTrigger');
  const userDropdown = document.getElementById('userDropdown');

  userMenuTrigger?.addEventListener('click', function (e) {
    e.stopPropagation();
    userDropdown.style.display = userDropdown.style.display === 'none' ? 'block' : 'none';
  });

  // Close dropdown when clicking outside
  document.addEventListener('click', function () {
    userDropdown.style.display = 'none';
  });

  // Logout handler
  document.querySelector('.logout')?.addEventListener('click', async function (e) {
    e.preventDefault();

    if (!confirm('Apakah Anda yakin ingin logout?')) {
      return;
    }

    try {
      const response = await fetch('/api/logout', { method: 'POST' });
      const data = await response.json();

      if (data.success) {
        window.location.href = '/';
      } else {
        alert('Error: ' + data.message);
      }
    } catch (error) {
      console.error('Logout error:', error);
      alert('Terjadi error saat logout');
    }
  });
}

/**
 * Set active sidebar item
 */
function setActiveSidebarItem(path) {
  document.querySelectorAll('.sidebar-item').forEach(item => {
    item.classList.remove('active');
    if (item.getAttribute('href') === path) {
      item.classList.add('active');
    }
  });
}

/**
 * Show notification
 */
function showNotification(message, type = 'info') {
  // Gunakan SweetAlert2 jika tersedia
  if (typeof Swal !== 'undefined') {
    Swal.fire({
      icon: type,
      title: type === 'error' ? 'Error' : type === 'success' ? 'Success' : 'Info',
      text: message,
      timer: 3000,
      timerProgressBar: true,
    });
  } else {
    alert(message);
  }
}

/**
 * API Helper
 */
async function apiCall(url, options = {}) {
  const defaultOptions = {
    headers: {
      'Content-Type': 'application/json',
    },
  };

  const mergedOptions = { ...defaultOptions, ...options };

  try {
    const response = await fetch(url, mergedOptions);
    const data = await response.json();

    if (!response.ok) {
      throw new Error(data.message || 'Request failed');
    }

    return data;
  } catch (error) {
    console.error('API Error:', error);
    throw error;
  }
}
