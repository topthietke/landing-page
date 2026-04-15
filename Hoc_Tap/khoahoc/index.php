<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Hán Ngữ Tinh Hoa – Trung Tâm Dạy Tiếng Trung</title>
<link href="https://fonts.googleapis.com/css2?family=Noto+Serif+SC:wght@400;700;900&family=Be+Vietnam+Pro:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<style>
  :root {
    --red: #C8102E;
    --red-dark: #9B0020;
    --gold: #D4AF37;
    --gold-light: #F5E27A;
    --ink: #1A0A00;
    --paper: #FDF6EC;
    --paper-dark: #F5E9D0;
    --white: #FFFFFF;
    --gray: #6B5C4E;
    --light-gray: #E8DDD0;
    --green: #1A6B3C;
    --shadow: 0 4px 30px rgba(26,10,0,0.12);
    --shadow-lg: 0 12px 60px rgba(26,10,0,0.18);
  }

  * { margin: 0; padding: 0; box-sizing: border-box; }

  html { scroll-behavior: smooth; }

  body {
    font-family: 'Be Vietnam Pro', sans-serif;
    background: var(--paper);
    color: var(--ink);
    overflow-x: hidden;
  }

  /* ── DECORATIVE BACKGROUND ── */
  body::before {
    content: '漢語精華';
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%) rotate(-15deg);
    font-family: 'Noto Serif SC', serif;
    font-size: 28vw;
    font-weight: 900;
    color: rgba(200,16,46,0.03);
    pointer-events: none;
    z-index: 0;
    white-space: nowrap;
    letter-spacing: -0.05em;
  }

  /* ── NAV ── */
  nav {
    position: fixed;
    top: 0;
    width: 100%;
    z-index: 100;
    background: rgba(253,246,236,0.92);
    backdrop-filter: blur(16px);
    border-bottom: 2px solid var(--gold);
    padding: 0 5%;
    display: flex;
    align-items: center;
    justify-content: space-between;
    height: 68px;
    box-shadow: 0 2px 20px rgba(212,175,55,0.15);
  }

  .nav-logo {
    display: flex;
    align-items: center;
    gap: 12px;
    text-decoration: none;
  }

  .nav-logo .hanzi {
    font-family: 'Noto Serif SC', serif;
    font-size: 2rem;
    font-weight: 900;
    color: var(--red);
    line-height: 1;
    text-shadow: 2px 2px 0 rgba(200,16,46,0.15);
  }

  .nav-logo .viet {
    font-size: 0.75rem;
    font-weight: 600;
    color: var(--gray);
    line-height: 1.3;
    text-transform: uppercase;
    letter-spacing: 0.08em;
  }

  .nav-links {
    display: flex;
    gap: 2rem;
    list-style: none;
  }

  .nav-links a {
    text-decoration: none;
    color: var(--ink);
    font-weight: 500;
    font-size: 0.9rem;
    letter-spacing: 0.03em;
    position: relative;
    transition: color 0.2s;
  }

  .nav-links a::after {
    content: '';
    position: absolute;
    bottom: -4px;
    left: 0;
    width: 0;
    height: 2px;
    background: var(--red);
    transition: width 0.3s;
  }

  .nav-links a:hover { color: var(--red); }
  .nav-links a:hover::after { width: 100%; }

  .nav-cta {
    background: var(--red);
    color: var(--white) !important;
    padding: 8px 22px !important;
    border-radius: 4px;
    font-weight: 700 !important;
    transition: background 0.2s !important;
  }

  .nav-cta:hover { background: var(--red-dark) !important; }
  .nav-cta::after { display: none !important; }

  /* ── HERO ── */
  #hero {
    min-height: 100vh;
    display: grid;
    grid-template-columns: 1fr 1fr;
    align-items: center;
    padding: 100px 8% 60px;
    gap: 60px;
    position: relative;
    overflow: hidden;
  }

  #hero::before {
    content: '';
    position: absolute;
    top: 0; right: 0;
    width: 55%;
    height: 100%;
    background: linear-gradient(135deg, var(--paper-dark) 0%, #EDD5A8 100%);
    clip-path: polygon(15% 0, 100% 0, 100% 100%, 0% 100%);
    z-index: 0;
  }

  .hero-content { position: relative; z-index: 1; }

  .hero-badge {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: var(--red);
    color: var(--white);
    padding: 6px 16px;
    border-radius: 100px;
    font-size: 0.78rem;
    font-weight: 700;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    margin-bottom: 24px;
    animation: fadeUp 0.6s ease both;
  }

  .hero-badge::before {
    content: '🎯';
    font-size: 0.85rem;
  }

  .hero-title {
    font-family: 'Noto Serif SC', serif;
    font-size: clamp(2.4rem, 5vw, 4rem);
    font-weight: 900;
    line-height: 1.1;
    color: var(--ink);
    margin-bottom: 12px;
    animation: fadeUp 0.6s 0.1s ease both;
  }

  .hero-title .accent {
    color: var(--red);
    display: block;
    font-size: 1.15em;
  }

  .hero-subtitle {
    font-size: clamp(1rem, 2vw, 1.25rem);
    color: var(--gray);
    font-weight: 300;
    margin-bottom: 32px;
    line-height: 1.7;
    animation: fadeUp 0.6s 0.2s ease both;
  }

  .hero-actions {
    display: flex;
    gap: 16px;
    flex-wrap: wrap;
    animation: fadeUp 0.6s 0.3s ease both;
  }

  .btn-primary {
    background: var(--red);
    color: var(--white);
    padding: 14px 32px;
    border: none;
    border-radius: 6px;
    font-size: 1rem;
    font-weight: 700;
    cursor: pointer;
    transition: all 0.25s;
    text-decoration: none;
    display: inline-block;
    box-shadow: 0 4px 20px rgba(200,16,46,0.3);
  }

  .btn-primary:hover {
    background: var(--red-dark);
    transform: translateY(-2px);
    box-shadow: 0 8px 30px rgba(200,16,46,0.4);
  }

  .btn-secondary {
    background: transparent;
    color: var(--ink);
    padding: 14px 32px;
    border: 2px solid var(--ink);
    border-radius: 6px;
    font-size: 1rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.25s;
    text-decoration: none;
    display: inline-block;
  }

  .btn-secondary:hover {
    background: var(--ink);
    color: var(--white);
    transform: translateY(-2px);
  }

  .hero-visual {
    position: relative;
    z-index: 1;
    display: flex;
    flex-direction: column;
    gap: 16px;
    animation: fadeIn 0.8s 0.4s ease both;
  }

  .hero-card {
    background: var(--white);
    border-radius: 16px;
    padding: 20px 24px;
    box-shadow: var(--shadow-lg);
    border-left: 4px solid var(--gold);
    transition: transform 0.3s;
  }

  .hero-card:hover { transform: translateX(6px); }

  .hero-card h3 {
    font-size: 1rem;
    font-weight: 700;
    color: var(--ink);
    margin-bottom: 6px;
    display: flex;
    align-items: center;
    gap: 8px;
  }

  .hero-card p {
    font-size: 0.85rem;
    color: var(--gray);
    line-height: 1.6;
  }

  .stat-row {
    display: grid;
    grid-template-columns: repeat(3,1fr);
    gap: 12px;
    margin-top: 8px;
  }

  .stat-box {
    background: var(--white);
    border-radius: 12px;
    padding: 16px 12px;
    text-align: center;
    box-shadow: var(--shadow);
  }

  .stat-box .num {
    font-family: 'Noto Serif SC', serif;
    font-size: 1.8rem;
    font-weight: 900;
    color: var(--red);
    display: block;
  }

  .stat-box .lbl {
    font-size: 0.72rem;
    color: var(--gray);
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 0.05em;
  }

  /* ── SECTIONS COMMON ── */
  section { position: relative; z-index: 1; }

  .section-header {
    text-align: center;
    margin-bottom: 56px;
  }

  .section-tag {
    display: inline-block;
    background: var(--gold-light);
    color: var(--red-dark);
    padding: 4px 16px;
    border-radius: 100px;
    font-size: 0.78rem;
    font-weight: 700;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    margin-bottom: 14px;
  }

  .section-title {
    font-family: 'Noto Serif SC', serif;
    font-size: clamp(1.8rem, 3.5vw, 2.8rem);
    font-weight: 900;
    color: var(--ink);
    line-height: 1.2;
    margin-bottom: 16px;
  }

  .section-desc {
    font-size: 1rem;
    color: var(--gray);
    max-width: 600px;
    margin: 0 auto;
    line-height: 1.7;
  }

  /* ── ROLES SECTION ── */
  #roles {
    padding: 100px 8%;
    background: var(--ink);
    color: var(--white);
  }

  #roles .section-title { color: var(--white); }
  #roles .section-desc { color: rgba(255,255,255,0.6); }
  #roles .section-tag { background: rgba(212,175,55,0.2); color: var(--gold); }

  .roles-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: 24px;
  }

  .role-card {
    background: rgba(255,255,255,0.05);
    border: 1px solid rgba(212,175,55,0.2);
    border-radius: 16px;
    padding: 28px 24px;
    transition: all 0.3s;
    cursor: pointer;
  }

  .role-card:hover {
    background: rgba(200,16,46,0.15);
    border-color: var(--red);
    transform: translateY(-4px);
  }

  .role-icon {
    font-size: 2.4rem;
    margin-bottom: 16px;
    display: block;
  }

  .role-card h3 {
    font-size: 1rem;
    font-weight: 700;
    color: var(--gold);
    margin-bottom: 10px;
  }

  .role-card ul {
    list-style: none;
    display: flex;
    flex-direction: column;
    gap: 6px;
  }

  .role-card ul li {
    font-size: 0.82rem;
    color: rgba(255,255,255,0.7);
    display: flex;
    align-items: flex-start;
    gap: 8px;
  }

  .role-card ul li::before {
    content: '›';
    color: var(--red);
    font-size: 1rem;
    line-height: 1;
    flex-shrink: 0;
  }

  /* ── COURSES ── */
  #courses {
    padding: 100px 8%;
    background: var(--paper);
  }

  .courses-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 28px;
  }

  .course-card {
    background: var(--white);
    border-radius: 20px;
    overflow: hidden;
    box-shadow: var(--shadow);
    transition: all 0.3s;
  }

  .course-card:hover {
    transform: translateY(-6px);
    box-shadow: var(--shadow-lg);
  }

  .course-thumb {
    height: 120px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-family: 'Noto Serif SC', serif;
    font-size: 4rem;
    font-weight: 900;
  }

  .course-thumb.t1 { background: linear-gradient(135deg, #FFECD2, #FCB69F); color: var(--red); }
  .course-thumb.t2 { background: linear-gradient(135deg, #D4EDDA, #A8D5BA); color: var(--green); }
  .course-thumb.t3 { background: linear-gradient(135deg, #FFF3CD, #FFD97D); color: #8B6914; }
  .course-thumb.t4 { background: linear-gradient(135deg, #D1ECF1, #91D7E3); color: #0C5460; }

  .course-body { padding: 20px 22px; }

  .course-level {
    font-size: 0.72rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.1em;
    color: var(--red);
    margin-bottom: 6px;
  }

  .course-body h3 {
    font-size: 1.05rem;
    font-weight: 700;
    margin-bottom: 8px;
    color: var(--ink);
  }

  .course-body p {
    font-size: 0.83rem;
    color: var(--gray);
    line-height: 1.6;
    margin-bottom: 16px;
  }

  .course-price {
    font-size: 1.3rem;
    font-weight: 800;
    color: var(--red);
  }

  .course-price span {
    font-size: 0.78rem;
    font-weight: 400;
    color: var(--gray);
    text-decoration: line-through;
    margin-left: 8px;
  }

  /* ── JOBS ── */
  #jobs {
    padding: 100px 8%;
    background: var(--paper-dark);
  }

  .jobs-filter {
    display: flex;
    gap: 10px;
    margin-bottom: 36px;
    flex-wrap: wrap;
  }

  .filter-btn {
    padding: 8px 20px;
    border: 2px solid var(--light-gray);
    background: var(--white);
    border-radius: 100px;
    font-size: 0.85rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.2s;
    color: var(--gray);
    font-family: 'Be Vietnam Pro', sans-serif;
  }

  .filter-btn.active, .filter-btn:hover {
    background: var(--red);
    border-color: var(--red);
    color: var(--white);
  }

  .jobs-list { display: flex; flex-direction: column; gap: 16px; }

  .job-card {
    background: var(--white);
    border-radius: 14px;
    padding: 22px 26px;
    display: flex;
    align-items: center;
    gap: 20px;
    box-shadow: var(--shadow);
    border: 2px solid transparent;
    transition: all 0.3s;
    cursor: pointer;
  }

  .job-card:hover {
    border-color: var(--gold);
    transform: translateX(4px);
  }

  .job-logo {
    width: 56px;
    height: 56px;
    border-radius: 12px;
    background: var(--paper-dark);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.8rem;
    flex-shrink: 0;
  }

  .job-info { flex: 1; }

  .job-info h3 {
    font-size: 1rem;
    font-weight: 700;
    color: var(--ink);
    margin-bottom: 4px;
  }

  .job-info .company {
    font-size: 0.83rem;
    color: var(--gray);
    margin-bottom: 8px;
  }

  .job-tags { display: flex; gap: 8px; flex-wrap: wrap; }

  .job-tag {
    font-size: 0.72rem;
    font-weight: 600;
    padding: 3px 10px;
    border-radius: 100px;
    background: var(--paper-dark);
    color: var(--gray);
  }

  .job-tag.hot { background: rgba(200,16,46,0.1); color: var(--red); }
  .job-tag.new { background: rgba(26,107,60,0.1); color: var(--green); }

  .job-meta {
    text-align: right;
    flex-shrink: 0;
  }

  .job-salary {
    font-size: 1.05rem;
    font-weight: 700;
    color: var(--red);
    margin-bottom: 4px;
  }

  .job-deadline {
    font-size: 0.75rem;
    color: var(--gray);
  }

  .job-actions {
    display: flex;
    flex-direction: column;
    gap: 8px;
    flex-shrink: 0;
  }

  .btn-apply {
    background: var(--red);
    color: var(--white);
    padding: 8px 18px;
    border: none;
    border-radius: 6px;
    font-size: 0.82rem;
    font-weight: 700;
    cursor: pointer;
    font-family: inherit;
    transition: background 0.2s;
  }

  .btn-apply:hover { background: var(--red-dark); }

  .btn-rate {
    background: transparent;
    color: var(--gold);
    padding: 6px 18px;
    border: 2px solid var(--gold);
    border-radius: 6px;
    font-size: 0.78rem;
    font-weight: 600;
    cursor: pointer;
    font-family: inherit;
    transition: all 0.2s;
  }

  .btn-rate:hover { background: var(--gold); color: var(--white); }

  .stars { color: var(--gold); font-size: 0.9rem; }

  /* ── AFFILIATE ── */
  #affiliate {
    padding: 100px 8%;
    background: linear-gradient(135deg, var(--ink) 0%, #3D0010 100%);
    color: var(--white);
    overflow: hidden;
    position: relative;
  }

  #affiliate::before {
    content: '¥';
    position: absolute;
    right: -2%;
    top: 50%;
    transform: translateY(-50%);
    font-family: 'Noto Serif SC', serif;
    font-size: 40vw;
    font-weight: 900;
    color: rgba(212,175,55,0.04);
    pointer-events: none;
  }

  #affiliate .section-title { color: var(--white); }
  #affiliate .section-tag { background: rgba(212,175,55,0.15); color: var(--gold); }

  .affiliate-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 60px;
    align-items: start;
  }

  .commission-tree {
    display: flex;
    flex-direction: column;
    gap: 16px;
  }

  .tree-level {
    display: flex;
    align-items: center;
    gap: 16px;
    padding: 16px 20px;
    background: rgba(255,255,255,0.06);
    border-radius: 12px;
    border-left: 4px solid var(--gold);
    transition: all 0.3s;
  }

  .tree-level:hover {
    background: rgba(212,175,55,0.1);
    transform: translateX(6px);
  }

  .tree-level .lvl {
    font-family: 'Noto Serif SC', serif;
    font-size: 1.6rem;
    font-weight: 900;
    color: var(--gold);
    min-width: 48px;
    text-align: center;
  }

  .tree-level .info h4 {
    font-size: 0.95rem;
    font-weight: 700;
    color: var(--white);
    margin-bottom: 4px;
  }

  .tree-level .info p {
    font-size: 0.8rem;
    color: rgba(255,255,255,0.6);
  }

  .tree-level .pct {
    margin-left: auto;
    font-size: 1.5rem;
    font-weight: 800;
    color: var(--gold-light);
  }

  .affiliate-features {
    display: flex;
    flex-direction: column;
    gap: 20px;
  }

  .aff-feat {
    display: flex;
    gap: 16px;
    align-items: flex-start;
  }

  .aff-feat .icon {
    width: 44px;
    height: 44px;
    background: rgba(212,175,55,0.15);
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.3rem;
    flex-shrink: 0;
  }

  .aff-feat h4 {
    font-size: 0.95rem;
    font-weight: 700;
    color: var(--gold);
    margin-bottom: 4px;
  }

  .aff-feat p {
    font-size: 0.83rem;
    color: rgba(255,255,255,0.6);
    line-height: 1.6;
  }

  /* ── CONSULT FORM ── */
  #consult {
    padding: 100px 8%;
    background: var(--paper);
  }

  .consult-wrap {
    max-width: 680px;
    margin: 0 auto;
    background: var(--white);
    border-radius: 24px;
    padding: 48px 52px;
    box-shadow: var(--shadow-lg);
    border: 1px solid var(--light-gray);
  }

  .form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
    margin-bottom: 20px;
  }

  .form-group { margin-bottom: 20px; }

  .form-group label {
    display: block;
    font-size: 0.85rem;
    font-weight: 600;
    color: var(--ink);
    margin-bottom: 8px;
    letter-spacing: 0.03em;
  }

  .form-group input,
  .form-group select,
  .form-group textarea {
    width: 100%;
    padding: 12px 16px;
    border: 2px solid var(--light-gray);
    border-radius: 8px;
    font-size: 0.9rem;
    font-family: 'Be Vietnam Pro', sans-serif;
    color: var(--ink);
    background: var(--paper);
    transition: border-color 0.2s;
    outline: none;
  }

  .form-group input:focus,
  .form-group select:focus,
  .form-group textarea:focus {
    border-color: var(--red);
    background: var(--white);
  }

  .form-group textarea { resize: vertical; min-height: 100px; }

  .form-submit {
    background: var(--red);
    color: var(--white);
    width: 100%;
    padding: 16px;
    border: none;
    border-radius: 8px;
    font-size: 1.05rem;
    font-weight: 700;
    cursor: pointer;
    font-family: inherit;
    transition: all 0.25s;
    box-shadow: 0 4px 20px rgba(200,16,46,0.3);
  }

  .form-submit:hover {
    background: var(--red-dark);
    transform: translateY(-2px);
    box-shadow: 0 8px 30px rgba(200,16,46,0.4);
  }

  /* ── NOTIFICATIONS ── */
  .notif-bar {
    position: fixed;
    bottom: 24px;
    right: 24px;
    background: var(--ink);
    color: var(--white);
    padding: 14px 20px;
    border-radius: 12px;
    font-size: 0.85rem;
    box-shadow: var(--shadow-lg);
    max-width: 280px;
    z-index: 200;
    opacity: 0;
    transform: translateY(20px);
    transition: all 0.4s;
    border-left: 3px solid var(--gold);
  }

  .notif-bar.show {
    opacity: 1;
    transform: translateY(0);
  }

  .notif-bar .notif-title {
    font-weight: 700;
    color: var(--gold);
    margin-bottom: 4px;
    font-size: 0.8rem;
    text-transform: uppercase;
    letter-spacing: 0.05em;
  }

  /* ── FOOTER ── */
  footer {
    background: var(--ink);
    color: rgba(255,255,255,0.6);
    padding: 60px 8% 30px;
  }

  .footer-grid {
    display: grid;
    grid-template-columns: 2fr 1fr 1fr 1fr;
    gap: 48px;
    margin-bottom: 48px;
  }

  .footer-brand h2 {
    font-family: 'Noto Serif SC', serif;
    font-size: 1.6rem;
    font-weight: 900;
    color: var(--gold);
    margin-bottom: 12px;
  }

  .footer-brand p {
    font-size: 0.85rem;
    line-height: 1.8;
    margin-bottom: 20px;
  }

  .footer-col h4 {
    font-size: 0.85rem;
    font-weight: 700;
    color: var(--white);
    text-transform: uppercase;
    letter-spacing: 0.1em;
    margin-bottom: 16px;
  }

  .footer-col ul { list-style: none; display: flex; flex-direction: column; gap: 10px; }

  .footer-col ul a {
    color: rgba(255,255,255,0.5);
    text-decoration: none;
    font-size: 0.85rem;
    transition: color 0.2s;
  }

  .footer-col ul a:hover { color: var(--gold); }

  .footer-bottom {
    border-top: 1px solid rgba(255,255,255,0.1);
    padding-top: 28px;
    text-align: center;
    font-size: 0.8rem;
  }

  /* ── MODAL ── */
  .modal-overlay {
    position: fixed;
    inset: 0;
    background: rgba(26,10,0,0.7);
    z-index: 300;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 20px;
    opacity: 0;
    pointer-events: none;
    transition: opacity 0.3s;
  }

  .modal-overlay.open {
    opacity: 1;
    pointer-events: all;
  }

  .modal {
    background: var(--white);
    border-radius: 20px;
    padding: 40px;
    max-width: 480px;
    width: 100%;
    box-shadow: var(--shadow-lg);
    transform: scale(0.9);
    transition: transform 0.3s;
    position: relative;
  }

  .modal-overlay.open .modal { transform: scale(1); }

  .modal h2 {
    font-family: 'Noto Serif SC', serif;
    font-size: 1.5rem;
    font-weight: 900;
    color: var(--ink);
    margin-bottom: 8px;
  }

  .modal p { font-size: 0.9rem; color: var(--gray); margin-bottom: 24px; }

  .modal-close {
    position: absolute;
    top: 16px;
    right: 16px;
    background: none;
    border: none;
    font-size: 1.4rem;
    cursor: pointer;
    color: var(--gray);
    transition: color 0.2s;
  }

  .modal-close:hover { color: var(--red); }

  /* ── ANIMATIONS ── */
  @keyframes fadeUp {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
  }

  @keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
  }

  /* ── SCROLL ANIMATE ── */
  .reveal {
    opacity: 0;
    transform: translateY(30px);
    transition: all 0.7s cubic-bezier(0.22, 1, 0.36, 1);
  }

  .reveal.visible {
    opacity: 1;
    transform: translateY(0);
  }

  /* ── RESPONSIVE ── */
  @media (max-width: 900px) {
    #hero { grid-template-columns: 1fr; padding-top: 120px; }
    #hero::before { width: 100%; clip-path: none; height: 40%; top: auto; bottom: 0; opacity: 0.4; }
    .affiliate-grid { grid-template-columns: 1fr; }
    .footer-grid { grid-template-columns: 1fr 1fr; }
    .form-row { grid-template-columns: 1fr; }
    .nav-links { display: none; }
    .consult-wrap { padding: 32px 28px; }
  }

  @media (max-width: 600px) {
    .footer-grid { grid-template-columns: 1fr; }
    .job-card { flex-wrap: wrap; }
    .job-actions { flex-direction: row; width: 100%; }
  }
</style>
</head>
<body>

<!-- NAV -->
<nav>
  <a href="#" class="nav-logo">
    <span class="hanzi">漢</span>
    <div>
      <div style="font-weight:800;font-size:1rem;color:var(--ink);letter-spacing:0.02em;">Hán Ngữ Tinh Hoa</div>
      <span class="viet">Trung Tâm Dạy Tiếng Trung</span>
    </div>
  </a>
  <ul class="nav-links">
    <li><a href="#courses">Khóa Học</a></li>
    <li><a href="#jobs">Việc Làm</a></li>
    <li><a href="#affiliate">Cộng Tác Viên</a></li>
    <li><a href="#consult">Liên Hệ</a></li>
    <li><a href="#consult" class="nav-cta">Đăng Ký Ngay</a></li>
  </ul>
</nav>

<!-- HERO -->
<section id="hero">
  <div class="hero-content">
    <div class="hero-badge">Trung Tâm Tiếng Trung #1 Việt Nam</div>
    <h1 class="hero-title">
      Chinh phục<br>
      <span class="accent">Tiếng Trung</span>
      cùng chúng tôi
    </h1>
    <p class="hero-subtitle">Hệ thống đào tạo tiếng Trung toàn diện — từ sơ cấp đến HSK 6, kết nối việc làm và cơ hội kiếm thêm thu nhập qua chương trình CTV hoa hồng đa cấp.</p>
    <div class="hero-actions">
      <a href="#consult" class="btn-primary">🎓 Đăng Ký Tư Vấn Miễn Phí</a>
      <a href="#courses" class="btn-secondary">Xem Khóa Học</a>
    </div>
  </div>
  <div class="hero-visual">
    <div class="hero-card">
      <h3>🔔 Thông Báo Khuyến Mãi</h3>
      <p>Giảm 30% học phí cho học viên đăng ký trong tháng này. Ưu đãi đặc biệt cho nhóm từ 3 người!</p>
    </div>
    <div class="hero-card" style="border-left-color:var(--red)">
      <h3>💼 Kết Nối Việc Làm</h3>
      <p>Sàn giao dịch việc làm dành riêng cho người biết tiếng Trung. Hơn 200+ vị trí đang tuyển dụng.</p>
    </div>
    <div class="hero-card" style="border-left-color:var(--green)">
      <h3>🤝 Chương Trình CTV</h3>
      <p>Kiếm hoa hồng lên đến 15% cho mỗi học viên giới thiệu. Hệ thống đại lý nhiều cấp độ.</p>
    </div>
    <div class="stat-row">
      <div class="stat-box"><span class="num">5K+</span><span class="lbl">Học Viên</span></div>
      <div class="stat-box"><span class="num">98%</span><span class="lbl">Hài Lòng</span></div>
      <div class="stat-box"><span class="num">12+</span><span class="lbl">Năm KN</span></div>
    </div>
  </div>
</section>

<!-- ROLES -->
<section id="roles">
  <div class="section-header reveal">
    <span class="section-tag">🔐 Phân Quyền Hệ Thống</span>
    <h2 class="section-title">Các Vai Trò & Chức Năng</h2>
    <p class="section-desc">Hệ thống phân quyền rõ ràng, mỗi vai trò được trao đúng công cụ để thực hiện mục tiêu.</p>
  </div>
  <div class="roles-grid">
    <div class="role-card reveal" style="animation-delay:0.05s">
      <span class="role-icon">👑</span>
      <h3>Admin — Quản Trị Toàn Quyền</h3>
      <ul>
        <li>Quản trị hệ thống & cấu hình</li>
        <li>Quản lý người dùng, phân quyền</li>
        <li>Xem báo cáo thống kê tổng hợp</li>
        <li>Quản lý nội dung toàn trang</li>
      </ul>
    </div>
    <div class="role-card reveal" style="animation-delay:0.1s">
      <span class="role-icon">🏢</span>
      <h3>Nhà Tuyển Dụng (2 Loại)</h3>
      <ul>
        <li>Tạo & quản lý tin tuyển dụng</li>
        <li>Trả lời bình luận ứng viên</li>
        <li>Xem & tải hồ sơ CV</li>
        <li>Đánh giá ứng viên ứng tuyển</li>
      </ul>
    </div>
    <div class="role-card reveal" style="animation-delay:0.15s">
      <span class="role-icon">🎯</span>
      <h3>Ứng Viên Tìm Việc</h3>
      <ul>
        <li>Upload & quản lý hồ sơ CV</li>
        <li>Bình luận tin tuyển dụng</li>
        <li>Đánh giá sao cho nhà tuyển dụng</li>
        <li>Nhận thông báo việc làm phù hợp</li>
      </ul>
    </div>
    <div class="role-card reveal" style="animation-delay:0.2s">
      <span class="role-icon">💰</span>
      <h3>Cộng Tác Viên (Affiliate)</h3>
      <ul>
        <li>Lấy link & QR giới thiệu cá nhân</li>
        <li>Xem thống kê hoa hồng chi tiết</li>
        <li>Gửi yêu cầu rút tiền</li>
        <li>Xem cây đại lý nhiều cấp</li>
      </ul>
    </div>
    <div class="role-card reveal" style="animation-delay:0.25s">
      <span class="role-icon">👤</span>
      <h3>Khách (Chưa Đăng Ký)</h3>
      <ul>
        <li>Đọc thông tin khóa học & giảng viên</li>
        <li>Điền form yêu cầu tư vấn</li>
        <li>Xem danh sách việc làm</li>
        <li>Đăng ký nhận thông báo KM</li>
      </ul>
    </div>
  </div>
</section>

<!-- COURSES -->
<section id="courses">
  <div class="section-header reveal">
    <span class="section-tag">📚 Chương Trình Đào Tạo</span>
    <h2 class="section-title">Các Khóa Học Nổi Bật</h2>
    <p class="section-desc">Chương trình học được thiết kế bài bản, phù hợp với mọi trình độ từ người mới bắt đầu đến nâng cao.</p>
  </div>
  <div class="courses-grid">
    <div class="course-card reveal">
      <div class="course-thumb t1">你好</div>
      <div class="course-body">
        <div class="course-level">Sơ Cấp</div>
        <h3>Tiếng Trung Giao Tiếp Cơ Bản</h3>
        <p>Dành cho người mới bắt đầu. Học phát âm chuẩn, bính âm và các mẫu câu giao tiếp hàng ngày.</p>
        <div class="course-price">2.500.000đ <span>3.500.000đ</span></div>
      </div>
    </div>
    <div class="course-card reveal" style="animation-delay:0.1s">
      <div class="course-thumb t2">HSK</div>
      <div class="course-body">
        <div class="course-level">Trung Cấp</div>
        <h3>Luyện Thi HSK 3 – 4</h3>
        <p>Ôn luyện theo cấu trúc đề thi chính thức. Đảm bảo đạt chứng chỉ sau 3 tháng học.</p>
        <div class="course-price">3.800.000đ <span>5.000.000đ</span></div>
      </div>
    </div>
    <div class="course-card reveal" style="animation-delay:0.2s">
      <div class="course-thumb t3">商</div>
      <div class="course-body">
        <div class="course-level">Chuyên Ngành</div>
        <h3>Tiếng Trung Thương Mại</h3>
        <p>Từ vựng kinh doanh, email thương mại, đàm phán và kỹ năng làm việc với đối tác Trung Quốc.</p>
        <div class="course-price">4.200.000đ <span>5.500.000đ</span></div>
      </div>
    </div>
    <div class="course-card reveal" style="animation-delay:0.3s">
      <div class="course-thumb t4">高级</div>
      <div class="course-body">
        <div class="course-level">Cao Cấp</div>
        <h3>Luyện Thi HSK 5 – 6</h3>
        <p>Chương trình nâng cao dành cho học viên muốn đạt HSK 5–6, mở ra cơ hội du học và việc làm cao cấp.</p>
        <div class="course-price">5.500.000đ <span>7.000.000đ</span></div>
      </div>
    </div>
  </div>
</section>

<!-- JOBS -->
<section id="jobs">
  <div class="section-header reveal">
    <span class="section-tag" style="background:rgba(26,107,60,0.1);color:var(--green)">💼 Sàn Việc Làm</span>
    <h2 class="section-title">Cơ Hội Việc Làm Tiếng Trung</h2>
    <p class="section-desc">Kết nối nhà tuyển dụng và ứng viên. Upload CV, bình luận, đánh giá và ứng tuyển trực tiếp.</p>
  </div>

  <div class="jobs-filter reveal">
    <button class="filter-btn active" onclick="filterJobs(this,'all')">Tất Cả</button>
    <button class="filter-btn" onclick="filterJobs(this,'full')">Toàn Thời Gian</button>
    <button class="filter-btn" onclick="filterJobs(this,'part')">Bán Thời Gian</button>
    <button class="filter-btn" onclick="filterJobs(this,'remote')">Remote</button>
    <button class="filter-btn" onclick="filterJobs(this,'intern')">Thực Tập</button>
  </div>

  <div class="jobs-list reveal" id="jobsList">
    <div class="job-card" data-type="full">
      <div class="job-logo">🏭</div>
      <div class="job-info">
        <h3>Phiên Dịch Viên Tiếng Trung (Cấp Cao)</h3>
        <div class="company">Công ty TNHH Samsung Vina — Hà Nội</div>
        <div class="job-tags">
          <span class="job-tag hot">🔥 Tuyển Gấp</span>
          <span class="job-tag">Toàn thời gian</span>
          <span class="job-tag">HSK 5+</span>
          <span class="stars">★★★★★</span>
        </div>
      </div>
      <div class="job-meta">
        <div class="job-salary">20 – 35 tr/tháng</div>
        <div class="job-deadline">Hạn: 30/04/2026</div>
      </div>
      <div class="job-actions">
        <button class="btn-apply" onclick="openModal('apply')">Ứng Tuyển</button>
        <button class="btn-rate" onclick="openModal('rate')">★ Đánh Giá</button>
      </div>
    </div>

    <div class="job-card" data-type="part">
      <div class="job-logo">📖</div>
      <div class="job-info">
        <h3>Gia Sư Tiếng Trung Online</h3>
        <div class="company">Nền tảng EduViet — Remote</div>
        <div class="job-tags">
          <span class="job-tag new">✨ Mới</span>
          <span class="job-tag">Bán thời gian</span>
          <span class="job-tag">Remote</span>
          <span class="stars">★★★★☆</span>
        </div>
      </div>
      <div class="job-meta">
        <div class="job-salary">8 – 15 tr/tháng</div>
        <div class="job-deadline">Hạn: 15/05/2026</div>
      </div>
      <div class="job-actions">
        <button class="btn-apply" onclick="openModal('apply')">Ứng Tuyển</button>
        <button class="btn-rate" onclick="openModal('rate')">★ Đánh Giá</button>
      </div>
    </div>

    <div class="job-card" data-type="full">
      <div class="job-logo">🏬</div>
      <div class="job-info">
        <h3>Chuyên Viên Xuất Nhập Khẩu (Tiếng Trung)</h3>
        <div class="company">Tập đoàn Vinafood — TP.HCM</div>
        <div class="job-tags">
          <span class="job-tag hot">🔥 Hot</span>
          <span class="job-tag">Toàn thời gian</span>
          <span class="job-tag">HSK 4+</span>
          <span class="stars">★★★★★</span>
        </div>
      </div>
      <div class="job-meta">
        <div class="job-salary">18 – 28 tr/tháng</div>
        <div class="job-deadline">Hạn: 20/04/2026</div>
      </div>
      <div class="job-actions">
        <button class="btn-apply" onclick="openModal('apply')">Ứng Tuyển</button>
        <button class="btn-rate" onclick="openModal('rate')">★ Đánh Giá</button>
      </div>
    </div>

    <div class="job-card" data-type="intern">
      <div class="job-logo">🎓</div>
      <div class="job-info">
        <h3>Thực Tập Sinh Marketing Tiếng Trung</h3>
        <div class="company">Công ty Alibaba VN — Hà Nội</div>
        <div class="job-tags">
          <span class="job-tag new">✨ Mới</span>
          <span class="job-tag">Thực tập</span>
          <span class="job-tag">HSK 3+</span>
          <span class="stars">★★★★☆</span>
        </div>
      </div>
      <div class="job-meta">
        <div class="job-salary">3 – 5 tr/tháng</div>
        <div class="job-deadline">Hạn: 10/05/2026</div>
      </div>
      <div class="job-actions">
        <button class="btn-apply" onclick="openModal('apply')">Ứng Tuyển</button>
        <button class="btn-rate" onclick="openModal('rate')">★ Đánh Giá</button>
      </div>
    </div>

    <div class="job-card" data-type="remote">
      <div class="job-logo">💻</div>
      <div class="job-info">
        <h3>Biên Dịch Nội Dung Tiếng Trung – Việt</h3>
        <div class="company">Freelance Platform — Remote toàn quốc</div>
        <div class="job-tags">
          <span class="job-tag">Remote</span>
          <span class="job-tag">Linh hoạt giờ giấc</span>
          <span class="job-tag">HSK 4+</span>
          <span class="stars">★★★★☆</span>
        </div>
      </div>
      <div class="job-meta">
        <div class="job-salary">10 – 20 tr/tháng</div>
        <div class="job-deadline">Hạn: 01/06/2026</div>
      </div>
      <div class="job-actions">
        <button class="btn-apply" onclick="openModal('apply')">Ứng Tuyển</button>
        <button class="btn-rate" onclick="openModal('rate')">★ Đánh Giá</button>
      </div>
    </div>
  </div>
</section>

<!-- AFFILIATE -->
<section id="affiliate">
  <div class="section-header reveal">
    <span class="section-tag">💎 Chương Trình Đại Lý</span>
    <h2 class="section-title">Hệ Thống Hoa Hồng Đại Lý Các Cấp</h2>
    <p class="section-desc" style="color:rgba(255,255,255,0.6)">Kiếm thu nhập thụ động bằng cách giới thiệu học viên. Hoa hồng lan truyền qua nhiều cấp độ.</p>
  </div>
  <div class="affiliate-grid">
    <div>
      <h3 style="color:var(--gold);font-family:'Noto Serif SC';font-size:1.3rem;margin-bottom:24px;">Cấu Trúc Hoa Hồng</h3>
      <div class="commission-tree">
        <div class="tree-level reveal">
          <div class="lvl">F1</div>
          <div class="info">
            <h4>Cấp 1 – Giới thiệu trực tiếp</h4>
            <p>Hoa hồng từ học viên bạn trực tiếp giới thiệu</p>
          </div>
          <div class="pct">15%</div>
        </div>
        <div class="tree-level reveal" style="animation-delay:0.1s;border-left-color:rgba(212,175,55,0.5)">
          <div class="lvl">F2</div>
          <div class="info">
            <h4>Cấp 2 – Mạng lưới của bạn</h4>
            <p>Hoa hồng từ học viên do CTV F1 của bạn giới thiệu</p>
          </div>
          <div class="pct" style="color:rgba(245,226,122,0.7)">8%</div>
        </div>
        <div class="tree-level reveal" style="animation-delay:0.2s;border-left-color:rgba(212,175,55,0.25)">
          <div class="lvl">F3</div>
          <div class="info">
            <h4>Cấp 3 – Mở rộng hệ thống</h4>
            <p>Hoa hồng từ cấp độ thứ 3 trong mạng lưới</p>
          </div>
          <div class="pct" style="color:rgba(245,226,122,0.5)">4%</div>
        </div>
        <div class="tree-level reveal" style="animation-delay:0.3s;border-left-color:rgba(212,175,55,0.15)">
          <div class="lvl">F4+</div>
          <div class="info">
            <h4>Cấp 4 trở lên</h4>
            <p>Tiếp tục nhận hoa hồng từ các cấp sâu hơn</p>
          </div>
          <div class="pct" style="color:rgba(245,226,122,0.4)">2%</div>
        </div>
      </div>
    </div>
    <div class="affiliate-features reveal">
      <h3 style="color:var(--gold);font-family:'Noto Serif SC';font-size:1.3rem;margin-bottom:24px;">Tính Năng CTV</h3>
      <div class="aff-feat">
        <div class="icon">📲</div>
        <div>
          <h4>Link & QR Giới Thiệu Cá Nhân</h4>
          <p>Mỗi CTV có link và mã QR riêng để chia sẻ trên mạng xã hội. Theo dõi click và chuyển đổi theo thời gian thực.</p>
        </div>
      </div>
      <div class="aff-feat">
        <div class="icon">📊</div>
        <div>
          <h4>Dashboard Thống Kê Hoa Hồng</h4>
          <p>Xem chi tiết hoa hồng từng cấp, lịch sử thanh toán và dự báo thu nhập tháng tiếp theo.</p>
        </div>
      </div>
      <div class="aff-feat">
        <div class="icon">💳</div>
        <div>
          <h4>Rút Tiền Nhanh Chóng</h4>
          <p>Gửi yêu cầu rút tiền bất kỳ lúc nào. Thanh toán qua chuyển khoản ngân hàng trong 1–3 ngày làm việc.</p>
        </div>
      </div>
      <div class="aff-feat">
        <div class="icon">🏆</div>
        <div>
          <h4>Xếp Hạng & Phần Thưởng</h4>
          <p>CTV xuất sắc nhận thưởng thêm mỗi tháng. Chương trình thi đua hấp dẫn, bảng xếp hạng công khai.</p>
        </div>
      </div>
      <div style="margin-top:16px">
        <button class="btn-primary" onclick="openModal('affiliate')">Đăng Ký Trở Thành CTV →</button>
      </div>
    </div>
  </div>
</section>

<!-- CONSULT FORM -->
<section id="consult">
  <div class="section-header reveal">
    <span class="section-tag">📩 Tư Vấn Miễn Phí</span>
    <h2 class="section-title">Đăng Ký Nhận Tư Vấn</h2>
    <p class="section-desc">Điền thông tin bên dưới, chuyên viên của chúng tôi sẽ liên hệ tư vấn trong vòng 24 giờ.</p>
  </div>
  <div class="consult-wrap reveal">
    <div class="form-row">
      <div class="form-group">
        <label>Họ và Tên *</label>
        <input type="text" placeholder="Nguyễn Văn A">
      </div>
      <div class="form-group">
        <label>Số Điện Thoại *</label>
        <input type="tel" placeholder="0912 345 678">
      </div>
    </div>
    <div class="form-group">
      <label>Email</label>
      <input type="email" placeholder="email@example.com">
    </div>
    <div class="form-row">
      <div class="form-group">
        <label>Khóa Học Quan Tâm</label>
        <select>
          <option>-- Chọn khóa học --</option>
          <option>Tiếng Trung Cơ Bản</option>
          <option>Luyện Thi HSK 3–4</option>
          <option>Tiếng Trung Thương Mại</option>
          <option>Luyện Thi HSK 5–6</option>
        </select>
      </div>
      <div class="form-group">
        <label>Trình Độ Hiện Tại</label>
        <select>
          <option>-- Chọn trình độ --</option>
          <option>Chưa biết gì</option>
          <option>Sơ cấp (HSK 1–2)</option>
          <option>Trung cấp (HSK 3–4)</option>
          <option>Cao cấp (HSK 5+)</option>
        </select>
      </div>
    </div>
    <div class="form-group">
      <label>Nội Dung Cần Tư Vấn</label>
      <textarea placeholder="Bạn muốn học tiếng Trung với mục đích gì? Có câu hỏi gì cần giải đáp không?"></textarea>
    </div>
    <div class="form-group" style="display:flex;align-items:center;gap:10px;margin-bottom:24px">
      <input type="checkbox" id="notif" style="width:auto;accent-color:var(--red)">
      <label for="notif" style="margin:0;font-weight:400;font-size:0.85rem;color:var(--gray)">Tôi muốn nhận thông báo về khuyến mãi và sự kiện từ trung tâm</label>
    </div>
    <button class="form-submit" onclick="submitForm()">📨 Gửi Yêu Cầu Tư Vấn</button>
  </div>
</section>

<!-- FOOTER -->
<footer>
  <div class="footer-grid">
    <div class="footer-brand">
      <h2>漢語精華</h2>
      <p>Trung tâm dạy tiếng Trung hàng đầu Việt Nam. Chúng tôi đồng hành cùng bạn trên con đường chinh phục ngôn ngữ và mở ra cơ hội nghề nghiệp mới.</p>
      <div style="display:flex;gap:12px">
        <a href="#" style="color:var(--gold);font-size:1.3rem;text-decoration:none">📘</a>
        <a href="#" style="color:var(--gold);font-size:1.3rem;text-decoration:none">📷</a>
        <a href="#" style="color:var(--gold);font-size:1.3rem;text-decoration:none">▶️</a>
        <a href="#" style="color:var(--gold);font-size:1.3rem;text-decoration:none">💬</a>
      </div>
    </div>
    <div class="footer-col">
      <h4>Khóa Học</h4>
      <ul>
        <li><a href="#">Tiếng Trung Cơ Bản</a></li>
        <li><a href="#">Luyện Thi HSK</a></li>
        <li><a href="#">Tiếng Trung Thương Mại</a></li>
        <li><a href="#">Khóa Cấp Tốc</a></li>
        <li><a href="#">Học Online</a></li>
      </ul>
    </div>
    <div class="footer-col">
      <h4>Dịch Vụ</h4>
      <ul>
        <li><a href="#">Sàn Việc Làm</a></li>
        <li><a href="#">Chương Trình CTV</a></li>
        <li><a href="#">Thi Thử HSK</a></li>
        <li><a href="#">Tư Vấn Học Bổng</a></li>
        <li><a href="#">Dịch Thuật</a></li>
      </ul>
    </div>
    <div class="footer-col">
      <h4>Liên Hệ</h4>
      <ul>
        <li><a href="#">📍 123 Phố Huế, Hà Nội</a></li>
        <li><a href="#">📞 1900 1234 56</a></li>
        <li><a href="#">✉️ info@hanguytinhhoa.vn</a></li>
        <li><a href="#">🕐 8:00 – 22:00 hàng ngày</a></li>
      </ul>
    </div>
  </div>
  <div class="footer-bottom">
    © 2026 Hán Ngữ Tinh Hoa. Bảo lưu mọi quyền. | <a href="#" style="color:var(--gold)">Chính Sách Bảo Mật</a> | <a href="#" style="color:var(--gold)">Điều Khoản Sử Dụng</a>
  </div>
</footer>

<!-- NOTIFICATION POPUP -->
<div class="notif-bar" id="notifBar">
  <div class="notif-title">🔔 Thông Báo Mới</div>
  <div id="notifText">Có 3 khuyến mãi đang chờ bạn!</div>
</div>

<!-- MODAL -->
<div class="modal-overlay" id="modalOverlay" onclick="closeModal(event)">
  <div class="modal">
    <button class="modal-close" onclick="closeModalDirect()">✕</button>
    <h2 id="modalTitle">Ứng Tuyển Ngay</h2>
    <p id="modalDesc">Điền thông tin để ứng tuyển vị trí này</p>
    <div id="modalBody"></div>
  </div>
</div>

<script>
  // Scroll reveal
  const reveals = document.querySelectorAll('.reveal');
  const observer = new IntersectionObserver((entries) => {
    entries.forEach((e, i) => {
      if (e.isIntersecting) {
        setTimeout(() => e.target.classList.add('visible'), i * 60);
      }
    });
  }, { threshold: 0.1 });
  reveals.forEach(el => observer.observe(el));

  // Job filter
  function filterJobs(btn, type) {
    document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');
    document.querySelectorAll('.job-card').forEach(card => {
      card.style.display = (type === 'all' || card.dataset.type === type) ? 'flex' : 'none';
    });
  }

  // Modal
  const modals = {
    apply: {
      title: '📄 Ứng Tuyển Ngay',
      desc: 'Tải lên CV và thông tin của bạn để ứng tuyển',
      body: `<div class="form-group"><label>Họ và Tên</label><input type="text" placeholder="Nguyễn Văn A"></div>
             <div class="form-group"><label>Email</label><input type="email" placeholder="email@example.com"></div>
             <div class="form-group"><label>Upload CV (PDF)</label><input type="file" accept=".pdf"></div>
             <button class="form-submit" style="margin-top:8px" onclick="alert('Đã gửi hồ sơ! Nhà tuyển dụng sẽ liên hệ bạn sớm.');closeModalDirect()">Gửi Hồ Sơ</button>`
    },
    rate: {
      title: '⭐ Đánh Giá Tin Tuyển Dụng',
      desc: 'Chia sẻ trải nghiệm của bạn về tin tuyển dụng này',
      body: `<div style="text-align:center;margin-bottom:20px">
               <div style="font-size:2.5rem;cursor:pointer;letter-spacing:8px" id="starRating">☆☆☆☆☆</div>
               <div style="font-size:0.8rem;color:var(--gray);margin-top:6px">Click để chọn số sao</div>
             </div>
             <div class="form-group"><label>Nhận Xét</label><textarea placeholder="Nhà tuyển dụng uy tín, quy trình rõ ràng..."></textarea></div>
             <button class="form-submit" onclick="alert('Cảm ơn đánh giá của bạn!');closeModalDirect()">Gửi Đánh Giá</button>`
    },
    affiliate: {
      title: '🤝 Đăng Ký CTV',
      desc: 'Tham gia mạng lưới cộng tác viên và bắt đầu kiếm hoa hồng',
      body: `<div class="form-group"><label>Họ và Tên</label><input type="text" placeholder="Nguyễn Thị B"></div>
             <div class="form-group"><label>Số Điện Thoại</label><input type="tel" placeholder="0901 234 567"></div>
             <div class="form-group"><label>Ngân Hàng Nhận Tiền</label><select><option>Vietcombank</option><option>Techcombank</option><option>MB Bank</option><option>BIDV</option></select></div>
             <button class="form-submit" onclick="alert('Đăng ký thành công! Chúng tôi sẽ gửi link giới thiệu qua SMS.');closeModalDirect()">Đăng Ký CTV</button>`
    }
  };

  function openModal(type) {
    const m = modals[type];
    document.getElementById('modalTitle').textContent = m.title;
    document.getElementById('modalDesc').textContent = m.desc;
    document.getElementById('modalBody').innerHTML = m.body;
    document.getElementById('modalOverlay').classList.add('open');
  }

  function closeModal(e) {
    if (e.target === document.getElementById('modalOverlay')) closeModalDirect();
  }

  function closeModalDirect() {
    document.getElementById('modalOverlay').classList.remove('open');
  }

  // Form submit
  function submitForm() {
    showNotif('✅ Đã nhận yêu cầu!', 'Chuyên viên tư vấn sẽ liên hệ bạn trong 24h.');
  }

  // Notifications
  const notifications = [
    { title: '🔔 Khuyến Mãi', text: 'Giảm 30% học phí – chỉ còn 5 suất!' },
    { title: '💼 Việc Làm Mới', text: 'Samsung Vina vừa đăng 2 vị trí mới!' },
    { title: '🏆 CTV Xuất Sắc', text: 'Top 10 CTV tháng 3 đã được công bố' },
    { title: '📚 Khai Giảng', text: 'Lớp HSK 4 khai giảng ngày 01/04/2026' }
  ];

  let notifIdx = 0;
  function showNotif(title, text) {
    const bar = document.getElementById('notifBar');
    bar.querySelector('.notif-title').textContent = title || notifications[notifIdx].title;
    document.getElementById('notifText').textContent = text || notifications[notifIdx].text;
    bar.classList.add('show');
    setTimeout(() => bar.classList.remove('show'), 4000);
    notifIdx = (notifIdx + 1) % notifications.length;
  }

  // Auto notifications
  setTimeout(() => showNotif(), 3000);
  setInterval(() => showNotif(), 12000);
</script>
</body>
</html>