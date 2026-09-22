<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มเมนู | FlameMenu</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@500;600;700;800&family=Sarabun:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --ink: #1c130d;
            --ink-soft: #2a1c13;
            --cream: #fbf3e6;
            --paper: #f3e6cb;
            --paper-soft: #ece0c4;
            --flame-1: #ff5a3c;
            --flame-2: #e0393f;
            --gold: #f0b429;
            --gold-soft: #f6cc63;
            --line: #d8c093;
            --muted: #c9b7a0;
            --muted-2: #9c8b74;
            --ink-line: #e2cfa4;
            --radius: 14px;
        }

        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: "Sarabun", sans-serif;
            background: var(--ink);
            margin: 0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            color: var(--cream);
        }

        a {
            text-decoration: none;
        }

        img {
            max-width: 100%;
            display: block;
        }

        .page-container {
            flex: 1;
        }

        .wrap {
            max-width: 1180px;
            margin: 0 auto;
            padding: 0 24px;
        }

        ::selection {
            background: var(--gold);
            color: var(--ink);
        }

        :focus-visible {
            outline: 2px solid var(--gold);
            outline-offset: 2px;
        }

        /* ---------- Buttons ---------- */
        .btn {
            font-family: "Prompt", sans-serif;
            font-weight: 600;
            font-size: 0.92rem;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 13px 26px;
            border-radius: 999px;
            border: none;
            cursor: pointer;
            transition: transform 0.15s ease, box-shadow 0.15s ease, filter 0.15s ease, background 0.15s ease, color 0.15s ease;
            line-height: 1;
        }

        .btn:hover {
            transform: translateY(-2px);
        }

        .btn-flame {
            background: linear-gradient(135deg, var(--flame-1), var(--flame-2));
            color: #fff8ef;
            box-shadow: 0 12px 24px -10px rgba(224, 57, 63, 0.65);
        }

        .btn-flame:hover {
            box-shadow: 0 16px 30px -10px rgba(224, 57, 63, 0.75);
        }

        .btn-outline {
            background: transparent;
            color: var(--cream);
            border: 1.5px solid rgba(251, 243, 230, 0.28);
        }

        .btn-outline:hover {
            border-color: var(--gold-soft);
            color: var(--gold-soft);
            background: rgba(240, 180, 41, 0.06);
        }

        .btn-gold {
            background: linear-gradient(135deg, var(--gold-soft), var(--gold));
            color: var(--ink);
            box-shadow: 0 10px 20px -8px rgba(240, 180, 41, 0.5);
        }

        .btn-danger-ghost {
            background: rgba(224, 57, 63, 0.12);
            color: #ff9d92;
            border: 1px solid rgba(224, 57, 63, 0.35);
        }

        .btn-danger-ghost:hover {
            background: rgba(224, 57, 63, 0.22);
        }

        .btn-sm {
            padding: 8px 18px;
            font-size: 0.78rem;
        }

        .btn-block {
            width: 100%;
        }

        /* ---------- Site header ---------- */
        .site-header {
            position: sticky;
            top: 0;
            z-index: 100;
            background: rgba(28, 19, 13, 0.88);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(240, 180, 41, 0.14);
        }

        .site-header-inner {
            max-width: 1180px;
            margin: 0 auto;
            height: 76px;
            padding: 0 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .brand-mark {
            width: 38px;
            height: 38px;
            border-radius: 11px;
            background: linear-gradient(135deg, var(--flame-1), var(--flame-2));
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 8px 16px -6px rgba(224, 57, 63, 0.6);
            flex-shrink: 0;
        }

        .brand-mark svg {
            width: 20px;
            height: 20px;
        }

        .brand-text {
            font-family: "Prompt", sans-serif;
            font-weight: 800;
            color: var(--cream);
            font-size: 1.2rem;
            letter-spacing: 0.2px;
            line-height: 1.1;
        }

        .brand-text small {
            display: block;
            font-family: "Sarabun", sans-serif;
            font-weight: 400;
            font-size: 0.68rem;
            color: var(--muted-2);
            letter-spacing: 1.5px;
            text-transform: uppercase;
            margin-top: 1px;
        }

        .site-nav {
            display: flex;
            align-items: center;
            gap: 4px;
            flex-wrap: wrap;
        }

        .nav-link {
            font-family: "Prompt", sans-serif;
            font-weight: 600;
            font-size: 0.87rem;
            color: var(--muted);
            padding: 9px 18px;
            border-radius: 999px;
            transition: color 0.15s ease, background 0.15s ease;
            white-space: nowrap;
        }

        .nav-link:hover {
            color: var(--cream);
            background: rgba(255, 255, 255, 0.05);
        }

        .nav-link.active {
            color: var(--ink);
            background: var(--gold-soft);
        }

        @media (max-width: 720px) {
            .site-header-inner {
                height: auto;
                flex-wrap: wrap;
                justify-content: center;
                padding: 14px 16px;
                gap: 10px;
                text-align: center;
            }
        }

        /* ---------- Breadcrumb ---------- */
        .breadcrumb {
            max-width: 1180px;
            margin: 28px auto 0;
            padding: 0 24px;
            font-family: "Sarabun", sans-serif;
            font-size: 0.82rem;
            color: var(--muted-2);
            display: flex;
            align-items: center;
            gap: 6px;
            flex-wrap: wrap;
        }

        .breadcrumb a {
            color: var(--muted);
            transition: color 0.15s ease;
        }

        .breadcrumb a:hover {
            color: var(--gold-soft);
        }

        .breadcrumb .crumb-current {
            color: var(--gold-soft);
        }

        /* ---------- Section heading utility ---------- */
        .section-head {
            text-align: center;
            margin: 0 auto 36px;
            max-width: 620px;
        }

        .section-eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: var(--gold-soft);
            font-family: "Prompt", sans-serif;
            font-weight: 600;
            font-size: 0.76rem;
            letter-spacing: 3px;
            text-transform: uppercase;
            margin-bottom: 14px;
        }

        .section-head h1,
        .section-head h2 {
            font-family: "Prompt", sans-serif;
            font-weight: 800;
            color: var(--cream);
            margin: 0;
            font-size: clamp(1.7rem, 4.4vw, 2.5rem);
            letter-spacing: 0.2px;
        }

        .section-head .accent {
            background: linear-gradient(135deg, var(--gold-soft), var(--flame-1));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .section-sub {
            color: var(--muted);
            font-size: 0.96rem;
            margin-top: 12px;
            line-height: 1.6;
        }

        /* ---------- Hero ---------- */
        .hero {
            padding: 64px 0 20px;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: "";
            position: absolute;
            top: -20%;
            right: -10%;
            width: 560px;
            height: 560px;
            background: radial-gradient(circle, rgba(224, 57, 63, 0.18) 0%, transparent 70%);
            pointer-events: none;
        }

        .hero::after {
            content: "";
            position: absolute;
            bottom: -20%;
            left: -10%;
            width: 480px;
            height: 480px;
            background: radial-gradient(circle, rgba(240, 180, 41, 0.12) 0%, transparent 70%);
            pointer-events: none;
        }

        .hero-inner {
            position: relative;
            text-align: center;
            max-width: 720px;
            margin: 0 auto;
        }

        .hero-eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: var(--gold-soft);
            font-family: "Prompt", sans-serif;
            font-weight: 600;
            font-size: 0.78rem;
            letter-spacing: 3px;
            text-transform: uppercase;
            border: 1px solid rgba(240, 180, 41, 0.35);
            padding: 7px 20px;
            border-radius: 999px;
            margin-bottom: 22px;
        }

        .hero h1 {
            font-family: "Prompt", sans-serif;
            font-weight: 800;
            color: var(--cream);
            margin: 0 0 16px;
            font-size: clamp(2.1rem, 5.5vw, 3.4rem);
            letter-spacing: 0.2px;
            line-height: 1.15;
        }

        .hero h1 .accent {
            background: linear-gradient(135deg, var(--gold-soft), var(--flame-1));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .hero-sub {
            color: var(--muted);
            font-size: 1.02rem;
            line-height: 1.7;
            max-width: 520px;
            margin: 0 auto 32px;
        }

        .hero-actions {
            display: flex;
            justify-content: center;
            gap: 14px;
            flex-wrap: wrap;
            margin-bottom: 44px;
        }

        .hero-stats {
            display: flex;
            justify-content: center;
            gap: 12px;
            flex-wrap: wrap;
        }

        .hero-stat {
            display: flex;
            flex-direction: column;
            align-items: center;
            background: rgba(251, 243, 230, 0.04);
            border: 1px solid rgba(240, 180, 41, 0.16);
            border-radius: 14px;
            padding: 16px 26px;
            min-width: 128px;
        }

        .hero-stat .num {
            font-family: "Prompt", sans-serif;
            font-weight: 800;
            font-size: 1.5rem;
            background: linear-gradient(135deg, var(--gold-soft), var(--flame-1));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            line-height: 1.1;
        }

        .hero-stat .label {
            font-size: 0.72rem;
            color: var(--muted-2);
            margin-top: 4px;
            text-align: center;
        }

        /* ---------- Category filter ---------- */
        .filter-bar {
            display: flex;
            justify-content: center;
            gap: 8px;
            flex-wrap: wrap;
            margin: 44px 0 40px;
        }

        .filter-chip {
            font-family: "Prompt", sans-serif;
            font-weight: 600;
            font-size: 0.84rem;
            color: var(--muted);
            background: rgba(251, 243, 230, 0.04);
            border: 1px solid rgba(240, 180, 41, 0.18);
            padding: 9px 20px;
            border-radius: 999px;
            cursor: pointer;
            transition: all 0.15s ease;
        }

        .filter-chip:hover {
            color: var(--cream);
            border-color: rgba(240, 180, 41, 0.4);
        }

        .filter-chip.active {
            background: linear-gradient(135deg, var(--gold-soft), var(--gold));
            color: var(--ink);
            border-color: transparent;
        }

        /* ---------- Menu grid & card ---------- */
        .menu-section {
            padding: 10px 0 80px;
        }

        .menu-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(255px, 1fr));
            gap: 26px;
        }

        .menu-card {
            background: var(--paper);
            border-radius: var(--radius);
            overflow: hidden;
            display: flex;
            flex-direction: column;
            box-shadow: 0 1px 0 rgba(255, 255, 255, 0.4) inset, 0 14px 26px -14px rgba(0, 0, 0, 0.6);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .menu-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 1px 0 rgba(255, 255, 255, 0.4) inset, 0 22px 34px -14px rgba(0, 0, 0, 0.7);
        }

        .menu-card-media {
            position: relative;
            background: linear-gradient(160deg, var(--paper-soft), var(--paper));
            padding: 22px 20px 14px;
        }

        .menu-card-media img {
            width: 100%;
            height: 152px;
            object-fit: contain;
            filter: drop-shadow(0 12px 14px rgba(0, 0, 0, 0.25));
        }

        .menu-card-id {
            position: absolute;
            top: 14px;
            left: 14px;
            font-family: "Prompt", sans-serif;
            font-weight: 700;
            font-size: 0.7rem;
            color: var(--ink);
            background: var(--gold-soft);
            padding: 4px 11px;
            border-radius: 999px;
            letter-spacing: 0.3px;
        }

        .menu-card-body {
            padding: 16px 20px 20px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            border-top: 1px solid var(--ink-line);
        }

        .menu-card-type {
            font-family: "Prompt", sans-serif;
            font-size: 0.68rem;
            font-weight: 600;
            color: var(--flame-2);
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 6px;
        }

        .menu-card-name {
            font-family: "Prompt", sans-serif;
            font-size: 1.04rem;
            font-weight: 600;
            color: var(--ink);
            margin: 0 0 16px;
            line-height: 1.45;
            flex-grow: 1;
        }

        .menu-card-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .menu-price {
            font-family: "Prompt", sans-serif;
            font-size: 1.28rem;
            font-weight: 700;
            color: var(--flame-2);
        }

        .menu-price::before {
            content: "฿";
            font-size: 0.85rem;
            margin-right: 1px;
            opacity: 0.7;
        }

        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: var(--muted-2);
            display: none;
        }

        .empty-state .empty-icon {
            font-size: 2.4rem;
            margin-bottom: 12px;
            opacity: 0.5;
        }

        /* ---------- Dashboard header (admin) ---------- */
        .dash-header {
            padding: 32px 0 28px;
            display: flex;
            flex-wrap: wrap;
            align-items: flex-end;
            justify-content: space-between;
            gap: 20px;
        }

        .dash-title .section-eyebrow {
            margin-bottom: 10px;
        }

        .dash-title h1 {
            font-family: "Prompt", sans-serif;
            font-weight: 800;
            color: var(--cream);
            margin: 0;
            font-size: clamp(1.5rem, 3.4vw, 2.1rem);
        }

        .dash-title .accent {
            background: linear-gradient(135deg, var(--gold-soft), var(--flame-1));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .dash-title p {
            color: var(--muted);
            font-size: 0.9rem;
            margin: 8px 0 0;
        }

        .kpi-row {
            display: flex;
            gap: 14px;
            flex-wrap: wrap;
            margin-bottom: 30px;
        }

        .kpi-card {
            flex: 1;
            min-width: 150px;
            background: rgba(251, 243, 230, 0.04);
            border: 1px solid rgba(240, 180, 41, 0.16);
            border-radius: var(--radius);
            padding: 18px 20px;
        }

        .kpi-card .kpi-num {
            font-family: "Prompt", sans-serif;
            font-weight: 800;
            font-size: 1.7rem;
            background: linear-gradient(135deg, var(--gold-soft), var(--flame-1));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            line-height: 1.1;
        }

        .kpi-card .kpi-label {
            font-size: 0.78rem;
            color: var(--muted-2);
            margin-top: 6px;
        }

        /* ---------- Search ---------- */
        .search-wrap {
            position: relative;
            margin-bottom: 26px;
        }

        .search-wrap input {
            width: 100%;
            font-family: "Sarabun", sans-serif;
            font-size: 0.94rem;
            padding: 14px 20px 14px 46px;
            border-radius: 999px;
            border: 1px solid rgba(240, 180, 41, 0.25);
            background: rgba(251, 243, 230, 0.04);
            color: var(--cream);
            outline: none;
            transition: border-color 0.15s ease, background 0.15s ease;
        }

        .search-wrap input::placeholder {
            color: var(--muted-2);
        }

        .search-wrap input:focus {
            border-color: var(--gold-soft);
            background: rgba(251, 243, 230, 0.08);
        }

        .search-icon {
            position: absolute;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
            opacity: 0.55;
            pointer-events: none;
        }

        .no-results {
            text-align: center;
            color: var(--muted-2);
            padding: 30px;
            font-size: 0.9rem;
            display: none;
        }

        /* ---------- Admin table ---------- */
        .table-card {
            background: var(--paper);
            border-radius: var(--radius);
            overflow: hidden;
            overflow-x: auto;
            box-shadow: 0 18px 34px -18px rgba(0, 0, 0, 0.6);
        }

        table.data-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.9rem;
            min-width: 720px;
        }

        table.data-table thead th {
            font-family: "Prompt", sans-serif;
            background: var(--ink);
            color: var(--gold-soft);
            text-align: left;
            padding: 14px 18px;
            font-weight: 600;
            letter-spacing: 0.4px;
            font-size: 0.74rem;
            text-transform: uppercase;
        }

        table.data-table tbody td {
            padding: 13px 18px;
            border-bottom: 1px solid var(--ink-line);
            color: var(--ink);
            vertical-align: middle;
        }

        table.data-table tbody tr:last-child td {
            border-bottom: none;
        }

        table.data-table tbody tr:hover {
            background: var(--paper-soft);
        }

        .table-thumb {
            width: 72px;
            height: 54px;
            object-fit: contain;
            border-radius: 8px;
            background: var(--paper-soft);
            padding: 4px;
        }

        .id-pill {
            font-family: "Prompt", sans-serif;
            font-weight: 700;
            background: var(--gold-soft);
            color: var(--ink);
            padding: 3px 11px;
            border-radius: 999px;
            font-size: 0.74rem;
        }

        .type-pill {
            font-family: "Prompt", sans-serif;
            font-size: 0.72rem;
            font-weight: 600;
            background: var(--ink);
            color: var(--gold-soft);
            padding: 4px 11px;
            border-radius: 999px;
            white-space: nowrap;
        }

        .price-cell {
            font-family: "Prompt", sans-serif;
            font-weight: 700;
            color: var(--flame-2);
        }

        .price-cell::before {
            content: "฿";
            opacity: 0.65;
            font-weight: 500;
            margin-right: 1px;
        }

        .action-cell {
            display: flex;
            gap: 8px;
        }

        /* ---------- Forms & preview ---------- */
        .form-section {
            padding: 12px 0 80px;
        }

        .split-layout {
            max-width: 940px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 270px 1fr;
            gap: 32px;
            align-items: start;
        }

        @media (max-width: 720px) {
            .split-layout {
                grid-template-columns: 1fr;
            }
        }

        .preview-col {
            position: sticky;
            top: 96px;
        }

        .preview-eyebrow {
            font-family: "Prompt", sans-serif;
            font-size: 0.7rem;
            font-weight: 600;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: var(--gold-soft);
            text-align: center;
            margin-bottom: 12px;
            opacity: 0.9;
        }

        .preview-card .menu-card-name:empty::before {
            content: "ชื่อเมนูจะแสดงที่นี่";
            color: var(--muted-2);
            font-weight: 400;
        }

        .preview-card .menu-price:empty::before {
            content: "0";
        }

        .preview-card .menu-card-media {
            min-height: 150px;
            position: relative;
        }

        .preview-card .menu-card-media img {
            display: none;
        }

        .preview-card .menu-card-media img[src]:not([src=""]) {
            display: block;
        }

        .preview-placeholder {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 2.2rem;
            opacity: 0.3;
        }

        .preview-card .menu-card-media img[src]:not([src=""]) ~ .preview-placeholder {
            display: none;
        }

        .form-card {
            background: var(--paper);
            border-radius: var(--radius);
            padding: 30px 28px;
            box-shadow: 0 1px 0 rgba(255, 255, 255, 0.4) inset, 0 18px 34px -18px rgba(0, 0, 0, 0.6);
        }

        .form-card-heading {
            font-family: "Prompt", sans-serif;
            font-weight: 700;
            font-size: 1rem;
            color: var(--ink);
            margin: 0 0 22px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .field {
            margin-bottom: 18px;
        }

        .field label {
            display: block;
            font-family: "Prompt", sans-serif;
            font-weight: 600;
            font-size: 0.8rem;
            color: var(--ink);
            margin-bottom: 7px;
        }

        .field-with-icon {
            position: relative;
        }

        .field-with-icon .field-icon {
            position: absolute;
            left: 14px;
            top: 39px;
            font-size: 0.98rem;
            opacity: 0.55;
            pointer-events: none;
        }

        .field input[type="text"],
        .field select {
            width: 100%;
            font-family: "Sarabun", sans-serif;
            font-size: 0.94rem;
            padding: 11px 14px;
            border: 1.5px solid var(--line);
            border-radius: 9px;
            background: var(--cream);
            color: var(--ink);
            outline: none;
            transition: border-color 0.15s ease, box-shadow 0.15s ease;
        }

        .field-with-icon input,
        .field-with-icon select {
            padding-left: 40px;
        }

        .field input[type="text"]:focus,
        .field select:focus {
            border-color: var(--flame-1);
            box-shadow: 0 0 0 3px rgba(224, 57, 63, 0.14);
        }

        .field-hint {
            font-size: 0.72rem;
            color: var(--muted-2);
            margin-top: 6px;
        }

        /* ---------- Footer ---------- */
        .site-footer {
            background: var(--ink-soft);
            border-top: 1px solid rgba(240, 180, 41, 0.14);
            padding: 52px 0 0;
        }

        .footer-inner {
            max-width: 1180px;
            margin: 0 auto;
            padding: 0 24px;
            display: grid;
            grid-template-columns: 1.4fr 1fr 1fr;
            gap: 44px;
        }

        .footer-brand-logo {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 14px;
        }

        .footer-brand-logo .brand-mark {
            width: 34px;
            height: 34px;
            border-radius: 10px;
        }

        .footer-brand-logo .brand-mark svg {
            width: 17px;
            height: 17px;
        }

        .footer-brand-logo span {
            font-family: "Prompt", sans-serif;
            font-weight: 800;
            font-size: 1.1rem;
            color: var(--cream);
        }

        .footer-tagline {
            color: var(--muted);
            font-size: 0.85rem;
            line-height: 1.7;
            max-width: 280px;
            margin: 0 0 18px;
        }

        .footer-social {
            display: flex;
            gap: 10px;
        }

        .social-icon {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: rgba(240, 180, 41, 0.07);
            border: 1px solid rgba(240, 180, 41, 0.22);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.92rem;
            transition: transform 0.15s ease, background 0.15s ease;
        }

        .social-icon:hover {
            background: rgba(240, 180, 41, 0.16);
            transform: translateY(-2px);
        }

        .footer-col h4 {
            font-family: "Prompt", sans-serif;
            color: var(--gold-soft);
            font-size: 0.76rem;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            margin: 0 0 16px;
        }

        .footer-col a {
            display: block;
            color: var(--muted);
            font-size: 0.87rem;
            margin-bottom: 10px;
            transition: color 0.15s ease;
        }

        .footer-col a:hover {
            color: var(--gold-soft);
        }

        .footer-col p {
            color: var(--muted);
            font-size: 0.85rem;
            margin: 0 0 10px;
            line-height: 1.65;
        }

        .footer-bottom {
            max-width: 1180px;
            margin: 40px auto 0;
            padding: 22px 24px;
            border-top: 1px solid rgba(255, 255, 255, 0.07);
            text-align: center;
            font-size: 0.78rem;
            color: var(--muted-2);
            line-height: 1.8;
        }

        .footer-credit {
            font-size: 0.72rem;
            color: #766351;
            margin-top: 2px;
        }

        @media (max-width: 780px) {
            .footer-inner {
                grid-template-columns: 1fr;
                gap: 32px;
            }
        }
    </style>

</head>
<body>
    <header class="site-header">
        <div class="site-header-inner">
            <a href="index.php" class="brand">
                <span class="brand-mark"><svg viewBox="0 0 24 24" fill="#fff8ef" xmlns="http://www.w3.org/2000/svg"><path d="M12.5 1.5c.6 2.4-.7 4-2.1 5.6C8.9 8.8 7.6 10.4 7.6 13a4.5 4.5 0 0 0 9 0c0-1.4-.5-2.5-1.1-3.5.3 2-.8 3.2-1.8 3.2-.9 0-1.6-.7-1.6-1.6 0-1.1 1-2.1 1-3.7 0-2.1-1.1-4.1-2.6-5.9Z"/><path d="M9.6 14.8c-.2 2 1.1 3.7 2.9 3.7 1.5 0 2.7-1 2.9-2.5-.5.6-1.2.9-1.9.9-1.3 0-2.4-1-2.6-2.3-.5.3-1 .7-1.3 1.2Z" fill-opacity=".55"/></svg></span>
                <span class="brand-text">FLAMEMENU<small>Fried &amp; Fast</small></span>
            </a>
            <nav class="site-nav">
                <a href="index.php" class="nav-link">หน้าแรก</a>
                <a href="manage_menu.php" class="nav-link active">จัดการเมนู</a>
            </nav>
        </div>
    </header>

    <main class="page-container">

        <div class="breadcrumb">
            <a href="index.php">หน้าแรก</a>
            <span>/</span>
            <a href="manage_menu.php">จัดการเมนู</a>
            <span>/</span>
            <span class="crumb-current">เพิ่มเมนูใหม่</span>
        </div>

        <section class="form-section">
            <div class="wrap">

                <div class="section-head">
                    <div class="section-eyebrow">+ New Item</div>
                    <h2>เพิ่ม<span class="accent">เมนูใหม่</span></h2>
                    <p class="section-sub">กรอกรายละเอียดเมนูที่ต้องการเพิ่มเข้าสู่ระบบ</p>
                </div>

                <div class="split-layout">

                    <div class="preview-col">
                        <div class="preview-eyebrow">ตัวอย่างเมนู</div>
                        <div class="menu-card preview-card">
                            <div class="menu-card-media">
                                <span class="menu-card-id" id="pvId">M--</span>
                                <img id="pvImage" src="" alt="">
                                <span class="preview-placeholder">🍽️</span>
                            </div>
                            <div class="menu-card-body">
                                <div class="menu-card-type" id="pvType">เมนูทั่วไป</div>
                                <p class="menu-card-name" id="pvName"></p>
                                <div class="menu-card-footer">
                                    <span class="menu-price" id="pvPrice"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-col">
                        <div class="form-card">
                            <p class="form-card-heading">📋 รายละเอียดเมนู</p>
                            <form action="action/insert_menu.php" method="post">

                                <div class="field field-with-icon">
                                    <label for="menu_id">รหัสเมนู</label>
                                    <span class="field-icon">#</span>
                                    <input type="text" id="menu_id" name="menu_id" placeholder="เช่น M06" oninput="updatePreview()">
                                </div>

                                <div class="field field-with-icon">
                                    <label for="menu_name">ชื่อเมนู</label>
                                    <span class="field-icon">🍗</span>
                                    <input type="text" id="menu_name" name="menu_name" placeholder="ชื่อเมนูอาหาร" oninput="updatePreview()">
                                </div>

                                <div class="field field-with-icon">
                                    <label for="menu_price">ราคา</label>
                                    <span class="field-icon">฿</span>
                                    <input type="text" id="menu_price" name="menu_price" placeholder="0.00" oninput="updatePreview()">
                                </div>

                                <div class="field field-with-icon">
                                    <label for="menu_image">ภาพ (ลิงก์รูปภาพ)</label>
                                    <span class="field-icon">🖼️</span>
                                    <input type="text" id="menu_image" name="menu_image" placeholder="https://..." oninput="updatePreview()">
                                    <div class="field-hint">วางลิงก์ URL ของรูปภาพเมนู</div>
                                </div>

                                <?php
                                    include "action/connect.php";
                                    $sql = "SELECT * FROM menu_types";
                                    $result = mysqli_query($con, $sql);
                                ?>

                                <div class="field field-with-icon">
                                    <label for="type_id">ประเภทเมนู</label>
                                    <span class="field-icon">🏷️</span>
                                    <select id="type_id" name="type_id" onchange="updatePreview()">
                                        <?php foreach($result as $type){ ?>
                                            <option value="<?= $type["type_id"] ?>" data-name="<?= $type["type_name"] ?>"> <?= $type["type_name"] ?> </option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-flame btn-block">บันทึกเมนู</button>

                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main>

    <footer class="site-footer">
        <div class="footer-inner">
            <div class="footer-col">
                <div class="footer-brand-logo">
                    <span class="brand-mark"><svg viewBox="0 0 24 24" fill="#fff8ef" xmlns="http://www.w3.org/2000/svg"><path d="M12.5 1.5c.6 2.4-.7 4-2.1 5.6C8.9 8.8 7.6 10.4 7.6 13a4.5 4.5 0 0 0 9 0c0-1.4-.5-2.5-1.1-3.5.3 2-.8 3.2-1.8 3.2-.9 0-1.6-.7-1.6-1.6 0-1.1 1-2.1 1-3.7 0-2.1-1.1-4.1-2.6-5.9Z"/><path d="M9.6 14.8c-.2 2 1.1 3.7 2.9 3.7 1.5 0 2.7-1 2.9-2.5-.5.6-1.2.9-1.9.9-1.3 0-2.4-1-2.6-2.3-.5.3-1 .7-1.3 1.2Z" fill-opacity=".55"/></svg></span>
                    <span>FLAMEMENU</span>
                </div>
                <p class="footer-tagline">เมนูจานเด็ดที่คัดสรรมาเพื่อคุณ อร่อยทุกคำ อิ่มทุกมื้อ ส่งตรงถึงโต๊ะคุณ</p>
                <div class="footer-social">
                    <a href="#" class="social-icon" aria-label="Facebook">📘</a>
                    <a href="#" class="social-icon" aria-label="Instagram">📷</a>
                    <a href="#" class="social-icon" aria-label="Line">💬</a>
                </div>
            </div>
            <div class="footer-col">
                <h4>ลิงก์ด่วน</h4>
                <a href="index.php">หน้าแรก</a>
                <a href="manage_menu.php">จัดการเมนู</a>
                <a href="add_menu.php">เพิ่มเมนูใหม่</a>
            </div>
            <div class="footer-col">
                <h4>ติดต่อเรา</h4>
                <p>📍 123 ถนนสายอร่อย เขตอิ่มใจ กรุงเทพฯ</p>
                <p>📞 08X-XXX-XXXX</p>
                <p>🕐 เปิดทุกวัน 10:00 - 22:00 น.</p>
            </div>
        </div>
        <div class="footer-bottom">
            <div>&copy; <?= date("Y") ?> FlameMenu. All rights reserved.</div>
            <div class="footer-credit">จัดทำโดย ธนบูรณ์ ธนจริวัฒน์ &nbsp;|&nbsp; BIT.2/4 เลขที่ 25</div>
        </div>
    </footer>

<script>
function updatePreview() {
    const id = document.getElementById('menu_id').value.trim();
    const name = document.getElementById('menu_name').value.trim();
    const price = document.getElementById('menu_price').value.trim();
    const image = document.getElementById('menu_image').value.trim();
    const typeSelect = document.getElementById('type_id');
    const typeName = typeSelect.options[typeSelect.selectedIndex] ? typeSelect.options[typeSelect.selectedIndex].dataset.name : 'เมนูทั่วไป';

    document.getElementById('pvId').textContent = id || 'M--';
    document.getElementById('pvName').textContent = name;
    document.getElementById('pvPrice').textContent = price;
    document.getElementById('pvType').textContent = typeName || 'เมนูทั่วไป';
    document.getElementById('pvImage').src = image;
}
updatePreview();
</script>

</body>
</html>