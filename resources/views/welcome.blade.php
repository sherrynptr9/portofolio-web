<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $profile->name ?? 'Sherrynita Marsya Putri Setiawan, S.Kom' }} - Portfolio</title>

    <!-- Google Fonts: Playfair Display, Plus Jakarta Sans, JetBrains Mono -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;500;600&family=Playfair+Display:ital,wght@0,500;0,600;0,700;1,400&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        :root {
            --bg-page: #FFF9E7;
            --card-bg: #FFFFFF;
            --card-border: #E8E2D0;
            --text-dark: #1F1F1E;
            --text-muted: #6B685F;
            --yellow-pill-bg: #FEF7C8;
            --yellow-pill-border: #F1E496;
            --yellow-pill-text: #3A3414;
            --red-button: #953335;
            --red-button-hover: #7D2A2C;
            --red-subtitle: #953335;
            --green-badge-bg: #EAF6ED;
            --green-badge-border: #C8E8D0;
            --green-badge-text: #2E7D32;
        }

        body {
            background-color: var(--bg-page);
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: var(--text-dark);
            margin: 0;
            padding: 0;
            -webkit-font-smoothing: antialiased;
            overflow-x: hidden;
        }

        .serif-title {
            font-family: 'Playfair Display', Georgia, serif;
            color: var(--text-dark);
            letter-spacing: -0.01em;
        }

        .mono-tag {
            font-family: 'JetBrains Mono', monospace;
            font-size: 11.5px;
            letter-spacing: 0.04em;
            color: var(--text-muted);
            text-transform: uppercase;
        }

        .site-container {
            max-width: 1220px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Top Navbar */
        .site-header {
            background-color: rgba(255, 249, 231, 0.95);
            backdrop-filter: blur(8px);
            border-bottom: 1px solid rgba(232, 226, 208, 0.7);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .nav-brand-text {
            font-family: 'Playfair Display', serif;
            font-size: 1.25rem;
            font-weight: 700;
            color: #1F1F1E;
            text-decoration: none;
            letter-spacing: -0.01em;
        }

        .nav-link-custom {
            font-size: 13px;
            font-weight: 500;
            color: #4A473E;
            text-decoration: none;
            padding: 6px 12px;
            transition: color 0.15s ease;
        }

        .nav-link-custom:hover {
            color: #000000;
        }

        .btn-touch {
            background-color: var(--red-button);
            color: #FFFFFF;
            border-radius: 9999px;
            font-size: 13px;
            font-weight: 600;
            padding: 7px 18px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            border: none;
            transition: background-color 0.15s ease, transform 0.1s ease;
        }

        .btn-touch:hover {
            background-color: var(--red-button-hover);
            color: #FFFFFF;
        }

        .nav-avatar-img {
            width: 34px;
            height: 34px;
            border-radius: 50%;
            object-fit: cover;
            border: 1.5px solid #D6D0BD;
        }

        /* White Cards */
        .folio-card {
            background: var(--card-bg);
            border: 1px solid var(--card-border);
            border-radius: 12px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.02);
            position: relative;
        }

        /* Yellow Pills & Tags */
        .badge-yellow-pill {
            background-color: var(--yellow-pill-bg);
            border: 1px solid var(--yellow-pill-border);
            color: var(--yellow-pill-text);
            border-radius: 9999px;
            font-size: 10.5px;
            font-weight: 700;
            padding: 4px 10px;
            display: inline-block;
            letter-spacing: 0.02em;
        }

        .badge-yellow-tag {
            background-color: var(--yellow-pill-bg);
            border: 1px solid var(--yellow-pill-border);
            color: var(--yellow-pill-text);
            border-radius: 6px;
            font-size: 11px;
            font-weight: 500;
            padding: 4px 8px;
            display: inline-block;
            margin: 0 4px 6px 0;
            line-height: 1.35;
        }

        .skill-bar-row {
            position: relative;
            background-color: var(--yellow-pill-bg);
            border: 1px solid var(--yellow-pill-border);
            color: var(--yellow-pill-text);
            border-radius: 6px;
            padding: 6px 10px;
            font-size: 11px;
            font-weight: 600;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 6px;
            overflow: hidden;
            z-index: 1;
            transition: transform 0.18s ease, border-color 0.18s ease;
        }

        .skill-bar-row:hover {
            transform: translateX(3px);
            border-color: #D4B232;
        }

        .skill-bar-progress {
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 0%;
            background: linear-gradient(90deg, rgba(245, 230, 160, 0.45), rgba(235, 205, 100, 0.65));
            border-radius: 5px;
            z-index: -1;
            transition: width 1.2s cubic-bezier(0.22, 1, 0.36, 1);
        }

        .skill-subheading-tag {
            background-color: transparent;
            font-size: 11.5px;
            font-weight: 700;
            color: #2F2C23;
            margin-top: 12px;
            margin-bottom: 6px;
            display: flex;
            align-items: center;
        }

        .skill-dropdown-header {
            background-color: var(--yellow-pill-bg);
            border: 1px solid var(--yellow-pill-border);
            color: var(--yellow-pill-text);
            border-radius: 6px;
            padding: 8px 12px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            cursor: pointer;
            user-select: none;
            transition: all 0.15s ease;
        }

        .skill-dropdown-header:hover {
            background-color: #F8EEA8;
            border-color: #E5D67E;
        }

        .skill-dropdown-header .toggle-chevron {
            transition: transform 0.2s ease;
        }

        .skill-dropdown-header.collapsed .toggle-chevron {
            transform: rotate(-90deg);
        }

        /* Buttons */
        .btn-archive-cv {
            background-color: #EBE5D3;
            border: 1px solid #D8D1BD;
            color: #2A2A28;
            font-size: 13px;
            font-weight: 500;
            border-radius: 8px;
            padding: 8px 18px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.15s ease;
        }

        .btn-archive-cv:hover {
            background-color: #DFD8C4;
            color: #000;
        }

        .btn-social-icon {
            width: 38px;
            height: 38px;
            border-radius: 8px;
            border: 1px solid #D8D1BD;
            background-color: #FFFFFF;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: #333333;
            text-decoration: none;
            font-size: 14px;
            transition: all 0.15s ease;
        }

        .btn-social-icon:hover {
            background-color: #EBE5D3;
            color: #000;
        }

        /* Filter Pills */
        .filter-btn {
            background: #FFFFFF;
            border: 1px solid #D8D1BD;
            color: #555249;
            font-size: 12px;
            font-weight: 500;
            border-radius: 9999px;
            padding: 5px 14px;
            cursor: pointer;
            transition: all 0.15s ease;
            text-decoration: none;
        }

        .filter-btn:hover, .filter-btn.active {
            background: #1F1F1E;
            color: #FFFFFF;
            border-color: #1F1F1E;
        }

        .btn-see-all {
            background-color: #2D3A2D;
            color: #FFFFFF;
            border-radius: 9999px;
            font-size: 13px;
            font-weight: 600;
            padding: 9px 24px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
            border: none;
            transition: background-color 0.15s ease;
            cursor: pointer;
        }

        .btn-see-all:hover {
            background-color: #1E281E;
            color: #FFFFFF;
        }

        /* Section Headings */
        .section-heading-wrap {
            margin-bottom: 24px;
        }

        .section-main-title {
            font-size: 2rem;
            font-weight: 700;
            margin-top: 4px;
            margin-bottom: 0;
        }

        /* Icon Boxes in Skills */
        .icon-circle-box {
            width: 32px;
            height: 32px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            margin-right: 10px;
        }

        .icon-box-green { background: #E2F0E6; color: #2E7D32; }
        .icon-box-red { background: #FCE4E4; color: #C62828; }
        .icon-box-orange { background: #FCECDA; color: #E65100; }



        .view-project-link {
            font-size: 11.5px;
            font-weight: 600;
            color: #1F1F1E;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 4px;
            transition: gap 0.15s ease;
        }

        .view-project-link:hover {
            color: #000000;
            gap: 7px;
        }

        /* Custom Section 02 Grid to match PDF column widths */
        .education-skills-grid {
            display: grid;
            grid-template-columns: 1.7fr 1fr 1fr 1fr;
            gap: 16px;
        }

        @media (max-width: 991px) {
            .education-skills-grid {
                grid-template-columns: 1fr 1fr;
            }
        }

        @media (max-width: 767px) {
            .education-skills-grid {
                grid-template-columns: 1fr;
            }
        }

        /* Footer styling */
        .footer-wrap {
            border-top: 1px solid #E5E0D0;
            padding-top: 40px;
            padding-bottom: 50px;
            margin-top: 50px;
        }

        .footer-nav-link {
            font-size: 13px;
            color: #4A473E;
            text-decoration: none;
            display: block;
            margin-bottom: 6px;
            transition: color 0.15s ease, transform 0.15s ease;
        }

        .footer-nav-link:hover {
            color: #000;
            transform: translateX(3px);
        }

        .footer-social-link {
            color: #4A473E;
            text-decoration: underline;
            text-underline-offset: 3px;
            text-decoration-color: rgba(74, 71, 62, 0.4);
            font-size: 0.82rem;
            transition: all 0.15s ease;
            display: inline-block;
        }

        .footer-social-link:hover {
            color: var(--red-button);
            text-decoration-color: var(--red-button);
            transform: translateY(-1px);
        }

        /* Admin quick button float */
        .admin-quick-pill {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background: #1F1F1E;
            color: #FFFFFF;
            font-size: 12px;
            font-weight: 600;
            padding: 8px 16px;
            border-radius: 9999px;
            text-decoration: none;
            box-shadow: 0 4px 14px rgba(0,0,0,0.2);
            z-index: 9999;
            display: flex;
            align-items: center;
            gap: 6px;
        }
        .admin-quick-pill:hover {
            background: #000;
            color: #FFF;
        }

        /* Top Scroll Progress Bar */
        .scroll-progress-bar {
            position: fixed;
            top: 0;
            left: 0;
            height: 3px;
            background: linear-gradient(90deg, #953335, #C62828, #E65100, #2E7D32);
            z-index: 10001;
            width: 0%;
            transition: width 0.1s ease-out;
        }

        /* Active Nav Link (Scrollspy) */
        .nav-link-custom.active {
            color: #000000;
            background-color: rgba(232, 226, 208, 0.65);
            font-weight: 700;
        }

        /* Interactive Folio Cards */
        .folio-card-interactive {
            transition: transform 0.25s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.25s cubic-bezier(0.16, 1, 0.3, 1), border-color 0.25s ease;
        }
        .folio-card-interactive:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 26px rgba(31, 31, 30, 0.08);
            border-color: #D4CDBC;
        }

        /* Hero Typewriter & Live Status */
        .live-status-pill {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            background: #EAF6ED;
            border: 1px solid #C8E8D0;
            color: #2E7D32;
            padding: 3px 10px;
            border-radius: 9999px;
            font-size: 11px;
            font-weight: 600;
        }

        .pulsing-dot {
            width: 7px;
            height: 7px;
            background-color: #2E7D32;
            border-radius: 50%;
            position: relative;
        }

        .pulsing-dot::after {
            content: '';
            position: absolute;
            inset: -3px;
            border-radius: 50%;
            border: 1.5px solid #2E7D32;
            animation: pulse-ring 1.8s cubic-bezier(0.215, 0.61, 0.355, 1) infinite;
        }

        @keyframes pulse-ring {
            0% { transform: scale(0.6); opacity: 0.9; }
            50% { transform: scale(1.5); opacity: 0.3; }
            100% { transform: scale(2.2); opacity: 0; }
        }

        .typewriter-cursor {
            display: inline-block;
            color: var(--red-button);
            font-weight: 700;
            animation: blink 0.8s infinite;
        }

        @keyframes blink {
            0%, 100% { opacity: 1; }
            50% { opacity: 0; }
        }

        /* Project Thumbnail Zoom & Hover Overlay */
        .project-thumb-wrap {
            position: relative;
            height: 175px;
            border-radius: 8px;
            overflow: hidden;
            background: #2A2D34;
            cursor: pointer;
        }

        .project-thumb-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.45s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .project-thumb-wrap:hover .project-thumb-img {
            transform: scale(1.06);
        }

        .project-thumb-overlay {
            position: absolute;
            inset: 0;
            background: rgba(20, 20, 20, 0.45);
            backdrop-filter: blur(2px);
            opacity: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: opacity 0.25s ease;
            z-index: 3;
        }

        .project-thumb-wrap:hover .project-thumb-overlay {
            opacity: 1;
        }

        .project-title-hover {
            transition: color 0.15s ease;
        }
        .project-title-hover:hover {
            color: var(--red-button) !important;
        }

        /* Tag Pill Hover */
        .badge-yellow-tag, .tag-hover-pill {
            transition: transform 0.15s ease, background-color 0.15s ease, border-color 0.15s ease;
            display: inline-block;
        }
        .badge-yellow-tag:hover, .tag-hover-pill:hover {
            transform: translateY(-2px);
            background-color: #F8EFBA !important;
            border-color: #DFC85A !important;
        }

        /* Copyable contact cards */
        .copyable-card {
            cursor: pointer;
            transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .copyable-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 22px rgba(31, 31, 30, 0.08);
            border-color: #C0B79E;
        }
        .copyable-card:active {
            transform: translateY(-1px);
        }
        .copy-badge {
            transition: all 0.2s ease;
            font-size: 10px;
            padding: 3px 8px;
        }
        .copyable-card:hover .copy-badge {
            background-color: #1F1F1E !important;
            color: #FFFFFF !important;
            border-color: #1F1F1E !important;
        }

        /* Back to top button */
        .btn-back-to-top {
            position: fixed;
            bottom: 72px;
            right: 20px;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #1F1F1E;
            color: #FFFFFF;
            border: 1px solid rgba(255, 255, 255, 0.15);
            box-shadow: 0 4px 14px rgba(0, 0, 0, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            z-index: 9998;
            opacity: 0;
            visibility: hidden;
            transform: translateY(12px);
            transition: opacity 0.3s ease, transform 0.3s ease, background-color 0.2s ease;
            font-size: 13px;
        }
        .btn-back-to-top.show {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }
        .btn-back-to-top:hover {
            background-color: var(--red-button);
            transform: translateY(-2px);
        }

        /* Scroll Reveal Animation */
        .reveal-on-scroll {
            opacity: 0;
            transform: translateY(22px);
            transition: opacity 0.65s cubic-bezier(0.16, 1, 0.3, 1), transform 0.65s cubic-bezier(0.16, 1, 0.3, 1);
            will-change: opacity, transform;
        }
        .reveal-on-scroll.is-revealed {
            opacity: 1;
            transform: translateY(0);
        }

        /* Project Items filter transition */
        .project-item {
            transition: opacity 0.3s ease, transform 0.3s ease;
        }

        /* Courses Slider per 4 */
        .courses-slider-outer {
            overflow: hidden;
            position: relative;
            margin: 0 -8px;
        }
        .courses-slider-track {
            display: flex;
            transition: transform 0.55s cubic-bezier(0.16, 1, 0.3, 1);
            will-change: transform;
        }
        .courses-slider-item {
            flex: 0 0 25%;
            max-width: 25%;
            padding: 0 8px;
            box-sizing: border-box;
        }
        @media (max-width: 991px) {
            .courses-slider-item {
                flex: 0 0 50%;
                max-width: 50%;
            }
        }
        @media (max-width: 575px) {
            .courses-slider-item {
                flex: 0 0 100%;
                max-width: 100%;
            }
        }
        .courses-nav-btn {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            border: 1px solid #D8D1BD;
            background: #FFFFFF;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            color: #1F1F1E;
            cursor: pointer;
            transition: all 0.2s ease;
            box-shadow: 0 2px 8px rgba(0,0,0,0.06);
        }
        .courses-nav-btn:hover {
            background: #1F1F1E;
            color: #FFFFFF;
            border-color: #1F1F1E;
            transform: scale(1.05);
        }
        .courses-nav-btn:disabled {
            opacity: 0.35;
            pointer-events: none;
        }
        .courses-dots {
            display: flex;
            gap: 6px;
            align-items: center;
            justify-content: center;
            margin-top: 16px;
        }
        .courses-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: #D8D1BD;
            transition: all 0.25s ease;
            cursor: pointer;
            border: none;
            padding: 0;
        }
        .courses-dot.active {
            width: 22px;
            border-radius: 9999px;
            background: #1F1F1E;
        }
        .course-card-trigger {
            cursor: pointer;
        }
        .course-card-trigger:active {
            transform: scale(0.99) !important;
        }
    </style>
</head>
<body>

    <!-- TOP SCROLL PROGRESS BAR -->
    <div id="scrollProgressBar" class="scroll-progress-bar"></div>

    <!-- TOP NAVBAR -->
    <header class="site-header py-3">
        <div class="site-container d-flex align-items-center justify-content-between">
            <!-- Brand with Logo Icon -->
            <a href="#about" class="nav-brand-text d-flex align-items-center gap-2">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" style="width: 28px; height: 28px; border-radius: 6px; object-fit: contain;">
                <span>Sherrynita</span>
            </a>

            <!-- Navigation Links -->
            <nav class="d-none d-lg-flex align-items-center gap-1">
                <a href="#about" class="nav-link-custom">About</a>
                <a href="#education" class="nav-link-custom">Education & Skills</a>
                <a href="#experience" class="nav-link-custom">Experience</a>
                <a href="#projects" class="nav-link-custom">Projects</a>
                <a href="#organization" class="nav-link-custom">Organization</a>
                <a href="#certifications" class="nav-link-custom">Certifications</a>
                <a href="#courses" class="nav-link-custom">Courses</a>
                <a href="#contact" class="nav-link-custom">Contact</a>
            </nav>

            <!-- Right: Get in Touch & Avatar -->
            <div class="d-flex align-items-center gap-3">
                <a href="#contact" class="btn-touch">Get in Touch</a>
                <img src="{{ asset('images/sherrynita_avatar.jpg') }}?v=2" alt="Sherrynita Avatar" class="nav-avatar-img">
            </div>
        </div>
    </header>

    <main class="site-container py-4">

        <!-- ==========================================
             01 / HERO & CURATED BIOGRAPHY
             ========================================== -->
        <section id="about" class="pt-3 pb-5 reveal-on-scroll">
            <!-- Section label -->
            <div class="d-flex align-items-center gap-2 mb-3">
                <span class="badge-yellow-pill">{{ $profile->edition_tag ?? 'FOLIO INDEX • VOL. IV' }}</span>
                <span class="mono-tag">{{ $profile->section_number ?? '01 / Curated Biography' }}</span>
            </div>

            <div class="row g-4 align-items-stretch">
                <!-- Left: Biography text -->
                <div class="col-lg-8">
                    <div class="folio-card folio-card-interactive p-4 p-md-5 h-100 d-flex flex-column justify-content-between">
                        <div>
                            <!-- Role Pill & Live Status Badge -->
                            <div class="mb-3 d-flex flex-wrap align-items-center gap-2">
                                <span class="badge rounded-pill bg-dark text-white px-3 py-2" style="font-size: 11.5px; font-weight: 500; letter-spacing: 0.02em;">
                                    {{ $profile->badge_role ?? 'UI/UX, Website, & Data Analyst' }}
                                </span>
                                <span class="live-status-pill">
                                    <span class="pulsing-dot"></span>
                                    <span>Available for Hire & Projects</span>
                                </span>
                            </div>

                            <!-- Full Name -->
                            <h1 class="serif-title mb-2" style="font-size: 2.2rem; font-weight: 700; line-height: 1.25;">
                                {{ $profile->name ?? 'Sherrynita Marsya Putri Setiawan, S.Kom' }}
                            </h1>

                            <!-- Interactive Typewriter Subtitle -->
                            <div class="mb-3 d-flex align-items-center flex-wrap gap-1">
                                <span class="mono-tag" style="font-size: 12px; color: var(--text-dark); font-weight: 600;">Specializing in:</span>
                                <span class="fw-bold" style="color: var(--red-button); font-size: 13px;" id="heroTypewriter"></span>
                                <span class="typewriter-cursor">|</span>
                            </div>

                            <!-- About Paragraph -->
                            <p class="text-secondary mb-4" style="font-size: 0.93rem; line-height: 1.7; color: #4A473E !important;">
                                {{ $profile->about_text ?? '' }}
                            </p>
                        </div>

                        <!-- Action Buttons -->
                        <div class="d-flex flex-wrap align-items-center gap-2 pt-2">
                            <a href="{{ $profile->cv_file && $profile->cv_file != '#' ? asset($profile->cv_file) : '#' }}" class="btn-archive-cv" download>
                                <i class="fa-regular fa-folder-open"></i>
                                <span>Download Archive CV</span>
                            </a>
                            <a href="{{ $profile->linkedin_url ?? 'https://linkedin.com/in/sherrynita' }}" target="_blank" class="btn-social-icon" title="LinkedIn">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a href="{{ $profile->github_url ?? 'https://github.com/sherrynita' }}" target="_blank" class="btn-social-icon" title="GitHub">
                                <i class="fab fa-github"></i>
                            </a>
                            <a href="mailto:{{ $profile->email ?? 'sherrynitamarsya@gmail.com' }}" class="btn-social-icon" title="Email">
                                <i class="fa-regular fa-envelope"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Right: Profile Portrait Card -->
                <div class="col-lg-4">
                    <div class="folio-card folio-card-interactive p-2 text-center h-100 d-flex flex-column justify-content-between" style="overflow: hidden;">
                        <div style="flex: 1; min-height: 280px; overflow: hidden; border-radius: 10px;">
                            <img src="{{ asset($profile->photo ?? 'images/sherrynita_profile.jpg') }}?v=2" alt="{{ $profile->name }}" 
                                 style="width: 100%; height: 100%; min-height: 320px; object-fit: cover; object-position: center top; border-radius: 10px; transition: transform 0.4s ease;"
                                 onmouseover="this.style.transform='scale(1.04)'"
                                 onmouseout="this.style.transform='scale(1)'">
                        </div>
                        <div class="mt-2 py-2 px-3 text-center" 
                             style="background-color: var(--yellow-pill-bg); border: 1px solid var(--yellow-pill-border); border-radius: 6px; font-weight: 600; font-size: 0.75rem; color: var(--yellow-pill-text);">
                            {{ $profile->name ?? 'Sherrynita Marsya Putri Setiawan, S.Kom' }}
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- ==========================================
             02 / FOUNDATIONS & TOOLING: EDUCATION & SKILLS
             ========================================== -->
        <section id="education" class="pt-3 pb-5 reveal-on-scroll">
            <div class="section-heading-wrap">
                <div class="mono-tag">02 / FOUNDATIONS & TOOLING</div>
                <h2 class="serif-title section-main-title">Education</h2>
            </div>

            <div class="education-skills-grid">
                <!-- Col 1: Education Card (Wider) -->
                <div>
                    <div class="folio-card folio-card-interactive p-4 h-100 d-flex flex-column justify-content-between">
                        <div>
                            <h5 class="serif-title fw-bold mb-2" style="font-size: 1.15rem; line-height: 1.35;">
                                {{ $education->degree ?? "Computer Science Bachelor's Degree in Information Systems" }}
                            </h5>
                            <p class="mb-1 fw-bold text-uppercase" style="color: var(--red-subtitle); font-size: 0.68rem; letter-spacing: 0.03em; line-height: 1.4;">
                                {{ $education->faculty_university ?? 'FACULTY OF COMPUTER SCIENCE AND INFORMATION TECHNOLOGY • GUNADARMA UNIVERSITY' }}
                            </p>
                            <p class="text-muted fw-semibold mb-3" style="font-size: 0.78rem;">
                                {{ $education->period ?? '2022 – 2026' }}
                            </p>

                            <!-- Courses Tag Cloud -->
                            <div class="mb-4">
                                @php
                                    $coursesList = explode(',', $education->courses ?? '');
                                @endphp
                                @foreach($coursesList as $c)
                                    @if(trim($c))
                                        <span class="badge-yellow-tag">{{ trim($c) }}</span>
                                    @endif
                                @endforeach
                            </div>
                        </div>

                        <!-- Medal Award Callout -->
                        <div class="mt-auto d-flex align-items-start gap-2 p-2" 
                             style="background-color: var(--yellow-pill-bg); border: 1px solid var(--yellow-pill-border); border-radius: 8px;">
                            <i class="fas fa-medal text-warning mt-1" style="font-size: 1rem;"></i>
                            <p class="mb-0 fw-semibold" style="font-size: 0.7rem; color: var(--yellow-pill-text); line-height: 1.4;">
                                {{ $education->award_title ?? "Recipient of the Academic Excellence Chancellor's Medal for Undergraduate HCI Capstone Thesis." }}
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Col 2: UI/UX Craft -->
                @php
                    $uiuxGroup = $skillGroups->where('group_key', 'ui_ux')->first();
                @endphp
                <div>
                    <div class="folio-card folio-card-interactive p-3 p-md-4 h-100 d-flex flex-column justify-content-between">
                        <div>
                            <div class="d-flex align-items-center mb-2">
                                <div class="icon-circle-box icon-box-green">
                                    <i class="fas {{ $uiuxGroup->icon ?? 'fa-bezier-curve' }}"></i>
                                </div>
                                <h5 class="serif-title fw-bold mb-0" style="font-size: 1.15rem;">{{ $uiuxGroup->title ?? 'UI/UX Craft' }}</h5>
                            </div>
                            <p class="text-muted mb-3" style="font-size: 0.74rem; line-height: 1.45;">
                                {{ $uiuxGroup->subtitle ?? 'Spatial balance, design token pipelines, and user research rigor.' }}
                            </p>

                            <!-- Skills list -->
                            @if($uiuxGroup && $uiuxGroup->skills)
                                @foreach($uiuxGroup->skills as $skill)
                                    <div class="skill-bar-row" data-percentage="{{ $skill->percentage }}">
                                        <div class="skill-bar-progress"></div>
                                        <span class="skill-name">{{ $skill->name }}</span>
                                        <span class="skill-percent"><span class="skill-counter">0</span>%</span>
                                    </div>
                                @endforeach
                            @endif
                        </div>

                        <div class="mt-3 pt-2 text-start">
                            <span class="fw-semibold" style="font-size: 0.72rem; color: #2E7D32;">
                                {{ $uiuxGroup->confidence_score ?? 'Confidence 95.5%' }}
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Col 3: Full Stack Web Developer -->
                @php
                    $fullstackGroup = $skillGroups->where('group_key', 'fullstack')->first();
                @endphp
                <div>
                    <div class="folio-card folio-card-interactive p-3 p-md-4 h-100 d-flex flex-column justify-content-between">
                        <div>
                            <div class="d-flex align-items-center mb-2">
                                <div class="icon-circle-box icon-box-red">
                                    <i class="fas {{ $fullstackGroup->icon ?? 'fa-code' }}"></i>
                                </div>
                                <h5 class="serif-title fw-bold mb-0" style="font-size: 1.15rem;">{{ $fullstackGroup->title ?? 'Full Stack Web Developer' }}</h5>
                            </div>
                            <p class="text-muted mb-3" style="font-size: 0.74rem; line-height: 1.45;">
                                {{ $fullstackGroup->subtitle ?? 'End-to-end web engineering, scalable architectures, and robust API integrations.' }}
                            </p>

                            @if($fullstackGroup && $fullstackGroup->skills)
                                <!-- 1. Frontend Development Dropdown -->
                                <div class="skill-dropdown-header mt-3 mb-2 collapsed" data-bs-toggle="collapse" data-bs-target="#frontendSkillsCollapse" aria-expanded="false" aria-controls="frontendSkillsCollapse">
                                    <div class="d-flex align-items-center gap-2">
                                        <i class="fas fa-chevron-down toggle-chevron text-muted" style="font-size: 10px;"></i>
                                        <span class="fw-bold" style="font-size: 11.5px;">Frontend Development</span>
                                    </div>
                                    <span class="badge bg-white text-dark border py-1 px-2" style="font-size: 9.5px; font-weight: 600;">6 Skills</span>
                                </div>
                                <div class="collapse" id="frontendSkillsCollapse">
                                    <div class="mb-2">
                                        @foreach($fullstackGroup->skills->where('subgroup', 'Frontend Development') as $skill)
                                            <div class="skill-bar-row" data-percentage="{{ $skill->percentage }}">
                                                <div class="skill-bar-progress"></div>
                                                <span class="skill-name">{{ $skill->name }}</span>
                                                <span class="skill-percent"><span class="skill-counter">0</span>%</span>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <!-- 2. Backend Development Dropdown -->
                                <div class="skill-dropdown-header mt-3 mb-2 collapsed" data-bs-toggle="collapse" data-bs-target="#backendSkillsCollapse" aria-expanded="false" aria-controls="backendSkillsCollapse">
                                    <div class="d-flex align-items-center gap-2">
                                        <i class="fas fa-chevron-down toggle-chevron text-muted" style="font-size: 10px;"></i>
                                        <span class="fw-bold" style="font-size: 11.5px;">Backend Development</span>
                                    </div>
                                    <span class="badge bg-white text-dark border py-1 px-2" style="font-size: 9.5px; font-weight: 600;">6 Skills</span>
                                </div>
                                <div class="collapse" id="backendSkillsCollapse">
                                    <div class="mb-2">
                                        @foreach($fullstackGroup->skills->where('subgroup', 'Backend Development') as $skill)
                                            <div class="skill-bar-row" data-percentage="{{ $skill->percentage }}">
                                                <div class="skill-bar-progress"></div>
                                                <span class="skill-name">{{ $skill->name }}</span>
                                                <span class="skill-percent"><span class="skill-counter">0</span>%</span>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="mt-3 pt-2 text-start">
                            <span class="fw-semibold" style="font-size: 0.72rem; color: #C62828;">
                                {{ $fullstackGroup->confidence_score ?? 'Confidence 91.25%' }}
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Col 4: Data Analytics -->
                @php
                    $dataGroup = $skillGroups->where('group_key', 'data_analytics')->first();
                @endphp
                <div>
                    <div class="folio-card folio-card-interactive p-3 p-md-4 h-100 d-flex flex-column justify-content-between">
                        <div>
                            <div class="d-flex align-items-center mb-2">
                                <div class="icon-circle-box icon-box-orange">
                                    <i class="fas {{ $dataGroup->icon ?? 'fa-chart-simple' }}"></i>
                                </div>
                                <h5 class="serif-title fw-bold mb-0" style="font-size: 1.15rem;">{{ $dataGroup->title ?? 'Data Analytics' }}</h5>
                            </div>
                            <p class="text-muted mb-3" style="font-size: 0.74rem; line-height: 1.45;">
                                {{ $dataGroup->subtitle ?? 'Quantitative storytelling, predictive modeling, and business telemetry.' }}
                            </p>

                            <!-- Skills list -->
                            @if($dataGroup && $dataGroup->skills)
                                @foreach($dataGroup->skills as $skill)
                                    <div class="skill-bar-row" data-percentage="{{ $skill->percentage }}">
                                        <div class="skill-bar-progress"></div>
                                        <span class="skill-name">{{ $skill->name }}</span>
                                        <span class="skill-percent"><span class="skill-counter">0</span>%</span>
                                    </div>
                                @endforeach
                            @endif
                        </div>

                        <div class="mt-3 pt-2 text-start">
                            <span class="fw-semibold" style="font-size: 0.72rem; color: #E65100;">
                                {{ $dataGroup->confidence_score ?? 'Confidence 88.125%' }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- ==========================================
             03 / CAREER CHRONOLOGY: PROFESSIONAL EXPERIENCE
             ========================================== -->
        <section id="experience" class="pt-3 pb-5 reveal-on-scroll">
            <div class="section-heading-wrap">
                <div class="mono-tag">03 / CAREER CHRONOLOGY</div>
                <h2 class="serif-title section-main-title">Professional Experience</h2>
            </div>

            <div class="d-flex flex-column gap-4">
                @foreach($experiences as $exp)
                    <div class="folio-card folio-card-interactive p-4 p-md-4">
                        <div class="row g-4 align-items-start">
                            <!-- Left: Date, Role, Company, Tags -->
                            <div class="col-lg-4 col-md-5">
                                <p class="text-muted mb-1" style="font-size: 0.78rem;">{{ $exp->period }}</p>
                                <h4 class="serif-title fw-bold mb-1" style="font-size: 1.2rem;">{{ $exp->position }}</h4>
                                <p class="fw-semibold mb-3" style="font-size: 0.88rem; color: #4A473E;">{{ $exp->company }}</p>

                                <div class="mt-2">
                                    @php
                                        $tags = explode(',', $exp->tags ?? '');
                                    @endphp
                                    @foreach($tags as $t)
                                        @if(trim($t))
                                            <span class="badge-yellow-tag">{{ trim($t) }}</span>
                                        @endif
                                    @endforeach
                                </div>
                            </div>

                            <!-- Right: Summary, Bullets & Side-by-Side Highlights -->
                            <div class="col-lg-8 col-md-7">
                                @if($exp->summary)
                                    <p class="mb-3" style="font-size: 0.84rem; line-height: 1.6; color: #3A3831;">
                                        {{ $exp->summary }}
                                    </p>
                                @endif

                                @if($exp->contributions_title)
                                    <h6 class="fw-bold mb-2 text-uppercase" style="font-size: 0.72rem; letter-spacing: 0.04em; color: #2B2A27;">
                                        {{ $exp->contributions_title }}
                                    </h6>
                                @endif

                                @php
                                    $bullets = explode("\n", $exp->contributions ?? '');
                                @endphp
                                <div class="d-flex flex-column gap-2 mb-3">
                                    @foreach($bullets as $b)
                                        @if(trim($b))
                                            @php
                                                $parts = explode(':', trim($b), 2);
                                            @endphp
                                            <p class="mb-1" style="font-size: 0.79rem; line-height: 1.55; color: #4A473E;">
                                                @if(count($parts) === 2)
                                                    <strong style="color: #1F1F1E;">{{ trim($parts[0]) }}:</strong> {{ trim($parts[1]) }}
                                                @else
                                                    {{ trim($b) }}
                                                @endif
                                            </p>
                                        @endif
                                    @endforeach
                                </div>

                                <!-- Side-by-Side Highlight Metric Cards -->
                                <div class="row g-3 pt-2">
                                    @if($exp->metric_1_val)
                                        <div class="col-sm-6">
                                            <div class="p-3 h-100 folio-card-interactive" style="background-color: var(--yellow-pill-bg); border: 1px solid var(--yellow-pill-border); border-radius: 8px;">
                                                <h5 class="fw-bold mb-1" style="font-size: 1.05rem; color: #1F1F1E;">{{ $exp->metric_1_val }}</h5>
                                                <p class="mb-0" style="font-size: 0.73rem; color: var(--yellow-pill-text); line-height: 1.35;">
                                                    {{ $exp->metric_1_desc }}
                                                </p>
                                            </div>
                                        </div>
                                    @endif

                                    @if($exp->metric_2_val)
                                        <div class="col-sm-6">
                                            <div class="p-3 h-100 folio-card-interactive" style="background-color: var(--yellow-pill-bg); border: 1px solid var(--yellow-pill-border); border-radius: 8px;">
                                                <h5 class="fw-bold mb-1" style="font-size: 1.05rem; color: #1F1F1E;">{{ $exp->metric_2_val }}</h5>
                                                <p class="mb-0" style="font-size: 0.73rem; color: var(--yellow-pill-text); line-height: 1.35;">
                                                    {{ $exp->metric_2_desc }}
                                                </p>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>


        <!-- ==========================================
             04 / PORTFOLIO SHOWCASE: FEATURED PROJECTS
             ========================================== -->
        <section id="projects" class="pt-3 pb-5 reveal-on-scroll">
            <div class="d-flex flex-column flex-md-row md-align-items-end justify-content-between align-items-start mb-4">
                <div>
                    <div class="mono-tag">04 / PORTFOLIO SHOWCASE</div>
                    <h2 class="serif-title section-main-title">Featured Projects</h2>
                </div>

                <!-- Filter Pills -->
                <div class="d-flex flex-wrap align-items-center gap-2 mt-3 mt-md-0" id="projectFilterGroup">
                    <button class="filter-btn active" data-filter="all">All Archive</button>
                    <button class="filter-btn" data-filter="UI/UX Design">UI/UX Design</button>
                    <button class="filter-btn" data-filter="Website">Website</button>
                    <button class="filter-btn" data-filter="Data Analyst">Data Analyst</button>
                </div>
            </div>

            <!-- 3x2 Projects Grid -->
            <div class="row g-3" id="projectsGrid">
                @foreach($projects as $index => $p)
                    @php
                        $catAttr = $p->category_filter;
                        // Fallback: Jika badge mengandung UI/UX dan WEBSITE namun di DB belum diset 2 kategori
                        if (stripos($p->badge, 'UI/UX') !== false && stripos($p->badge, 'WEBSITE') !== false && stripos($catAttr, 'UI/UX') === false) {
                            $catAttr .= ', UI/UX Design';
                        }
                    @endphp
                    <div class="col-lg-4 col-md-6 project-item" data-category="{{ $catAttr }}" style="{{ $index >= 6 ? 'display: none;' : '' }}">
                        <div class="folio-card folio-card-interactive p-3 h-100 d-flex flex-column justify-content-between">
                            <div>
                                <!-- Image Thumbnail with Zoom & Quick View -->
                                <div class="project-thumb-wrap mb-3"
                                     data-title="{{ $p->title }}"
                                     data-badge="{{ $p->badge }}"
                                     data-image="{{ asset($p->image) }}"
                                     data-desc="{{ $p->description }}"
                                     data-tags="{{ $p->tags }}"
                                     data-link="{{ $p->link }}"
                                     title="Klik untuk melihat detail project">
                                    <img src="{{ asset($p->image) }}" alt="{{ $p->title }}" class="project-thumb-img">
                                    <!-- Top-Left Badge -->
                                    <span class="position-absolute top-0 start-0 m-2 badge bg-dark text-white text-uppercase" 
                                          style="font-size: 9.5px; font-weight: 700; letter-spacing: 0.03em; padding: 4px 8px; border-radius: 4px; z-index: 2;">
                                        {{ $p->badge }}
                                    </span>
                                    <!-- Hover Overlay -->
                                    <div class="project-thumb-overlay">
                                        <span class="btn btn-sm btn-light rounded-pill px-3 py-1 fw-bold shadow-sm" style="font-size: 11px;">
                                            <i class="fas fa-expand me-1"></i> Quick View
                                        </span>
                                    </div>
                                </div>

                                <!-- Title -->
                                <h5 class="serif-title fw-bold mb-2 project-title-hover" style="font-size: 1.05rem; cursor: pointer;">{{ $p->title }}</h5>

                                <!-- Description -->
                                <p class="text-secondary mb-3" style="font-size: 0.76rem; line-height: 1.5; color: #55524B !important;">
                                    {{ $p->description }}
                                </p>

                                <!-- Tech Tags -->
                                <div class="mb-3">
                                    @php
                                        $ptags = explode(',', $p->tags ?? '');
                                    @endphp
                                    @foreach($ptags as $tag)
                                        @if(trim($tag))
                                            <span class="badge bg-light text-dark border me-1 mb-1 tag-hover-pill" style="font-size: 10px; font-weight: 500; padding: 3px 6px;">
                                                {{ trim($tag) }}
                                            </span>
                                        @endif
                                    @endforeach
                                </div>
                            </div>

                            <!-- Bottom Row: View Project -->
                            <div class="d-flex align-items-center justify-content-end pt-2 border-top">
                                <a href="{{ $p->link }}" class="view-project-link">
                                    <span>View Project</span>
                                    <i class="fas fa-arrow-right" style="font-size: 10px;"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- See All Projects Button -->
            <div class="text-center mt-4 pt-2" id="seeAllProjectsContainer" style="{{ count($projects) > 6 ? '' : 'display: none;' }}">
                <button type="button" class="btn-see-all" id="btnToggleProjects">
                    <span id="btnToggleProjectsText">See All Projects</span>
                    <i class="fas fa-arrow-right" id="btnToggleProjectsIcon"></i>
                </button>
            </div>
        </section>


        <!-- ==========================================
             05 / COMMUNITY & LEADERSHIP: ORGANIZATION
             ========================================== -->
        <section id="organization" class="pt-3 pb-5 reveal-on-scroll">
            <div class="section-heading-wrap">
                <div class="mono-tag">05 / COMMUNITY & LEADERSHIP</div>
                <h2 class="serif-title section-main-title">Organization</h2>
            </div>

            <div class="row g-3 align-items-stretch">
                @foreach($organizations as $org)
                    <div class="col-lg-4 col-md-6">
                        <div class="folio-card folio-card-interactive p-4 h-100 d-flex flex-column justify-content-between">
                            <div>
                                <!-- Role Tag -->
                                <span class="badge-yellow-tag fw-bold mb-3" style="font-size: 10.5px;">
                                    {{ $org->badge_role }} {{ $org->period }}
                                </span>

                                <!-- Position Title -->
                                <h5 class="serif-title fw-bold mb-1" style="font-size: 1.12rem; line-height: 1.35;">
                                    {{ $org->position }}
                                </h5>

                                <!-- Organization Name -->
                                <p class="text-muted fw-semibold mb-3" style="font-size: 0.78rem;">
                                    {{ $org->organization }}
                                </p>

                                <!-- Description -->
                                <p class="text-secondary mb-3" style="font-size: 0.78rem; line-height: 1.6; color: #4A473E !important;">
                                    {{ $org->description }}
                                </p>

                                <!-- Tangible Outcome Box -->
                                @if($org->tangible_outcome)
                                    <div class="p-3 mb-3 folio-card-interactive" style="background-color: var(--yellow-pill-bg); border: 1px solid var(--yellow-pill-border); border-radius: 8px;">
                                        <p class="fw-bold mb-1 text-uppercase" style="font-size: 0.65rem; letter-spacing: 0.04em; color: #735E10;">
                                            TANGIBLE OUTCOME
                                        </p>
                                        <p class="mb-0 fw-medium" style="font-size: 0.72rem; color: #3A3414; line-height: 1.4;">
                                            {{ $org->tangible_outcome }}
                                        </p>
                                    </div>
                                @endif
                            </div>

                            <!-- Footer Link -->
                            <div class="pt-2">
                                <a href="{{ $org->link }}" class="view-project-link">
                                    <i class="fa-regular fa-file-lines me-1"></i>
                                    <span>View Documentation</span>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>


        <!-- ==========================================
             06 / VERIFIED CREDENTIALS: HONORS & CERTIFICATIONS
             ========================================== -->
        <section id="certifications" class="pt-3 pb-5 reveal-on-scroll">
            <div class="d-flex align-items-end justify-content-between mb-4">
                <div>
                    <div class="mono-tag">06 / VERIFIED CREDENTIALS</div>
                    <h2 class="serif-title section-main-title">Certifications</h2>
                </div>
                <div class="d-none d-md-flex align-items-center gap-1 text-muted" style="font-size: 0.75rem;">
                    <i class="fas fa-shield-halved text-success"></i>
                    <span>Cryptographically Verified ID Records</span>
                </div>
            </div>

            <div class="row g-3 align-items-stretch">
                @foreach($certifications as $cert)
                    <div class="col-lg-4 col-md-6">
                        <div class="folio-card folio-card-interactive p-4 h-100 d-flex flex-column justify-content-between">
                            <div>
                                <!-- Issuer & Logo Header -->
                                <div class="d-flex align-items-center gap-3 mb-3">
                                    @if($cert->logo)
                                        <div style="width: 38px; height: 38px; border-radius: 6px; overflow: hidden; background: #FFF; display: flex; align-items: center; justify-content: center; box-shadow: 0 1px 4px rgba(0,0,0,0.06);">
                                            <img src="{{ asset($cert->logo) }}" alt="{{ $cert->issuer }}" style="max-width: 100%; max-height: 100%; object-fit: contain;">
                                        </div>
                                    @else
                                        <div class="icon-circle-box icon-box-green">
                                            <i class="fas fa-award"></i>
                                        </div>
                                    @endif
                                    <div>
                                        <span class="fw-bold text-uppercase" style="font-size: 0.68rem; letter-spacing: 0.04em; color: #666;">
                                            {{ $cert->issuer }}
                                        </span>
                                    </div>
                                </div>

                                <!-- Title -->
                                <h5 class="serif-title fw-bold mb-2" style="font-size: 1.1rem; line-height: 1.35;">
                                    {{ $cert->title }}
                                </h5>

                                <!-- Description -->
                                <p class="text-secondary mb-4" style="font-size: 0.77rem; line-height: 1.55; color: #4A473E !important;">
                                    {{ $cert->description }}
                                </p>
                            </div>

                            <!-- Footer Row -->
                            <div>
                                <div class="d-flex align-items-center justify-content-between mb-3 pt-2 border-top">
                                    <span class="text-muted" style="font-size: 0.72rem;">{{ $cert->issued_date }}</span>
                                    @if($cert->badge_type == 'green')
                                        <span class="badge" style="background-color: var(--green-badge-bg); color: var(--green-badge-text); border: 1px solid var(--green-badge-border); font-size: 0.7rem; font-weight: 600;">
                                            {{ $cert->badge_text }}
                                        </span>
                                    @elseif($cert->badge_type == 'yellow')
                                        <span class="badge" style="background-color: var(--yellow-pill-bg); color: var(--yellow-pill-text); border: 1px solid var(--yellow-pill-border); font-size: 0.7rem; font-weight: 600;">
                                            {{ $cert->badge_text }}
                                        </span>
                                    @else
                                        <span class="badge bg-light text-secondary border" style="font-size: 0.7rem; font-weight: 600;">
                                            {{ $cert->badge_text }}
                                        </span>
                                    @endif
                                </div>

                                <a href="{{ $cert->link }}" class="view-project-link">
                                    <i class="fa-regular fa-file-lines me-1"></i>
                                    <span>View Certificate</span>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>


        <!-- ==========================================
             07 / CONTINUED MASTERY: INTENSIVE COURSES & BOOTCAMPS
             ========================================== -->
        <section id="courses" class="pt-3 pb-5 reveal-on-scroll">
            <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
                <div class="section-heading-wrap mb-3" style="margin-bottom: 16px !important;">
                    <div class="mono-tag">07 / CONTINUED MASTERY</div>
                    <h2 class="serif-title section-main-title">Intensive Courses & Bootcamps</h2>
                </div>
                <div class="d-flex align-items-center gap-2 mb-3">
                    <button type="button" class="courses-nav-btn" id="coursesPrevBtn" aria-label="Previous courses"><i class="fas fa-chevron-left"></i></button>
                    <button type="button" class="courses-nav-btn" id="coursesNextBtn" aria-label="Next courses"><i class="fas fa-chevron-right"></i></button>
                </div>
            </div>

            <div class="courses-slider-outer">
                <div class="courses-slider-track" id="coursesSliderTrack">
                    @foreach($courses as $course)
                        <div class="courses-slider-item">
                            <div class="folio-card folio-card-interactive course-card-trigger p-4 h-100 d-flex flex-column justify-content-between"
                                 data-provider="{{ $course->provider }}"
                                 data-hours="{{ $course->hours }}"
                                 data-title="{{ $course->title }}"
                                 data-desc="{{ $course->description }}"
                                 data-status="{{ $course->status }}"
                                 data-drive="{{ $course->drive_link ?? '' }}">
                                <div>
                                    <!-- Provider & Hours -->
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <span class="fw-bold" style="font-size: 0.76rem; color: #2B4C7E;">{{ $course->provider }}</span>
                                        <span class="badge bg-light text-secondary border" style="font-size: 0.68rem; font-weight: 600;">{{ $course->hours }}</span>
                                    </div>

                                    <!-- Title -->
                                    <h5 class="serif-title fw-bold mb-2" style="font-size: 1.05rem; line-height: 1.35;">
                                        {{ Str::limit($course->title, 50) }}
                                    </h5>

                                    <!-- Description -->
                                    <p class="text-secondary mb-3" style="font-size: 0.74rem; line-height: 1.5; color: #55524B !important; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;">
                                        {{ $course->description }}
                                    </p>
                                </div>

                                <div class="d-flex align-items-center justify-content-between pt-2 border-top gap-2">
                                    <span class="fw-semibold" style="font-size: 0.72rem; color: #2E7D32;">
                                        <i class="fas fa-check-circle me-1" style="font-size: 11px;"></i>
                                        {{ Str::limit($course->status, 22) }}
                                    </span>
                                    <span class="d-inline-flex align-items-center gap-1" style="font-size: 0.7rem; font-weight: 600; color: #1F1F1E;">
                                        Detail <i class="fas fa-arrow-up-right-from-square" style="font-size: 9px;"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="courses-dots" id="coursesDots"></div>
        </section>


        <!-- ==========================================
             08 / DIRECT CORRESPONDENCE: GET IN TOUCH
             ========================================== -->
        <section id="contact" class="pt-3 pb-4 reveal-on-scroll">
            <div class="section-heading-wrap">
                <div class="mono-tag">08 / DIRECT CORRESPONDENCE</div>
                <h2 class="serif-title section-main-title">Get in Touch</h2>
            </div>

            <div class="row g-3">
                <!-- Phone -->
                <div class="col-lg-4 col-md-6">
                    <div class="folio-card folio-card-interactive copyable-card p-3 p-md-4 h-100" data-copy="{{ $profile->phone ?? '+62 812-3456-7890' }}" title="Klik untuk salin nomor telepon">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <div class="d-flex align-items-center gap-2">
                                <i class="fas fa-phone-alt text-success" style="font-size: 14px;"></i>
                                <span class="mono-tag" style="font-size: 10px;">NOMOR TELEPON</span>
                            </div>
                            <span class="badge bg-light text-muted border copy-badge"><i class="fa-regular fa-copy me-1"></i>Salin</span>
                        </div>
                        <h6 class="fw-bold mb-1" style="font-size: 0.95rem;">{{ $profile->phone ?? '+62 812-3456-7890' }}</h6>
                        <p class="text-muted mb-0" style="font-size: 0.74rem;">{{ $profile->phone_note ?? 'Available via WhatsApp & Call' }}</p>
                    </div>
                </div>

                <!-- Email -->
                <div class="col-lg-4 col-md-6">
                    <div class="folio-card folio-card-interactive copyable-card p-3 p-md-4 h-100" data-copy="{{ $profile->email ?? 'sherrynitamarsya@gmail.com' }}" title="Klik untuk salin alamat email">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <div class="d-flex align-items-center gap-2">
                                <i class="fas fa-envelope text-primary" style="font-size: 14px;"></i>
                                <span class="mono-tag" style="font-size: 10px;">EMAIL ADDRESS</span>
                            </div>
                            <span class="badge bg-light text-muted border copy-badge"><i class="fa-regular fa-copy me-1"></i>Salin</span>
                        </div>
                        <h6 class="fw-bold mb-1" style="font-size: 0.95rem;">{{ $profile->email ?? 'sherrynitamarsya@gmail.com' }}</h6>
                        <p class="text-muted mb-0" style="font-size: 0.74rem;">{{ $profile->email_note ?? 'Send direct message' }}</p>
                    </div>
                </div>

                <!-- Location -->
                <div class="col-lg-4 col-md-6">
                    <div class="folio-card folio-card-interactive p-3 p-md-4 h-100">
                        <div class="d-flex align-items-center gap-2 mb-2">
                            <i class="fas fa-location-dot text-danger" style="font-size: 14px;"></i>
                            <span class="mono-tag" style="font-size: 10px;">ALAMAT / LOCATION</span>
                        </div>
                        <h6 class="fw-bold mb-1" style="font-size: 0.95rem;">{{ $profile->location ?? 'Kec. Beji, Kota Depok' }}</h6>
                        <p class="text-muted mb-0" style="font-size: 0.74rem;">{{ $profile->location_note ?? 'Jawa Barat, Indonesia (Open to WFH / Onsite)' }}</p>
                    </div>
                </div>

                <!-- LinkedIn (Direct Clickable) -->
                <div class="col-lg-4 col-md-6">
                    <a href="{{ $profile->linkedin_url ?? 'https://linkedin.com/in/sherrynita' }}" target="_blank" class="text-decoration-none d-block h-100">
                        <div class="folio-card folio-card-interactive p-3 p-md-4 h-100">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <div class="d-flex align-items-center gap-2">
                                    <i class="fab fa-linkedin text-info" style="font-size: 15px;"></i>
                                    <span class="mono-tag" style="font-size: 10px;">LINKEDIN PROFILE</span>
                                </div>
                                <span class="text-muted" style="font-size: 11px;"><i class="fas fa-arrow-up-right-from-square"></i></span>
                            </div>
                            <h6 class="fw-bold mb-1 text-dark" style="font-size: 0.95rem;">{{ $profile->linkedin ?? 'linkedin.com/in/sherrynita' }}</h6>
                            <p class="text-muted mb-0" style="font-size: 0.74rem;">Connect on professional network &rarr;</p>
                        </div>
                    </a>
                </div>

                <!-- GitHub (Direct Clickable) -->
                <div class="col-lg-4 col-md-6">
                    <a href="{{ $profile->github_url ?? 'https://github.com/sherrynita' }}" target="_blank" class="text-decoration-none d-block h-100">
                        <div class="folio-card folio-card-interactive p-3 p-md-4 h-100">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <div class="d-flex align-items-center gap-2">
                                    <i class="fab fa-github text-dark" style="font-size: 15px;"></i>
                                    <span class="mono-tag" style="font-size: 10px;">GITHUB REPOSITORY</span>
                                </div>
                                <span class="text-muted" style="font-size: 11px;"><i class="fas fa-arrow-up-right-from-square"></i></span>
                            </div>
                            <h6 class="fw-bold mb-1 text-dark" style="font-size: 0.95rem;">{{ $profile->github ?? 'github.com/sherrynita' }}</h6>
                            <p class="text-muted mb-0" style="font-size: 0.74rem;">Explore code repositories &rarr;</p>
                        </div>
                    </a>
                </div>

                <!-- Response Time -->
                <div class="col-lg-4 col-md-6">
                    <div class="folio-card folio-card-interactive p-3 p-md-4 h-100">
                        <div class="d-flex align-items-center gap-2 mb-2">
                            <i class="fas fa-clock text-warning" style="font-size: 14px;"></i>
                            <span class="mono-tag" style="font-size: 10px;">RESPONSE TIME</span>
                        </div>
                        <h6 class="fw-bold mb-1" style="font-size: 0.95rem;">{{ $profile->response_time ?? '< 24 Hours' }}</h6>
                        <p class="text-success fw-semibold mb-0" style="font-size: 0.74rem;">
                            <span class="d-inline-block rounded-circle bg-success me-1" style="width: 7px; height: 7px;"></span>
                            {{ $profile->response_note ?? 'Actively accepting new projects' }}
                        </p>
                    </div>
                </div>
            </div>
        </section>


        <!-- ==========================================
             FOOTER SECTION
             ========================================== -->
        <footer class="footer-wrap">
            <div class="row g-4 align-items-start">
                <!-- Left: Logo & Name & Bio -->
                <div class="col-lg-5">
                    <div class="d-flex align-items-center gap-2 mb-2">
                        <img src="{{ asset('images/logo.png') }}" alt="Logo" style="width: 24px; height: 24px; border-radius: 5px; object-fit: contain;">
                        <h5 class="serif-title fw-bold mb-0" style="font-size: 1.1rem;">
                            {{ $profile->name ?? 'Sherrynita Marsya Putri Setiawan' }}
                        </h5>
                    </div>
                    <p class="text-secondary pe-lg-4" style="font-size: 0.8rem; line-height: 1.6; color: #55524B !important;">
                        {{ $profile->footer_bio ?? 'I am an Information Systems graduate leveraging expertise in web development, UI/UX, and data analysis to create aesthetic, data-driven digital solutions.' }}
                    </p>
                </div>

                <!-- Middle: Navigation Links -->
                <div class="col-lg-3 col-md-6">
                    <div class="d-flex flex-column">
                        <a href="#about" class="footer-nav-link">About</a>
                        <a href="#education" class="footer-nav-link">Education & Skills</a>
                        <a href="#experience" class="footer-nav-link">Experience</a>
                        <a href="#projects" class="footer-nav-link">Featured Projects</a>
                        <a href="#organization" class="footer-nav-link">Organisation</a>
                        <a href="#certifications" class="footer-nav-link">Certifications</a>
                        <a href="#courses" class="footer-nav-link">Course</a>
                        <a href="#contact" class="footer-nav-link">Contact</a>
                    </div>
                </div>

                <!-- Right: Dispatch & Social -->
                <div class="col-lg-4 col-md-6">
                    <h6 class="fw-bold mb-2 text-uppercase" style="font-size: 0.75rem; letter-spacing: 0.05em; color: #2B2A27;">
                        DISPATCH & SOCIAL
                    </h6>
                    @php
                        $rawDispatch = $profile->dispatch_social ?? 'ReadCV • GitHub • LinkedIn • Substack';
                        $tokens = preg_split('/[•|,]/u', $rawDispatch);
                        $socialItems = [];

                        foreach ($tokens as $token) {
                            $item = trim($token);
                            if (!$item) continue;

                            $label = $item;
                            $url = '#';

                            // Format: "Name: https://..."
                            if (str_contains($item, ':') && !str_starts_with($item, 'http')) {
                                $parts = explode(':', $item, 2);
                                $label = trim($parts[0]);
                                $url = trim($parts[1]);
                            } else {
                                $lower = strtolower($item);
                                if (str_contains($lower, 'readcv') || str_contains($lower, 'read.cv') || str_contains($lower, 'cv') || str_contains($lower, 'resume')) {
                                    $url = ($profile->cv_file && $profile->cv_file !== '#') ? asset($profile->cv_file) : ($profile->linkedin_url ?? 'https://read.cv');
                                } elseif (str_contains($lower, 'github')) {
                                    $url = $profile->github_url ?? 'https://github.com/sherrynita';
                                } elseif (str_contains($lower, 'linkedin')) {
                                    $url = $profile->linkedin_url ?? 'https://linkedin.com/in/sherrynita';
                                } elseif (str_contains($lower, 'substack')) {
                                    $url = 'https://substack.com';
                                } elseif (str_contains($lower, 'instagram')) {
                                    $url = 'https://instagram.com';
                                } elseif (str_contains($lower, 'twitter') || str_contains($lower, 'x.com')) {
                                    $url = 'https://x.com';
                                } elseif (filter_var($item, FILTER_VALIDATE_URL)) {
                                    $url = $item;
                                }
                            }

                            $socialItems[] = [
                                'label' => $label,
                                'url' => $url,
                                'is_download' => (str_contains(strtolower($label), 'cv') && $profile->cv_file && $profile->cv_file !== '#')
                            ];
                        }
                    @endphp

                    <div class="d-flex flex-wrap align-items-center gap-2 mb-3">
                        @foreach($socialItems as $idx => $si)
                            @if($idx > 0)
                                <span class="text-secondary" style="font-size: 0.72rem; opacity: 0.6;">•</span>
                            @endif
                            <a href="{{ $si['url'] }}" 
                               target="_blank" 
                               rel="noopener noreferrer"
                               class="footer-social-link fw-semibold"
                               @if($si['is_download']) download @endif
                               title="Kunjungi {{ $si['label'] }}">
                                {{ $si['label'] }}
                            </a>
                        @endforeach
                    </div>

                    @php
                        $officeNote = $profile->office_note ?? 'Office: studio@creativecraft.archive';
                    @endphp
                    <p class="text-muted" style="font-size: 0.75rem;">
                        @if(str_contains($officeNote, '@'))
                            @php
                                $words = explode(' ', $officeNote);
                            @endphp
                            @foreach($words as $w)
                                @if(str_contains($w, '@'))
                                    <a href="mailto:{{ trim($w, ':;,()') }}" class="footer-social-link text-muted" style="text-decoration: underline;">{{ $w }}</a>
                                @else
                                    {{ $w }}
                                @endif
                            @endforeach
                        @else
                            {{ $officeNote }}
                        @endif
                    </p>
                </div>
            </div>
        </footer>

    </main>

    <!-- Back to Top Floating Button -->
    <button type="button" id="btnBackToTop" class="btn-back-to-top" title="Kembali ke atas" aria-label="Back to Top">
        <i class="fas fa-arrow-up"></i>
    </button>

    <!-- Floating Quick Link to Admin Panel -->
    <a href="{{ route('admin.dashboard') }}" class="admin-quick-pill" target="_blank" title="Buka Admin Panel (CRUD)">
        <i class="fas fa-sliders"></i>
        <span>Admin Panel</span>
    </a>

    <!-- Project Preview Modal -->
    <div class="modal fade" id="projectPreviewModal" tabindex="-1" aria-labelledby="modalProjectTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content shadow-lg" style="background-color: #FFFDF7; border: 1px solid #E8E2D0; border-radius: 14px; overflow: hidden;">
                <div class="modal-header border-bottom py-3 px-4" style="background-color: #FFF9E7;">
                    <div class="d-flex align-items-center gap-2">
                        <span id="modalProjectBadge" class="badge bg-dark text-white text-uppercase" style="font-size: 9.5px; padding: 4px 8px;"></span>
                        <h5 class="modal-title serif-title fw-bold mb-0" id="modalProjectTitle" style="font-size: 1.25rem;"></h5>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <!-- Large Image Preview -->
                    <div class="position-relative mb-4" style="height: 320px; border-radius: 10px; overflow: hidden; background: #2A2D34;">
                        <img id="modalProjectImage" src="" alt="Project Preview" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                    
                    <h6 class="mono-tag mb-2" style="font-size: 11px;">PROJECT OVERVIEW & SPECIFICATIONS</h6>
                    <p id="modalProjectDesc" class="text-secondary mb-4" style="font-size: 0.9rem; line-height: 1.65; color: #4A473E !important;"></p>
                    
                    <h6 class="mono-tag mb-2" style="font-size: 11px;">TECHNOLOGY STACK</h6>
                    <div id="modalProjectTags" class="d-flex flex-wrap gap-1 mb-2"></div>
                </div>
                <div class="modal-footer border-top py-3 px-4 d-flex justify-content-between align-items-center" style="background-color: #FFF9E7;">
                    <button type="button" class="btn btn-outline-secondary rounded-pill px-4" data-bs-dismiss="modal" style="font-size: 13px;">Tutup</button>
                    <a id="modalProjectLink" href="#" target="_blank" class="btn btn-touch px-4 d-inline-flex align-items-center gap-2" style="font-size: 13px;">
                        <span>Buka Link Project</span>
                        <i class="fas fa-arrow-up-right-from-square"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Course Detail Modal (slide per 4) -->
    <div class="modal fade" id="courseDetailModal" tabindex="-1" aria-labelledby="modalCourseTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content shadow-lg" style="background-color: #FFFDF7; border: 1px solid #E8E2D0; border-radius: 14px; overflow: hidden;">
                <div class="modal-header border-bottom py-3 px-4" style="background-color: #FFF9E7;">
                    <div class="d-flex flex-column gap-1">
                        <div class="d-flex align-items-center gap-2">
                            <span id="modalCourseProvider" class="fw-bold" style="font-size: 0.8rem; color: #2B4C7E;"></span>
                            <span id="modalCourseHours" class="badge bg-light text-secondary border" style="font-size: 0.68rem;"></span>
                        </div>
                        <h5 class="modal-title serif-title fw-bold mb-0" id="modalCourseTitle" style="font-size: 1.2rem; line-height: 1.3;"></h5>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <h6 class="mono-tag mb-2" style="font-size: 11px;">DESCRIPTION & SYLLABUS</h6>
                    <p id="modalCourseDesc" class="text-secondary mb-4" style="font-size: 0.86rem; line-height: 1.65; color: #4A473E !important; white-space: pre-line;"></p>

                    <h6 class="mono-tag mb-2" style="font-size: 11px;">COMPLETION STATUS</h6>
                    <div class="d-flex align-items-center gap-2 mb-4">
                        <span class="d-inline-flex align-items-center justify-content-center rounded-circle bg-success bg-opacity-10 border border-success" style="width: 22px; height: 22px;"><i class="fas fa-check" style="font-size: 10px; color: #2E7D32;"></i></span>
                        <span id="modalCourseStatus" class="fw-semibold" style="font-size: 0.8rem; color: #2E7D32;"></span>
                    </div>

                    <div id="modalCourseDriveWrap" class="d-none">
                        <h6 class="mono-tag mb-2" style="font-size: 11px;">CERTIFICATE / MATERIALS</h6>
                        <a id="modalCourseDriveLink" href="#" target="_blank" class="btn btn-sm d-inline-flex align-items-center gap-2 px-3 py-2"
                           style="background:#FFFFFF; border:1px solid #D8D1BD; border-radius: 8px; font-size: 12px; font-weight: 600; color: #1F1F1E; text-decoration: none;">
                            <i class="fab fa-google-drive" style="color:#2B4C7E;"></i>
                            <span>Buka di Google Drive</span>
                            <i class="fas fa-arrow-up-right-from-square" style="font-size: 10px;"></i>
                        </a>
                    </div>
                </div>
                <div class="modal-footer border-top py-3 px-4 d-flex justify-content-between align-items-center" style="background-color: #FFF9E7;">
                    <button type="button" class="btn btn-outline-secondary rounded-pill px-4" data-bs-dismiss="modal" style="font-size: 13px;">Tutup</button>
                    <a id="modalCourseDriveLinkFooter" href="#" target="_blank" class="btn btn-touch px-4 d-none align-items-center gap-2" style="font-size: 13px;">
                        <span><i class="fab fa-google-drive me-1"></i> Lihat di Drive</span>
                        <i class="fas fa-arrow-up-right-from-square"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Copy to Clipboard Toast Notification -->
    <div class="toast-container position-fixed bottom-0 start-50 translate-middle-x p-3" style="z-index: 10002;">
        <div id="copyToast" class="toast align-items-center text-bg-dark border-0 rounded-pill px-3 py-1 shadow" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex align-items-center">
                <div class="toast-body d-flex align-items-center gap-2 py-2" style="font-size: 13px;">
                    <i class="fas fa-check-circle text-success"></i>
                    <span id="copyToastMessage">Berhasil disalin ke clipboard!</span>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript: Bootstrap, Project Filtering, Animations & Interactivity -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // -------------------------------------------------------------
            // 1. Dynamic Typewriter Effect in Hero Section
            // -------------------------------------------------------------
            const typewriterPhrases = [
                'Web UI/UX & Interaction Design',
                'Full-Stack Web Development (Laravel, PHP, React)',
                'Certified Data Analysis & Visualizations',
                'Scalable Enterprise Information Systems'
            ];
            let phraseIdx = 0;
            let charIdx = 0;
            let isDeleting = false;
            const typewriterEl = document.getElementById('heroTypewriter');

            function typeLoop() {
                if (!typewriterEl) return;
                const currentPhrase = typewriterPhrases[phraseIdx];
                
                if (isDeleting) {
                    typewriterEl.textContent = currentPhrase.substring(0, charIdx - 1);
                    charIdx--;
                } else {
                    typewriterEl.textContent = currentPhrase.substring(0, charIdx + 1);
                    charIdx++;
                }

                let typeSpeed = isDeleting ? 28 : 60;

                if (!isDeleting && charIdx === currentPhrase.length) {
                    typeSpeed = 2000; // Pause at end of sentence
                    isDeleting = true;
                } else if (isDeleting && charIdx === 0) {
                    isDeleting = false;
                    phraseIdx = (phraseIdx + 1) % typewriterPhrases.length;
                    typeSpeed = 400; // Pause before typing next
                }

                setTimeout(typeLoop, typeSpeed);
            }
            typeLoop();

            // -------------------------------------------------------------
            // 2. Top Scroll Progress Bar
            // -------------------------------------------------------------
            const progressBar = document.getElementById('scrollProgressBar');
            window.addEventListener('scroll', function () {
                const scrollTop = document.documentElement.scrollTop || document.body.scrollTop;
                const scrollHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
                if (scrollHeight > 0 && progressBar) {
                    const percent = (scrollTop / scrollHeight) * 100;
                    progressBar.style.width = percent + '%';
                }
            });

            // -------------------------------------------------------------
            // 3. Active Nav Link Scrollspy
            // -------------------------------------------------------------
            const sections = document.querySelectorAll('section[id]');
            const navLinks = document.querySelectorAll('.nav-link-custom');

            function updateScrollspy() {
                const scrollPos = window.scrollY + 140;
                let activeId = '';

                sections.forEach(sec => {
                    const top = sec.offsetTop;
                    const height = sec.offsetHeight;
                    if (scrollPos >= top && scrollPos < top + height) {
                        activeId = sec.getAttribute('id');
                    }
                });

                navLinks.forEach(link => {
                    link.classList.remove('active');
                    if (activeId && link.getAttribute('href') === '#' + activeId) {
                        link.classList.add('active');
                    }
                });
            }
            window.addEventListener('scroll', updateScrollspy);
            updateScrollspy();

            // -------------------------------------------------------------
            // 4. Back to Top Button
            // -------------------------------------------------------------
            const backToTopBtn = document.getElementById('btnBackToTop');
            window.addEventListener('scroll', function () {
                if (window.scrollY > 380) {
                    if (backToTopBtn) backToTopBtn.classList.add('show');
                } else {
                    if (backToTopBtn) backToTopBtn.classList.remove('show');
                }
            });
            if (backToTopBtn) {
                backToTopBtn.addEventListener('click', function () {
                    window.scrollTo({ top: 0, behavior: 'smooth' });
                });
            }

            // -------------------------------------------------------------
            // 5. Scroll Reveal & Animated Skill Progress Bars (IntersectionObserver)
            // -------------------------------------------------------------
            const revealElements = document.querySelectorAll('.reveal-on-scroll');
            let skillsAnimated = false;

            function animateSkillBars() {
                if (skillsAnimated) return;
                skillsAnimated = true;

                const skillRows = document.querySelectorAll('.skill-bar-row');
                skillRows.forEach(row => {
                    const pct = parseInt(row.getAttribute('data-percentage'), 10) || 0;
                    const progressEl = row.querySelector('.skill-bar-progress');
                    const counterEl = row.querySelector('.skill-counter');

                    if (progressEl) {
                        progressEl.style.width = pct + '%';
                    }

                    if (counterEl) {
                        let current = 0;
                        const duration = 1200;
                        const stepTime = Math.max(Math.floor(duration / (pct || 1)), 15);
                        const timer = setInterval(() => {
                            current += 1;
                            counterEl.textContent = current;
                            if (current >= pct) {
                                counterEl.textContent = pct;
                                clearInterval(timer);
                            }
                        }, stepTime);
                    }
                });
            }

            if ('IntersectionObserver' in window) {
                const revealObserver = new IntersectionObserver((entries, observer) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('is-revealed');

                            // If education/skills section entered, trigger bar animations
                            if (entry.target.id === 'education') {
                                animateSkillBars();
                            }
                            observer.unobserve(entry.target);
                        }
                    });
                }, { threshold: 0.12 });

                revealElements.forEach(el => revealObserver.observe(el));
            } else {
                // Fallback for older browsers
                revealElements.forEach(el => el.classList.add('is-revealed'));
                animateSkillBars();
            }

            // -------------------------------------------------------------
            // 6. Project Filtering & "See All" Pagination
            // -------------------------------------------------------------
            const filterButtons = document.querySelectorAll('#projectFilterGroup .filter-btn');
            const projectItems = document.querySelectorAll('#projectsGrid .project-item');
            const toggleContainer = document.getElementById('seeAllProjectsContainer');
            const toggleBtn = document.getElementById('btnToggleProjects');
            const toggleText = document.getElementById('btnToggleProjectsText');
            const toggleIcon = document.getElementById('btnToggleProjectsIcon');

            const VISIBLE_LIMIT = 6;
            let isProjectsExpanded = false;

            function renderProjects() {
                const activeBtn = document.querySelector('#projectFilterGroup .filter-btn.active');
                const filterValue = activeBtn ? activeBtn.getAttribute('data-filter') : 'all';
                const targetFilter = filterValue ? filterValue.trim().toLowerCase() : 'all';

                const matchingItems = [];

                projectItems.forEach(item => {
                    const rawCategory = item.getAttribute('data-category') || '';
                    const categories = rawCategory.split(',').map(c => c.trim().toLowerCase()).filter(Boolean);

                    const isMatch = targetFilter === 'all' || categories.some(cat => {
                        if (cat === targetFilter) return true;
                        if (targetFilter === 'ui/ux design' && (cat === 'ui/ux' || cat.includes('ui/ux'))) return true;
                        if (targetFilter === 'ui/ux' && cat.includes('ui/ux')) return true;
                        return false;
                    });

                    if (isMatch) {
                        matchingItems.push(item);
                    } else {
                        item.style.display = 'none';
                    }
                });

                // Display items based on current expansion state
                matchingItems.forEach((item, index) => {
                    if (isProjectsExpanded || index < VISIBLE_LIMIT) {
                        item.style.display = 'block';
                        setTimeout(() => {
                            item.style.opacity = '1';
                            item.style.transform = 'translateY(0)';
                        }, index * 20);
                    } else {
                        item.style.display = 'none';
                    }
                });

                // Update "See All Projects" button visibility & text
                if (toggleContainer) {
                    if (matchingItems.length > VISIBLE_LIMIT) {
                        toggleContainer.style.display = 'block';
                        if (toggleText) {
                            toggleText.textContent = isProjectsExpanded ? 'Show Less' : 'See All Projects';
                        }
                        if (toggleIcon) {
                            toggleIcon.className = isProjectsExpanded ? 'fas fa-chevron-up' : 'fas fa-arrow-right';
                        }
                    } else {
                        toggleContainer.style.display = 'none';
                    }
                }
            }

            filterButtons.forEach(button => {
                button.addEventListener('click', function () {
                    filterButtons.forEach(btn => btn.classList.remove('active'));
                    this.classList.add('active');

                    isProjectsExpanded = false;
                    renderProjects();
                });
            });

            if (toggleBtn) {
                toggleBtn.addEventListener('click', function () {
                    isProjectsExpanded = !isProjectsExpanded;
                    renderProjects();

                    if (!isProjectsExpanded) {
                        const projectsSection = document.getElementById('projects');
                        if (projectsSection) {
                            projectsSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
                        }
                    }
                });
            }

            renderProjects();

            // -------------------------------------------------------------
            // 7. Interactive Project Quick View Modal
            // -------------------------------------------------------------
            const modalEl = document.getElementById('projectPreviewModal');
            let previewModal = null;
            if (modalEl && typeof bootstrap !== 'undefined') {
                previewModal = new bootstrap.Modal(modalEl);
            }

            // -------------------------------------------------------------
            // 7b. Courses Slider per 4 + Detail Popup + Drive Link
            // -------------------------------------------------------------
            const coursesTrack = document.getElementById('coursesSliderTrack');
            const coursesPrevBtn = document.getElementById('coursesPrevBtn');
            const coursesNextBtn = document.getElementById('coursesNextBtn');
            const coursesDotsWrap = document.getElementById('coursesDots');
            const courseCards = coursesTrack ? coursesTrack.querySelectorAll('.courses-slider-item') : [];
            let coursesCurrentPage = 0;

            function getCoursesPerView() {
                if (window.innerWidth <= 575) return 1;
                if (window.innerWidth <= 991) return 2;
                return 4;
            }

            function getCoursesTotalPages() {
                const perView = getCoursesPerView();
                return Math.max(1, Math.ceil(courseCards.length / perView));
            }

            function renderCoursesSlider() {
                if (!coursesTrack || courseCards.length === 0) return;
                const perView = getCoursesPerView();
                const totalPages = getCoursesTotalPages();
                if (coursesCurrentPage >= totalPages) coursesCurrentPage = totalPages - 1;
                if (coursesCurrentPage < 0) coursesCurrentPage = 0;

                // slide per perView: translate = page * (outerWidth)
                const outer = coursesTrack.parentElement;
                const outerW = outer ? outer.offsetWidth : 0;
                if (outerW > 0) {
                    coursesTrack.style.transform = 'translateX(-' + (coursesCurrentPage * outerW) + 'px)';
                } else {
                    coursesTrack.style.transform = 'translateX(-' + (coursesCurrentPage * 100) + '%)';
                }

                if (coursesPrevBtn) coursesPrevBtn.disabled = coursesCurrentPage === 0;
                if (coursesNextBtn) coursesNextBtn.disabled = coursesCurrentPage >= totalPages - 1;

                if (coursesDotsWrap) {
                    coursesDotsWrap.innerHTML = '';
                    for (let i = 0; i < totalPages; i++) {
                        const dot = document.createElement('button');
                        dot.type = 'button';
                        dot.className = 'courses-dot' + (i === coursesCurrentPage ? ' active' : '');
                        dot.setAttribute('aria-label', 'Page ' + (i + 1));
                        dot.addEventListener('click', () => {
                            coursesCurrentPage = i;
                            renderCoursesSlider();
                        });
                        coursesDotsWrap.appendChild(dot);
                    }
                    coursesDotsWrap.style.display = totalPages <= 1 ? 'none' : 'flex';
                }

                // Hide nav if single page
                if (coursesPrevBtn && coursesNextBtn) {
                    const hideNav = totalPages <= 1;
                    coursesPrevBtn.style.display = hideNav ? 'none' : 'inline-flex';
                    coursesNextBtn.style.display = hideNav ? 'none' : 'inline-flex';
                }
            }

            if (coursesPrevBtn) {
                coursesPrevBtn.addEventListener('click', () => {
                    coursesCurrentPage = Math.max(0, coursesCurrentPage - 1);
                    renderCoursesSlider();
                });
            }
            if (coursesNextBtn) {
                coursesNextBtn.addEventListener('click', () => {
                    coursesCurrentPage = Math.min(getCoursesTotalPages() - 1, coursesCurrentPage + 1);
                    renderCoursesSlider();
                });
            }

            window.addEventListener('resize', renderCoursesSlider);
            renderCoursesSlider();

            // Swipe support
            let touchStartX = 0;
            let touchEndX = 0;
            if (coursesTrack) {
                coursesTrack.addEventListener('touchstart', (e) => {
                    touchStartX = e.changedTouches[0].screenX;
                }, { passive: true });
                coursesTrack.addEventListener('touchend', (e) => {
                    touchEndX = e.changedTouches[0].screenX;
                    const diff = touchStartX - touchEndX;
                    if (Math.abs(diff) > 50) {
                        if (diff > 0) {
                            coursesCurrentPage = Math.min(getCoursesTotalPages() - 1, coursesCurrentPage + 1);
                        } else {
                            coursesCurrentPage = Math.max(0, coursesCurrentPage - 1);
                        }
                        renderCoursesSlider();
                    }
                }, { passive: true });
            }

            // Course detail popup
            const courseModalEl = document.getElementById('courseDetailModal');
            let courseModal = null;
            if (courseModalEl && typeof bootstrap !== 'undefined') {
                courseModal = new bootstrap.Modal(courseModalEl);
            }
            document.querySelectorAll('.course-card-trigger').forEach(card => {
                card.addEventListener('click', function () {
                    const provider = this.getAttribute('data-provider') || '';
                    const hours = this.getAttribute('data-hours') || '';
                    const title = this.getAttribute('data-title') || '';
                    const desc = this.getAttribute('data-desc') || '';
                    const status = this.getAttribute('data-status') || '';
                    const drive = this.getAttribute('data-drive') || '';

                    const pEl = document.getElementById('modalCourseProvider');
                    const hEl = document.getElementById('modalCourseHours');
                    const tEl = document.getElementById('modalCourseTitle');
                    const dEl = document.getElementById('modalCourseDesc');
                    const sEl = document.getElementById('modalCourseStatus');
                    const driveWrap = document.getElementById('modalCourseDriveWrap');
                    const driveLink = document.getElementById('modalCourseDriveLink');
                    const driveLinkFooter = document.getElementById('modalCourseDriveLinkFooter');

                    if (pEl) pEl.textContent = provider;
                    if (hEl) hEl.textContent = hours;
                    if (tEl) tEl.textContent = title;
                    if (dEl) dEl.textContent = desc;
                    if (sEl) sEl.textContent = status;

                    if (drive && drive !== '') {
                        if (driveWrap) driveWrap.classList.remove('d-none');
                        if (driveLink) { driveLink.href = drive; }
                        if (driveLinkFooter) {
                            driveLinkFooter.href = drive;
                            driveLinkFooter.classList.remove('d-none');
                            driveLinkFooter.classList.add('d-inline-flex');
                        }
                    } else {
                        if (driveWrap) driveWrap.classList.add('d-none');
                        if (driveLinkFooter) {
                            driveLinkFooter.classList.add('d-none');
                            driveLinkFooter.classList.remove('d-inline-flex');
                        }
                    }

                    if (courseModal) courseModal.show();
                });
            });

            document.querySelectorAll('.project-thumb-wrap, .project-title-hover').forEach(trigger => {
                trigger.addEventListener('click', function () {
                    const card = this.closest('.project-item');
                    if (!card) return;
                    const thumbWrap = card.querySelector('.project-thumb-wrap');
                    if (!thumbWrap) return;

                    const title = thumbWrap.getAttribute('data-title') || '';
                    const badge = thumbWrap.getAttribute('data-badge') || '';
                    const image = thumbWrap.getAttribute('data-image') || '';
                    const desc = thumbWrap.getAttribute('data-desc') || '';
                    const tags = thumbWrap.getAttribute('data-tags') || '';
                    const link = thumbWrap.getAttribute('data-link') || '#';

                    const titleEl = document.getElementById('modalProjectTitle');
                    const badgeEl = document.getElementById('modalProjectBadge');
                    const imageEl = document.getElementById('modalProjectImage');
                    const descEl = document.getElementById('modalProjectDesc');
                    const tagsEl = document.getElementById('modalProjectTags');
                    const linkEl = document.getElementById('modalProjectLink');

                    if (titleEl) titleEl.textContent = title;
                    if (badgeEl) badgeEl.textContent = badge;
                    if (imageEl) imageEl.src = image;
                    if (descEl) descEl.textContent = desc;

                    if (tagsEl) {
                        tagsEl.innerHTML = '';
                        if (tags) {
                            tags.split(',').forEach(tag => {
                                if (tag.trim()) {
                                    const span = document.createElement('span');
                                    span.className = 'badge bg-light text-dark border me-1 mb-1';
                                    span.style.fontSize = '11px';
                                    span.style.padding = '5px 9px';
                                    span.textContent = tag.trim();
                                    tagsEl.appendChild(span);
                                }
                            });
                        }
                    }

                    if (linkEl) {
                        if (link && link !== '#') {
                            linkEl.href = link;
                            linkEl.style.display = 'inline-flex';
                        } else {
                            linkEl.style.display = 'none';
                        }
                    }

                    if (previewModal) {
                        previewModal.show();
                    }
                });
            });

            // -------------------------------------------------------------
            // 8. One-Click Copy to Clipboard with Toast Notification
            // -------------------------------------------------------------
            const copyToastEl = document.getElementById('copyToast');
            let copyToast = null;
            if (copyToastEl && typeof bootstrap !== 'undefined') {
                copyToast = new bootstrap.Toast(copyToastEl, { delay: 2400 });
            }

            document.querySelectorAll('.copyable-card').forEach(card => {
                card.addEventListener('click', function () {
                    const textToCopy = this.getAttribute('data-copy');
                    if (!textToCopy) return;

                    navigator.clipboard.writeText(textToCopy).then(() => {
                        const copyBadge = this.querySelector('.copy-badge');
                        if (copyBadge) {
                            const originalHtml = copyBadge.innerHTML;
                            copyBadge.innerHTML = '<i class="fas fa-check text-success me-1"></i>Disalin!';
                            setTimeout(() => {
                                copyBadge.innerHTML = originalHtml;
                            }, 2000);
                        }

                        const toastMsg = document.getElementById('copyToastMessage');
                        if (toastMsg) {
                            toastMsg.textContent = '"' + textToCopy + '" berhasil disalin!';
                        }
                        if (copyToast) {
                            copyToast.show();
                        }
                    }).catch(err => {
                        console.error('Failed to copy: ', err);
                    });
                });
            });
        });

        // -------------------------------------------------------------
        // 9. Switch Skill Track (Frontend vs Backend Dropdown)
        // -------------------------------------------------------------
        function switchSkillTrack(track, label, el) {
            const icon = track === 'frontend' ? '<i class="fas fa-code me-2 text-danger"></i>' : (track === 'backend' ? '<i class="fas fa-server me-2 text-primary"></i>' : '<i class="fas fa-layer-group me-2 text-dark"></i>');
            const labelEl = document.getElementById('selectedTrackLabel');
            if (labelEl) labelEl.innerHTML = icon + label;
            document.querySelectorAll('#skillTrackMenu .dropdown-item').forEach(item => item.classList.remove('active'));
            if (el) el.classList.add('active');

            const feContainer = document.getElementById('frontendSkillsContainer');
            const beContainer = document.getElementById('backendSkillsContainer');

            if (feContainer && beContainer) {
                if (track === 'frontend') {
                    feContainer.style.display = 'block';
                    beContainer.style.display = 'none';
                } else if (track === 'backend') {
                    feContainer.style.display = 'none';
                    beContainer.style.display = 'block';
                } else {
                    feContainer.style.display = 'block';
                    beContainer.style.display = 'block';
                }
            }
        }
    </script>
</body>
</html>
