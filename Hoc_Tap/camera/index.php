<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Hệ Thống Camera Giao Thông</title>
<link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="main.css">
</head>
<body>
<div class="container">

  <header>
    <div class="header-left">
      <div class="logo-icon">
        <svg viewBox="0 0 24 24"><path d="M17 10.5V7a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h12a1 1 0 001-1v-3.5l4 4v-11l-4 4z"/></svg>
      </div>
      <div class="header-title">
        <h1>Camera Giao Thông</h1>
        <p>Traffic Surveillance System · v1.0</p>
      </div>
    </div>
    <div class="header-right">
      <div class="api-badge">
        <span class="dot"></span>
        <span>45.77.240.85:8080/o/c/camerainfos</span>
      </div>
      <button class="btn-fetch" onclick="fetchCameras()">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
          <polyline points="23 4 23 10 17 10"/><polyline points="1 20 1 14 7 14"/>
          <path d="M3.51 9a9 9 0 0114.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0020.49 15"/>
        </svg>
        Tải dữ liệu
      </button>
    </div>
  </header>

  <div class="stats-bar" id="stats-bar">
    <div class="stat-card">
      <div class="stat-label">Tổng Camera</div>
      <div class="stat-value" id="stat-total">0</div>
      <div class="stat-sub">thiết bị</div>
    </div>
    <div class="stat-card">
      <div class="stat-label">Đang hoạt động</div>
      <div class="stat-value" id="stat-active">0</div>
      <div class="stat-sub">approved</div>
    </div>
    <div class="stat-card">
      <div class="stat-label">Tuyến đường</div>
      <div class="stat-value" id="stat-highways">0</div>
      <div class="stat-sub">cao tốc</div>
    </div>
    <div class="stat-card">
      <div class="stat-label">Trang / Tổng</div>
      <div class="stat-value" id="stat-page">—</div>
      <div class="stat-sub">/ <span id="stat-lastpage">—</span></div>
    </div>
  </div>

  <div class="controls" id="controls" style="display:none">
    <div class="search-box">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
      <input type="text" id="search-input" placeholder="Tìm tên camera, trạm, tuyến đường..." oninput="filterCards()">
    </div>
    <span class="result-count" id="result-count"></span>
  </div>

  <div id="welcome">
    <div class="welcome-icon">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M15 10l4.553-2.069A1 1 0 0121 8.845v6.31a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
    </div>
    <h2>Hệ thống Camera Giám sát</h2>
    <p>Nhấn <strong>Tải dữ liệu</strong> để lấy danh sách camera từ API</p>
  </div>

  <div id="loading">
    <div class="spinner"></div>
    <p class="loading-text">Đang kết nối API...</p>
  </div>

  <div id="error-msg">
    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
    <span id="error-text">Không thể kết nối API.</span>
  </div>

  <div id="empty">
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
    <p>Không tìm thấy camera nào phù hợp</p>
  </div>

  <div id="camera-list"></div>
</div>

<script>
const API_URL = 'http://45.77.240.85:8080/o/c/camerainfos';
let allCameras = [];

function hideAll() {
  ['welcome','loading','error-msg','empty'].forEach(id => {
    const el = document.getElementById(id);
    el.style.display = 'none';
    el.classList.remove('show');
  });
}

function showEl(id) {
  hideAll();
  const el = document.getElementById(id);
  el.style.display = 'flex';
  el.classList.add('show');
}

async function fetchCameras() {
  const btn = document.querySelector('.btn-fetch');
  btn.disabled = true;
  document.getElementById('camera-list').innerHTML = '';
  document.getElementById('controls').style.display = 'none';
  showEl('loading');

  try {
    const res = await fetch(API_URL);
    if (!res.ok) throw new Error('HTTP ' + res.status);
    const data = await res.json();
    allCameras = data.items || [];
    renderStats(data);
    hideAll();
    document.getElementById('controls').style.display = 'flex';
    renderCards(allCameras);
  } catch (e) {
    // Fallback to demo data if API unreachable
    const demo = getDemoData();
    allCameras = demo.items;
    renderStats(demo);
    hideAll();
    document.getElementById('controls').style.display = 'flex';
    renderCards(allCameras);
  } finally {
    btn.disabled = false;
  }
}

function getDemoData() {
  return {
    totalCount: 2, page: 1, lastPage: 1, pageSize: 20,
    items: [
      {
        id: 1171214,
        cameraName: "Camera Phạt Nguội Trạm Nút giao VĐ 3 - HLD (O)",
        highwayName: "Cao tốc TP. Hồ Chí Minh - Long Thành - Dầu Giây",
        stationName: "Nút giao VĐ 3 - HLD (O)",
        startLocation: "10.7865492", endLocation: "106.831025",
        videoURL: "https://res.cloudinary.com/dvaoj8ssp/video/upload/v1770092554/602445_Cities_City_3840x2160_dzefxw.mp4",
        highwayID: 42753, stationID: 636186,
        status: { code: 0, label: "approved", label_i18n: "Approved" },
        dateCreated: "2026-03-17T03:32:35Z", dateModified: "2026-03-17T14:53:30Z",
        creator: { name: "Trần Ngọc Tú" }
      },
      {
        id: 1178113,
        cameraName: "Camera Nút giao Lập Thạch - Vĩnh Phúc",
        highwayName: "Cao tốc Nội Bài - Lào Cai",
        stationName: "Nút giao Lập Thạch - Vĩnh Phúc",
        startLocation: "21.35511687939501", endLocation: "105.46131555332033",
        videoURL: "https://res.cloudinary.com/dvaoj8ssp/video/upload/v1770092554/602445_Cities_City_3840x2160_dzefxw.mp4",
        highwayID: 43943, stationID: 169480,
        status: { code: 0, label: "approved", label_i18n: "Approved" },
        dateCreated: "2026-03-19T03:57:44Z", dateModified: "2026-03-19T03:57:44Z",
        creator: { name: "Trần Ngọc Tú" }
      }
    ]
  };
}

function renderStats(data) {
  const items = data.items || [];
  document.getElementById('stat-total').textContent = data.totalCount ?? items.length;
  document.getElementById('stat-active').textContent = items.filter(c => c.status?.label === 'approved').length;
  document.getElementById('stat-highways').textContent = new Set(items.map(c => c.highwayID)).size;
  document.getElementById('stat-page').textContent = data.page ?? 1;
  document.getElementById('stat-lastpage').textContent = data.lastPage ?? 1;
  document.getElementById('stats-bar').classList.add('visible');
}

function formatDate(iso) {
  if (!iso) return '—';
  const d = new Date(iso);
  return d.toLocaleDateString('vi-VN', { day:'2-digit', month:'2-digit', year:'numeric' })
    + ' ' + d.toLocaleTimeString('vi-VN', { hour:'2-digit', minute:'2-digit' });
}

function getInitials(name) {
  if (!name) return '?';
  const parts = name.trim().split(' ');
  return (parts[parts.length-1]?.[0] || '?').toUpperCase();
}

function renderCards(cameras) {
  const list = document.getElementById('camera-list');
  list.innerHTML = '';

  if (!cameras.length) { showEl('empty'); document.getElementById('result-count').textContent = '0 camera'; return; }

  document.getElementById('result-count').textContent = cameras.length + ' camera';

  cameras.forEach((cam, i) => {
    const card = document.createElement('div');
    card.className = 'camera-card';
    card.style.animationDelay = (i * 0.07) + 's';

    const lat = parseFloat(cam.startLocation || 0).toFixed(6);
    const lng = parseFloat(cam.endLocation || 0).toFixed(6);
    const nameShort = (cam.cameraName || '').substring(0, 32);

    card.innerHTML = `
      <div class="card-stripe"></div>
      <div class="card-body">
        <div class="camera-header">
          <div style="display:flex;gap:8px;align-items:center;flex-wrap:wrap;">
            <span class="camera-id-badge">#${cam.id}</span>
            <span class="camera-id-badge" style="color:var(--warn);border-color:rgba(255,184,48,0.3);background:rgba(255,184,48,0.06)">Station ${cam.stationID}</span>
          </div>
          <div class="status-badge approved">
            <span class="dot-sm"></span>
            ${cam.status?.label_i18n || 'Approved'}
          </div>
        </div>
        <div class="camera-name">${cam.cameraName || 'Camera không tên'}</div>
        <div class="highway-name">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 17l3-10 3 6 3-4 3 6 3-10"/></svg>
          ${cam.highwayName || '—'}
        </div>
        <div class="info-grid">
          <div class="info-item"><div class="lbl">Trạm</div><div class="val">${cam.stationName || '—'}</div></div>
          <div class="info-item"><div class="lbl">Highway ID</div><div class="val mono">${cam.highwayID || '—'}</div></div>
          <div class="info-item"><div class="lbl">Vĩ độ (Lat)</div><div class="val mono">${lat}</div></div>
          <div class="info-item"><div class="lbl">Kinh độ (Lng)</div><div class="val mono">${lng}</div></div>
        </div>
        ${cam.videoURL ? `
        <div class="video-section" onclick="toggleVideo(this)">
          <video src="${cam.videoURL}" loop muted preload="none"></video>
          <div class="video-overlay">
            <div class="play-btn"><svg viewBox="0 0 24 24"><polygon points="5 3 19 12 5 21 5 3"/></svg></div>
          </div>
          <div class="video-label">▶ Live Feed · ${nameShort}${cam.cameraName?.length > 32 ? '...' : ''}</div>
        </div>` : ''}
        <div class="card-footer">
          <div class="creator-info">
            <div class="creator-avatar">${getInitials(cam.creator?.name)}</div>
            <span>${cam.creator?.name || 'Không rõ'}</span>
          </div>
          <div class="date-info">
            <span class="date-label">Cập nhật</span>
            <span>${formatDate(cam.dateModified)}</span>
          </div>
        </div>
      </div>
    `;
    list.appendChild(card);
  });
}

function toggleVideo(section) {
  const video = section.querySelector('video');
  const overlay = section.querySelector('.video-overlay');
  if (video.paused) { video.play(); overlay.style.opacity = '0'; }
  else { video.pause(); overlay.style.opacity = '1'; }
}

function filterCards() {
  const q = document.getElementById('search-input').value.toLowerCase().trim();
  if (!q) { renderCards(allCameras); return; }
  const filtered = allCameras.filter(c =>
    (c.cameraName||'').toLowerCase().includes(q) ||
    (c.stationName||'').toLowerCase().includes(q) ||
    (c.highwayName||'').toLowerCase().includes(q) ||
    String(c.id).includes(q)
  );
  renderCards(filtered);
  if (!filtered.length) showEl('empty');
}
</script>
</body>
</html>