<?php
/**
 * Navbar Component
 * Shared navbar untuk semua role
 */
$userName = $_SESSION['users']['username'] ?? 'User';
$userInitial = strtoupper(substr($userName, 0, 1));
$userRole = $_SESSION['users']['role'] ?? 'mahasiswa';
$roleDisplay = ucfirst($userRole);
?>

<!-- ════════════════ NAVBAR ════════════════ -->
<nav class="navbar">
  <button class="nav-icon-btn" id="sidebarToggle"><i class="fa-solid fa-sidebar"></i></button>

  <div class="navbar-search">
    <i class="fa-solid fa-magnifying-glass" style="color:var(--muted);font-size:13px;"></i>
    <input type="text" placeholder="Search...">
  </div>

  <div class="navbar-right">
    <button class="nav-icon-btn" id="themeToggle"><i class="fa-regular fa-moon"></i></button>
    
    <button class="nav-icon-btn" id="notificationBtn" style="position:relative;">
      <i class="fa-regular fa-bell"></i>
      <span class="nav-dot" style="background:#f59e0b;"></span>
    </button>

    <button class="nav-icon-btn" id="settingsBtn"><i class="fa-solid fa-gear"></i></button>

    <div class="nav-user-menu">
      <div class="nav-avatar" id="userMenuTrigger"><?= $userInitial ?></div>
      
      <!-- User Dropdown Menu -->
      <div class="nav-user-dropdown" id="userDropdown" style="display:none;">
        <div class="dropdown-header">
          <div class="dropdown-avatar"><?= $userInitial ?></div>
          <div>
            <div class="dropdown-name"><?= $userName ?></div>
            <div class="dropdown-role"><?= $roleDisplay ?></div>
          </div>
        </div>
        <div class="dropdown-divider"></div>
        <a href="/dashboard/<?= $userRole ?>/profile" class="dropdown-item">
          <i class="fa-solid fa-user"></i> Profil
        </a>
        <a href="/dashboard/<?= $userRole ?>/settings" class="dropdown-item">
          <i class="fa-solid fa-sliders"></i> Pengaturan
        </a>
        <div class="dropdown-divider"></div>
        <a href="/api/logout" class="dropdown-item logout">
          <i class="fa-solid fa-sign-out-alt"></i> Logout
        </a>
      </div>
    </div>
  </div>
</nav>

<script>
  // Toggle user dropdown
  const userMenuTrigger = document.getElementById('userMenuTrigger');
  const userDropdown = document.getElementById('userDropdown');

  userMenuTrigger.addEventListener('click', (e) => {
    e.stopPropagation();
    userDropdown.style.display = userDropdown.style.display === 'none' ? 'block' : 'none';
  });

  // Close dropdown when clicking outside
  document.addEventListener('click', () => {
    userDropdown.style.display = 'none';
  });

  // Logout handler
  document.querySelector('.logout')?.addEventListener('click', async (e) => {
    e.preventDefault();
    try {
      const response = await fetch('/api/logout', { method: 'POST' });
      const data = await response.json();
      if (data.success) {
        window.location.href = '/';
      }
    } catch (error) {
      console.error('Logout error:', error);
    }
  });
</script>
