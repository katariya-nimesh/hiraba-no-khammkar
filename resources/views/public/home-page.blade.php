<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Heeraba No Khamkar Scholarship | Empowering Future Education</title>
    <link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Google+Sans:ital,opsz,wght@0,17..18,400..700;1,17..18,400..700&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- <link rel="stylesheet" href="css/style.css"> -->
     <style>
        /* Theme: "Modern Service" - Premium, Trustworthy, Culturally Respectful
   Palette: Deep Navy (#0a2642), Soft Saffron (#FF9933), Gold (#C5A000)
   Font: 'Inter' (Body), 'Noto Sans Gujarati' (Local)
*/

@import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Noto+Sans+Gujarati:wght@400;500;600;700&display=swap');

:root {
    --primary: #0a2642;       /* Deep Navy - Trust */
    --primary-light: #153d66; 
    --saffron: #FF9933;       /* Saffron - Culture/Energy */
    --saffron-light: #fff0e0;
    --gold: #C5A000;          /* Gold - Premium Accent */
    --gold-accent: #FFD700;   
    --text-main: #1f2937;
    --text-muted: #6b7280;
    --bg-light: #f6f7f8;
    --bg-white: #ffffff;
    --danger: #dc2626;
    
    --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
    --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
    --shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    
    --container-width: 1350px;
    --section-spacing: 5rem;
    --section-spacing-mobile: 3rem;
}

* { box-sizing: border-box; margin: 0; padding: 0; }
html { scroll-behavior: smooth; }

body {
    font-family: 'Google Sans', 'Inter', sans-serif;
    color: var(--text-main);
    background-color: var(--bg-light);
    line-height: 1.6;
    overflow-x: hidden;
    font-size: 16px;
}

/* Typography Utilities */
h1, h2, h3, h4, h5, h6 { line-height: 1.2; margin-bottom: 0.5em; }
p { margin-bottom: 1rem; max-width: 65ch; } 

.gujarati { font-family: 'Google Sans', sans-serif; }
.text-primary { color: var(--primary); }
.text-saffron { color: var(--saffron); }
.text-gold { color: var(--gold); }
.font-bold { font-weight: 700; }
.uppercase { text-transform: uppercase; }
.text-muted { color: var(--text-muted); }
.bg-white { background-color: white; }
.bg-light { background-color: var(--bg-light); }

/* Buttons */
.btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    padding: 12px 28px;
    border-radius: 50px;
    font-weight: 600;
    transition: all 0.3s ease;
    cursor: pointer;
    border: none;
    text-decoration: none;
    font-size: 0.95rem;
    white-space: nowrap;
}
.btn-primary {
    background: linear-gradient(135deg, var(--saffron), #f97316);
    color: white;
    box-shadow: 0 4px 6px rgba(255, 153, 51, 0.25);
}
.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 15px rgba(255, 153, 51, 0.4);
    color: white;
}
.btn-secondary {
    background: white;
    color: var(--primary);
    border: 1px solid rgba(10, 38, 66, 0.1);
}
.btn-secondary:hover {
    background: var(--bg-light);
    border-color: var(--primary);
}

/* --- Layout Components --- */

/* Container Utility */
.container {
    max-width: var(--container-width);
    margin: 0 auto;
    padding: 0 1.5rem;
    width: 100%;
}

/* 1. Scrolling Marquee */
.top-bar {
    background: linear-gradient(to right, #991b1b, var(--primary));
    color: white;
    padding: 8px 0;
    font-size: 0.85rem;
    position: relative; 
    z-index: 1100;
    overflow: hidden;
    white-space: nowrap;
}
.marquee-wrapper {
    display: inline-block;
    padding-left: 100%;
    animation: marquee 30s linear infinite;
}
@keyframes marquee {
    0% { transform: translate(0, 0); }
    100% { transform: translate(-100%, 0); }
}

/* 2. Navbar (Floating Pill Design) */
.navbar {
    position: sticky;
    top: 15px;
    z-index: 1000;
    padding: 0 1rem;
    margin-top: 15px; 
    width: 100%;
    height: auto; 
    display: flex;
    justify-content: center; 
    pointer-events: none; 
}

.nav-container {
    max-width: var(--container-width);
    width: 95%; 
    margin: 0 auto;
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);
    padding: 0.75rem 2rem; 
    border-radius: 100px; 
    box-shadow: 0 8px 20px rgba(0,0,0,0.08); 
    display: flex;
    justify-content: space-between;
    align-items: center;
    border: 1px solid rgba(255,255,255,0.8);
    pointer-events: auto; 
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}
.nav-container.scrolled {
    background: rgba(255, 255, 255, 0.98);
    padding: 0.5rem 2rem;
    box-shadow: 0 4px 6px rgba(0,0,0,0.05);
}
.logo {
    display: flex;
    align-items: center;
    align-items: center;
    gap: 12px;
}
.logo-img {
    height: 65px; /* Increased size as requested */
    width: auto;
    object-fit: contain;
    display: block;
    transition: height 0.3s ease; /* Smooth resize on scroll */
}
/* Scrolled state for Logo */
.nav-container.scrolled .logo-img {
    height: 60px;
}
/* Removed old .logo-icon styles */
.nav-links {
    display: flex;
    gap: 2.5rem; 
}
.nav-links a {
    color: #4b5563;
    font-weight: 500;
    font-size: 0.95rem;
    transition: all 0.3s;
    text-decoration: none;
    position: relative;
}
.nav-links a:hover { 
    color: var(--primary); 
}
.nav-links a::after {
    content: '';
    position: absolute;
    width: 0;
    height: 2px;
    bottom: -4px;
    left: 50%;
    background-color: var(--saffron);
    transition: all 0.3s ease;
    transform: translateX(-50%);
}
.nav-links a:hover::after { width: 100%; }

/* Nav Specific Button */
.btn-nav {
    background: var(--primary);
    color: white;
    padding: 10px 24px;
    border-radius: 50px;
    font-weight: 600;
    font-size: 0.9rem;
    box-shadow: 0 4px 10px rgba(10, 38, 66, 0.3);
}
.btn-nav:hover {
    background: #0f355a;
    transform: translateY(-2px);
    box-shadow: 0 6px 15px rgba(10, 38, 66, 0.4);
    color: white;
}

.mobile-menu-btn {
    display: none;
    font-size: 1.5rem;
    color: var(--primary);
    cursor: pointer;
    padding: 0.5rem;
}
.mobile-dropdown {
    display: none;
    position: absolute;
    top: 110%; /* Just below the navbar */
    left: 50%;
    transform: translateX(-50%);
    width: 90%;
    max-width: 400px;
    background: white;
    border-radius: 16px;
    box-shadow: var(--shadow-xl);
    padding: 1.5rem;
    flex-direction: column;
    gap: 1rem;
    z-index: 1001;
    border: 1px solid rgba(0,0,0,0.05);
    pointer-events: auto; /* Ensure clicks work */
}
.mobile-dropdown a {
    text-decoration: none;
    color: var(--text-main);
    font-weight: 600;
    padding: 0.8rem;
    border-radius: 8px;
    display: block;
    background: var(--bg-light);
    text-align: center;
}
.mobile-dropdown a:hover {
    background: var(--saffron-light);
    color: var(--primary);
}

/* 3. Hero Section */
.hero {
    position: relative;
    min-height: 80vh; 
    display: flex;
    align-items: center;
    padding-top: 140px; 
    padding-bottom: 4rem;
    overflow: hidden;
    margin-top: -110px; 
    z-index: 1;
}
/* Hero Slideshow */
.hero-bg-slider {
    position: absolute;
    inset: 0;
    width: 100%;
    height: 100%;
    z-index: -1;
    overflow: hidden;
}

.hero-slide {
    position: absolute;
    inset: 0;
    width: 100%;
    height: 100%;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    opacity: 0;
    transition: opacity 1.5s ease-in-out;
    background-attachment: fixed; /* Parallax effect */
}

.hero-slide.active {
    opacity: 1;
}
.hero-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(to top, rgba(246,247,248,1) 0%, rgba(246,247,248,0.4) 30%, rgba(10,38,66,0.5) 100%);
    z-index: -1;
}

.hero-container {
    max-width: var(--container-width);
    margin: 0 auto;
    padding: 0 1.5rem;
    display: grid;
    grid-template-columns: 2fr 1fr;
    gap: 2rem;
    align-items: center;
    width: 100%;
}

.glass-card {
    background: rgba(255, 255, 255, 0.9);
    backdrop-filter: blur(16px);
    -webkit-backdrop-filter: blur(16px);
    padding: 3rem; 
    border-radius: 24px;
    box-shadow: var(--shadow-xl);
    border-left: 6px solid var(--saffron);
    animation: fadeInUp 0.8s ease-out;
    max-width: 100%; 
}
.badge-pill {
    background: rgba(10,38,66,0.08); 
    color: var(--primary); 
    padding: 6px 16px; 
    border-radius: 20px; 
    font-size: 0.75rem; 
    font-weight: 700; 
    text-transform: uppercase; 
    letter-spacing: 1px;
    margin-bottom: 1.5rem;
    display: inline-block;
}
.hero-title {
    font-size: 3.25rem; 
    line-height: 1.1; 
    margin: 0 0 1.25rem;
    letter-spacing: -0.02em;
}
.hero-subtitle {
    color: #4b5563; 
    font-size: 1.1rem; 
    margin-bottom: 2.5rem; 
    line-height: 1.6;
}
.hero-btns {
    display: flex; 
    gap: 1rem; 
    flex-wrap: wrap;
}
.d-block { display: block; }

.founder-badge-wrapper {
    display: flex;
    justify-content: flex-end;
    align-items: flex-end;
    height: 100%;
    padding-right: 2rem;
}
.founder-badge {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(8px);
    padding: 1.5rem;
    border-radius: 20px;
    box-shadow: var(--shadow-xl);
    max-width: 300px;
    transform: rotate(3deg);
    transition: transform 0.4s ease;
}
.founder-badge:hover { transform: rotate(0deg) scale(1.02); }
.founder-header {
    display: flex; align-items: center; gap: 1rem; margin-bottom: 1rem;
}
.founder-img {
    width: 60px; height: 60px;
    border-radius: 50%;
    border: 3px solid var(--gold);
    object-fit: cover;
}
.founder-quote {
    font-size: 0.85rem; 
    color: #555; 
    font-style: italic; 
    border-left: 3px solid var(--saffron); 
    padding-left: 12px;
    line-height: 1.5;
}

/* 4. Impact Section */
.impact-section {
    padding: var(--section-spacing) 0;
    background: linear-gradient(135deg, var(--saffron-light), #fff);
    position: relative;
    overflow: hidden;
    margin-top: 0;
}
.blob {
    position: absolute;
    border-radius: 50%;
    filter: blur(80px);
    z-index: 0;
    opacity: 0.6;
}
.blob-1 { top: -10%; right: -5%; width: 300px; height: 300px; background: rgba(255, 153, 51, 0.15); }
.blob-2 { bottom: -10%; left: -5%; width: 400px; height: 400px; background: rgba(10, 38, 66, 0.08); }

.impact-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 2rem;
    position: relative;
    z-index: 1;
    max-width: var(--container-width);
    margin: 0 auto;
    text-align: center;
    padding: 0 1.5rem;
}
.impact-item {
    padding: 1.5rem;
    transition: transform 0.3s;
    background: rgba(255,255,255,0.5);
    border-radius: 16px;
    border: 1px solid rgba(255,255,255,0.5);
}
.impact-item:hover { transform: translateY(-5px); background: white; box-shadow: var(--shadow-md); }
.counter { font-size: 2.75rem; font-weight: 800; color: var(--primary); margin-bottom: 0.5rem; line-height: 1; }
.counter-label { font-size: 0.85rem; font-weight: 600; color: var(--text-muted); text-transform: uppercase; letter-spacing: 1px; }

/* 4.5. Heeraba Section */
.heeraba-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 4rem;
    align-items: center;
}
.heeraba-content {
    animation: fadeInLeft 0.8s ease-out;
}
.signature-box {
    margin-top: 2rem;
    padding: 1.5rem;
    border-left: 4px solid var(--gold);
    background: var(--bg-light);
    border-radius: 0 16px 16px 0;
}
.heeraba-images {
    position: relative;
    height: 500px;
    display: flex;
    justify-content: center;
    align-items: center;
}
.img-card {
    position: absolute;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: var(--shadow-xl);
    border: 4px solid white;
    transition: transform 0.4s ease;
}
.img-card:hover { transform: scale(1.02); z-index: 10; }
.img-card img {
    display: block;
    width: 100%;
    height: 100%;
    object-fit: cover;
}
.img-card-1 {
    width: 380px;
    height: 350px; /* Portrait */
    top: 20px;
    left: 20px;
    z-index: 2;
}
.img-card-2 {
    width: 320px;
    height: 240px; /* Landscape */
    bottom: 40px;
    right: 20px;
    z-index: 3;
}
.decorative-circle {
    position: absolute;
    width: 400px;
    height: 400px;
    border-radius: 50%;
    background: linear-gradient(135deg, rgba(255, 153, 51, 0.1), rgba(197, 160, 0, 0.05));
    z-index: 1;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}

/* 5. Generic Section Styles */
.section { 
    padding: var(--section-spacing) 0;
    width: 100%;
}
.section-header { text-align: center; margin-bottom: 4rem; }
.section-title { 
    font-size: 2.5rem; 
    color: var(--primary); 
    margin-bottom: 1rem; 
    font-weight: 700; 
    letter-spacing: -0.02em; 
}
.section-subtitle { 
    color: var(--text-muted); 
    font-size: 1.1rem; 
    max-width: 600px; 
    margin: 0 auto; 
    line-height: 1.6; 
    font-weight: 400;
}
.text-saffron-header { color: var(--saffron); font-size: 0.85rem; letter-spacing: 2px; margin-bottom: 12px; font-weight: 700; }

.cards-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
    gap: 2.5rem;
}
.benefit-card {
    background: white;
    padding: 3rem 2rem;
    border-radius: 20px;
    box-shadow: var(--shadow-md);
    transition: all 0.3s ease;
    border-top: 4px solid transparent;
    display: flex;
    flex-direction: column;
    align-items: flex-start;
}
.benefit-card:hover {
    transform: translateY(-8px);
    box-shadow: var(--shadow-xl);
    border-top-color: var(--saffron);
}
.card-icon {
    width: 64px; height: 64px;
    background: var(--saffron-light);
    color: var(--saffron);
    border-radius: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.8rem;
    margin-bottom: 1.5rem;
    transition: background 0.3s, color 0.3s;
}
.benefit-card:hover .card-icon { background: var(--saffron); color: white; }
.card-title { font-size: 1.35rem; font-weight: 700; color: var(--primary); margin-bottom: 1rem; }
.verified-badge {
    display: inline-block; background: #ecfdf5; color: #047857; 
    padding: 6px 14px; border-radius: 20px; font-size: 0.75rem; 
    font-weight: 700; margin-top: auto;
}

/* 6. Timeline */
.timeline-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 2rem;
    position: relative;
    padding-top: 2rem;
}
.timeline-step {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    position: relative;
    z-index: 2;
    padding: 0 1rem;
}
.step-number {
    width: 48px; height: 48px;
    background: var(--primary);
    color: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
    font-size: 1.1rem;
    margin-bottom: 1.25rem;
    box-shadow: 0 0 0 6px white;
    transition: transform 0.3s;
}
.timeline-line {
    position: absolute;
    top: 54px; /* Align with center of numbers */
    left: 12.5%; /* Start from center of first item */
    width: 75%; /* Combine length */
    height: 3px;
    background: #e5e7eb;
    z-index: 1;
}
.pulse { background: var(--saffron); transform: scale(1.1); animation: pulse 2s infinite; }
@keyframes pulse {
    0% { box-shadow: 0 0 0 0 rgba(255, 153, 51, 0.6); }
    70% { box-shadow: 0 0 0 12px rgba(255, 153, 51, 0); }
    100% { box-shadow: 0 0 0 0 rgba(255, 153, 51, 0); }
}
.number-gray { background: #e5e7eb; color: #9ca3af; }
.status-badge {
    background: rgba(255, 153, 51, 0.1); color: var(--saffron); 
    padding: 6px 16px; border-radius: 20px; font-weight: 600; font-size: 0.8rem;
    display: inline-block;
}
.text-desc { font-size: 0.9rem; color: #666; margin-top: 5px; line-height: 1.4; }

/* 7. Checklist & Warning */
.checklist-container {
    display: grid;
    grid-template-columns: 2fr 1.25fr;
    gap: 4rem;
    align-items: start;
}
.doc-item {
    display: flex;
    align-items: flex-start;
    gap: 1.25rem;
    background: white;
    padding: 1.75rem;
    border-radius: 16px;
    box-shadow: var(--shadow-sm);
    margin-bottom: 1.25rem;
    transition: transform 0.2s;
}
.doc-item:hover { transform: translateX(5px); }
.icon-lg { font-size: 1.75rem; color: var(--saffron); flex-shrink: 0; }

.warning-box {
    background: linear-gradient(145deg, #fff, #fff9f0); /* Softest saffron tint */
    border: 1px solid rgba(10, 38, 66, 0.08); /* Subtle Navy Border */
    border-radius: 24px;
    padding: 2.5rem;
    box-shadow: 0 10px 30px -5px rgba(255, 153, 51, 0.15); /* Soft Saffron Glow */
    position: sticky; /* Make it sticky */
    top: 150px; /* Clear the navbar */
    z-index: 5;
    overflow: hidden;
}
.warning-box::before {
    content: '';
    position: absolute;
    top: 0; left: 0; right: 0; height: 4px;
    background: linear-gradient(90deg, var(--saffron), var(--gold));
}
.warning-header {
    display: flex;
    align-items: center;
    gap: 1rem;
    margin-bottom: 1.5rem;
}
.warning-list {
    list-style: none;
    padding: 0;
}
.warning-list li {
    display: flex;
    gap: 12px;
    margin-bottom: 1rem;
    font-size: 0.95rem;
    color: #4b5563;
}
.warning-list li span:first-child {
    font-size: 1.2rem;
    color: var(--saffron);
    line-height: 1;
}
.community-img-box {
    margin-top: 2.5rem; background: white; padding: 1rem; border-radius: 16px; text-align: center;
    box-shadow: var(--shadow-sm);
}
.community-img-box img {
    width: 100%; height: 140px; object-fit: cover; border-radius: 10px; margin-bottom: 10px; opacity: 0.9;
}

/* 8. Gallery Masonry */
.masonry-grid {
    column-count: 3;
    column-gap: 1.5rem;
    margin-bottom: 3rem;
}
.masonry-item {
    break-inside: avoid;
    margin-bottom: 1.5rem;
    border-radius: 16px;
    overflow: hidden;
    position: relative;
    box-shadow: var(--shadow-md);
    cursor: pointer;
}
.masonry-item img {
    width: 100%;
    display: block;
    transition: transform 0.6s ease;
}
.masonry-item img:hover { transform: scale(1.05); }
.hidden-gallery-item { display: none; }
#load-more-btn { margin-top: 2rem; }

/* 9. Footer (Refined) */
.main-footer {
    background: var(--primary);
    color: white;
    padding: 6rem 0 2rem;
    border-top-left-radius: 60px;
    border-top-right-radius: 60px;
    margin-top: 6rem;
    position: relative;
    overflow: hidden;
}

/* Decorative Top Border */
.main-footer::before {
    content: '';
    position: absolute;
    top: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 60%;
    height: 4px;
    background: linear-gradient(90deg, transparent, var(--saffron), transparent);
    opacity: 0.8;
}

.footer-grid {
    display: grid;
    grid-template-columns: 1.4fr 1fr 1.1fr 1.2fr;
    gap: 3.5rem;
    margin-bottom: 4rem;
}

/* Column 1: Brand */
.footer-brand { 
    display: flex; 
    align-items: center; 
    gap: 14px; 
    margin-bottom: 1.5rem; 
}
.footer-icon {
    width: 48px; height: 48px; 
    background: white; 
    border-radius: 50%; 
    display: flex; 
    align-items: center; 
    justify-content: center; 
    color: var(--primary); 
    font-size: 1.4rem;
    box-shadow: 0 4px 10px rgba(0,0,0,0.2);
}
.footer-brand h4 {
    font-family: 'Noto Sans Gujarati', sans-serif;
    font-weight: 700;
    font-size: 1.5rem;
    letter-spacing: 0.5px;
    line-height: 1.2;
}
.footer-desc { 
    color: #cbd5e1; /* Lighter for reliability on dark bg */
    font-size: 0.95rem; 
    margin-bottom: 2rem; 
    line-height: 1.7; 
    max-width: 320px; 
}
.footer-cin { 
    color: #64748b; 
    text-transform: uppercase; 
    font-size: 0.75rem; 
    letter-spacing: 1.5px;
    font-weight: 600;
}

/* Column Titles */
.footer-title { 
    color: var(--gold); 
    margin-bottom: 2rem; 
    font-weight: 700; 
    letter-spacing: 0.5px; 
    font-size: 1.2rem; 
    position: relative;
    display: inline-block;
}
.footer-title::after {
    content: '';
    position: absolute;
    left: 0;
    bottom: -8px;
    width: 40px;
    height: 3px;
    background: var(--saffron);
    border-radius: 2px;
}

/* Links */
.footer-links-list {
    list-style: none;
    padding: 0;
}
.footer-links-list li {
    margin-bottom: 12px;
}
.footer-links-list a {
    color: #e2e8f0;
    text-decoration: none;
    transition: all 0.2s;
    font-size: 0.95rem;
    display: flex;
    align-items: center;
    gap: 8px;
}
.footer-links-list a:hover {
    color: var(--saffron);
    transform: translateX(5px);
}
.footer-links-list a::before {
    content: '›';
    color: var(--saffron);
    font-weight: bold;
    font-size: 1.2rem;
    line-height: 0;
    position: relative;
    top: -1px;
}

/* Contact Items */
.contact-item { 
    margin-bottom: 1.25rem; 
    display: flex; 
    gap: 14px; 
    color: #e2e8f0; 
    align-items: flex-start; 
}
.contact-item i { 
    margin-top: 4px; 
    color: var(--saffron);
    font-size: 1.1rem;
}
.contact-item a { 
    color: inherit; 
    text-decoration: none; 
    transition: color 0.2s; 
    font-weight: 500;
}
.contact-item a:hover { color: var(--gold); }

/* Map */
.map-container {
    height: 100%;
    min-height: 220px;
    border-radius: 20px;
    overflow: hidden;
    border: 4px solid rgba(255,255,255,0.1);
    background: #1e293b;
}
.map-frame {
    width: 100%;
    height: 100%;
    border: 0;
    filter: grayscale(0.2) contrast(1.1);
    transition: filter 0.3s;
}
.map-frame:hover { filter: grayscale(0) contrast(1); }

/* Footer Bottom */
.footer-bottom {
    border-top: 1px solid rgba(255,255,255,0.1); 
    padding-top: 2rem; 
    display: flex; 
    justify-content: space-between; 
    align-items: center;
    font-size: 0.9rem; 
    color: #94a3b8;
}
.dev-link { color: #e2e8f0; text-decoration: none; transition: color 0.2s; }
.dev-link:hover { color: var(--saffron); }
.separator { margin: 0 10px; opacity: 0.3; }
.social-links {
    display: flex;
    gap: 1rem;
}
.social-btn {
    width: 36px; height: 36px;
    background: rgba(255,255,255,0.05);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    text-decoration: none;
    transition: all 0.3s;
}
.social-btn:hover {
    background: var(--saffron);
    color: white;
    transform: translateY(-3px);
}

/* Lightbox */
.lightbox {
    position: fixed; top: 0; left: 0; width: 100%; height: 100%;
    background: rgba(0,0,0,0.95);
    display: none; align-items: center; justify-content: center; z-index: 2000;
}
.lightbox img { max-width: 90%; max-height: 90vh; border-radius: 4px; box-shadow: 0 0 30px rgba(0,0,0,0.8); }
.close-lb {
    position: absolute; top: 20px; right: 40px; color: white; font-size: 3.5rem; cursor: pointer; opacity: 0.8;
}
.close-lb:hover { opacity: 1; }

/* ---------------------------------------------------- */
/* RESPONSIVE QUERIES                  */
/* ---------------------------------------------------- */

@media (max-width: 1200px) {
    :root { --container-width: 960px; }
    .hero-title { font-size: 3rem; }
}

@media (max-width: 1024px) {
    :root { --container-width: 90%; }
    
    .hero-container {
        grid-template-columns: 1fr;
        text-align: center;
        gap: 3rem;
        padding-top: 2rem; 
    }
    .hero { min-height: auto; padding-top: 140px; }
    
    /* Fix background fixed support on some mobile devices */
    .hero-bg { background-attachment: scroll; } 
    
    .glass-card {
        margin: 0 auto;
        width: 100%;
        max-width: 700px;
        padding: 2.5rem;
    }
    
    .founder-badge-wrapper {
        justify-content: center;
        padding-right: 0;
        margin-top: 1rem;
    }
    .founder-badge { transform: rotate(0deg); }
    
    .hero-btns { justify-content: center; }
    
    .impact-grid { grid-template-columns: repeat(2, 1fr); gap: 2rem; }
    
    .timeline-grid { grid-template-columns: repeat(2, 1fr); gap: 2rem; }
    .timeline-step { margin-bottom: 2rem; }
    .timeline-line { display: none; }
    
    .checklist-container { grid-template-columns: 1fr; gap: 3rem; }
    .warning-box { position: static; max-width: 700px; margin: 0 auto; }
    
    .footer-grid { grid-template-columns: repeat(2, 1fr); gap: 3rem; }
    
    .map-container { min-height: 250px; }

    /* Heeraba Tablet */
    .heeraba-grid { grid-template-columns: 1fr; gap: 3rem; text-align: center; }
    .signature-box { text-align: left; display: inline-block; }
    .heeraba-images { height: 400px; }
}

@media (max-width: 768px) {
    :root { 
        --section-spacing: 4rem; 
        --section-spacing-mobile: 3rem;
    }
    
    /* 2. Navbar Mobile Adjustments */
    .nav-links, .check-btn-nav { display: none; } /* Hide desktop links */
    .mobile-menu-btn { display: block; } /* Show hamburger */
    .nav-container { padding: 0.75rem 1.5rem; justify-content: space-between; }
    
    .logo-img { height: 60px; } /* Smaller on mobile by default */
    .nav-container.scrolled .logo-img { height: 50px; }
    
    /* Hero Adjustments */
    .hero-title { font-size: 2.5rem; line-height: 1.2; }
    .hero-subtitle { font-size: 1rem; }
    
    /* Impact & Stats */
    .impact-grid { gap: 1.5rem; }
    .counter { font-size: 2.25rem; }
    
    .section-title { font-size: 2rem; }
    
    /* Timeline Vertical Stack */
    /* Timeline Vertical Stack (Refined Grid) */
    .timeline-grid { grid-template-columns: 1fr; gap: 0; }
    
    .timeline-step { 
        display: grid;
        grid-template-columns: 3rem 1fr;
        grid-template-rows: auto auto auto;
        gap: 0.25rem 1.5rem;
        align-items: start;
        text-align: left;
        padding-bottom: 2.5rem; /* Space between steps */
        position: relative;
    }
    
    .step-number { 
        grid-row: 1 / span 3; /* Stick to left */
        margin: 0;
        width: 3rem; 
        height: 3rem; 
        font-size: 1.1rem;
        z-index: 2;
    }
    
    .timeline-step h4 { margin-bottom: 0.25rem; font-size: 1.1rem; line-height: 1.3; }
    .timeline-step p { margin-bottom: 0; }
    
    /* Connector Line */
    .timeline-step::before {
        content: '';
        position: absolute;
        left: 1.5rem; /* Center of 3rem circle */
        transform: translateX(-50%);
        top: 3rem; /* Start right below circle */
        bottom: 0; /* All the way down */
        width: 2px;
        background: #e5e7eb;
        z-index: 1;
    }
    /* Hide line for last item */
    .timeline-step:last-child::before { display: none; }
    .timeline-step:last-child { padding-bottom: 0; }
    
    /* Cards & Layout */
    .cards-grid { grid-template-columns: 1fr; max-width: 500px; margin: 0 auto; }
    
    .checklist-container { gap: 2.5rem; }
    
    .masonry-grid { column-count: 2; column-gap: 1rem; }
    
    /* Footer Stack */
    .footer-grid { grid-template-columns: 1fr; text-align: center; gap: 2.5rem; }
    .footer-brand { justify-content: center; }
    .footer-desc { margin: 0 auto 2rem; }
    .footer-title::after { left: 50%; transform: translateX(-50%); }
    .footer-links-list a { justify-content: center; }
    .contact-item { justify-content: center; }
    
    .footer-bottom { 
        flex-direction: column; 
        gap: 1.5rem; 
        text-align: center; 
        padding-top: 1.5rem;
    }
    .separator { display: none; }
}

@media (max-width: 480px) {
    .hero-title { font-size: 2rem; }
    .glass-card { padding: 2rem 1.25rem; }
    
    .impact-grid { grid-template-columns: 1fr; }
    
    .section-header { margin-bottom: 2.5rem; }
    
    /* Gallery Single Column on very small screens */
    .masonry-grid { column-count: 1; }
    
    /* Adjust Timeline alignment for small screens */
    .timeline-step { gap: 0.25rem 1rem; }
    /* Line automatically centers due to transform/left calc above */
    
    .doc-item { flex-direction: column; align-items: center; text-align: center; }
    
    .warning-box { padding: 1.5rem; }
    .warning-list li { flex-direction: column; align-items: center; text-align: center; gap: 0.5rem; }
}

/* Force Fix for Heeraba Section on Mobile */
@media (max-width: 768px) {
    .heeraba-images { 
        height: auto !important; 
        max-width: 100% !important; 
        display: flex !important; 
        flex-direction: column !important; 
        gap: 1.5rem !important; 
        margin-top: 2rem !important;
        justify-content: center !important;
        align-items: center !important;
    }
    .img-card { 
        position: relative !important; 
        width: 100% !important; 
        max-width: 320px !important; 
        height: auto !important; 
        top: auto !important; 
        left: auto !important; 
        right: auto !important; 
        bottom: auto !important;
        transform: none !important; 
        margin: 0 auto !important;
    }
    .img-card-1 { 
        max-width: 280px !important;
        order: 1;
    }
    .img-card-2 { 
        max-width: 300px !important;
        order: 2;
    }
    
    /* Remove z-index shift */
    .img-card:hover { transform: scale(1.02) !important; z-index: 1 !important; } 
    
    .decorative-circle { 
        width: 250px !important; 
        height: 250px !important; 
        top: 50% !important; 
        left: 50% !important; 
        transform: translate(-50%, -50%) !important; 
    }
}

/* Footer Logo Refinement */
.footer-logo-img {
    height: 110px;
    background: white;
    padding: 7px;
    border-radius: 12px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    object-fit: contain;
}

/* Lightbox Navigation */
.prev, .next {
    cursor: pointer;
    position: absolute;
    top: 50%;
    width: auto;
    padding: 16px;
    margin-top: -50px;
    color: white;
    font-weight: bold;
    font-size: 3rem;
    transition: 0.3s ease;
    border-radius: 0 3px 3px 0;
    user-select: none;
    z-index: 1100;
}

.next {
    right: 0;
    border-radius: 3px 0 0 3px;
}

.prev {
    left: 0;
    border-radius: 3px 0 0 3px;
}

.prev:hover, .next:hover {
    background-color: rgba(0, 0, 0, 0.8);
}
     </style>
</head>

<body>

    <div class="top-bar">
        <div class="marquee-wrapper">
            <span><i class="fas fa-bullhorn"></i> Application Closing on 18/02/2026 – Apply online at
                hirabanokhamkar.com
                  •   ⚠️ Important: Bank Account Name must match Student
                School Record   •   <i class="fas fa-bullhorn"></i> Last Date:
                18/02/2026</span>
        </div>
    </div>

    <nav class="navbar">
        <div class="nav-container">
            <div class="logo">
                <img src="{{ asset('img/logo.png') }}" alt="Heeraba No Khamkar Foundation" class="logo-img">
            </div>

            <div class="mobile-menu-btn">
                <i class="fas fa-bars"></i>
            </div>

            <div class="nav-links">
                <a href="#about">Impact</a>
                <a href="#benefits">Scholarship</a>

                <a href="#gallery">Gallery</a>
                <a href="#contact">Contact</a>
            </div>
            <a href="https://hirabanokhamkar.com/application" class="btn btn-nav check-btn-nav">Apply Now <i
                    class="fas fa-arrow-right"></i></a>
        </div>

        <div class="mobile-dropdown">
            <a href="#about">Impact</a>
            <a href="#benefits">Scholarship</a>

            <a href="#gallery">Gallery</a>
            <a href="#contact">Contact</a>
            <a href="https://hirabanokhamkar.com/application" style="color: var(--saffron); font-weight: 700;">Apply
                Now</a>
        </div>
    </nav>

    <header class="hero" id="home">
        <div class="hero-bg-slider">
            <!-- Slideshow Backgrounds -->
            <div class="hero-slide active" style="background-image: url('{{ asset('img/banner.jpg') }}');"></div>
<div class="hero-slide" style="background-image: url('{{ asset('img/gallery-1.jpg') }}');"></div>
<div class="hero-slide" style="background-image: url('{{ asset('img/gallery-5.jpg') }}');"></div>
<div class="hero-slide" style="background-image: url('{{ asset('img/gallery-12.jpg') }}');"></div>
        </div>
        <div class="hero-overlay"></div>

        <div class="hero-container">
            <div class="glass-card">
                <span class="badge-pill">Piyushbhai Desai Foundation</span>
                <h1 class="hero-title">
                    <span class="gujarati text-gold d-block">હીરાબાનો ખમ્મકાર</span>
                    <span class="text-primary">Empowering The Future</span>
                </h1>
                <p class="hero-subtitle">
                    Dedicated to uplifting girls' education in Gujarat. Join us in building a brighter tomorrow through
                    transparent scholarship programs.
                </p>
                <div class="hero-btns">
                    <a href="https://hirabanokhamkar.com/application" class="btn btn-primary">Apply Online</a>
                    <a href="#checklist" class="btn btn-secondary">Required Docs</a>
                </div>
            </div>

            <div class="founder-badge-wrapper">
                <div class="founder-badge">
                    <div class="founder-header">
                        <img src="{{ asset('img/founder.jpg') }}" class="founder-img" alt="Founder">
                        <div>
                            <h5 class="text-primary font-bold">Piyushbhai Desai</h5>
                            <small class="text-muted">Visionary & Founder</small>
                        </div>
                    </div>
                    <p class="founder-quote">
                        "Education is the only wealth that grows when shared. Let every daughter learn."
                    </p>
                </div>
            </div>
        </div>
    </header>

    <section class="impact-section" id="about">
        <div class="blob blob-1"></div>
        <div class="blob blob-2"></div>
        <div class="impact-grid">
            <div class="impact-item">
                <div class="counter" data-target="5000">0+</div>
                <div class="counter-label">Students Benefited</div>
            </div>
            <div class="impact-item">
                <div class="counter" data-target="35">0 Cr+</div>
                <div class="counter-label">Funds Distributed</div>
            </div>
            <div class="impact-item">
                <div class="counter" data-target="15">0+</div>
                <div class="counter-label">Years of Service</div>
            </div>
            <div class="impact-item">
                <div class="counter" data-target="100">0%</div>
                <div class="counter-label">Transparent Process</div>
            </div>
        </div>
    </section>

    <section class="section bg-white" id="heeraba">
        <div class="container">
            <div class="heeraba-grid">
                <div class="heeraba-content">
                    <span class="badge-pill"
                        style="margin-bottom: 1rem; background: var(--saffron-light); color: var(--saffron);">A Tribute
                        to Motherhood</span>
                    <h2 class="section-title">
                        <span class="gujarati d-block text-saffron-header"
                            style="font-size: 1.5rem; letter-spacing: 0;">હીરાબાનો ખમ્મકાર</span>
                        The Spirit of Resilience & Values
                    </h2>
                    <p class="text-muted" style="font-size: 1.1rem; margin-bottom: 1.5rem;">
                        Heeraba, a symbol of simplicity, strength, and boundless love. Her life was a testament to the
                        power of values, selfless service, and the unwavering belief in uplifting others.
                    </p>
                    <p class="text-muted">
                        This scholarship is inspired by her legacy—a mother's silent blessing ("Khamkar") that protects
                        and nurtures. We aim to carry forward her spirit by empowering daughters with education,
                        ensuring they have the support to rise, shine, and build a future grounded in dignity and
                        wisdom.
                    </p>
                    <div class="signature-box">
                         <p class="gujarati"

                            style="font-size: 1.25rem; font-weight: 700; color: var(--primary); line-height: 1.6;">

                            જ્યાં દીકરી શિક્ષિત થાય છે,<br>

                            ત્યાં આખો પરિવાર આગળ વધે છે.<br>

                            દીકરીઓના સપનાઓને પાંખ આપીએ.<br>

                            કારણ કે દીકરી કમજોર નથી – દીકરી એક શક્તિ છે

                        </p>
                        <small class="text-muted">- A Guided Philosophy</small>
                    </div>
                </div>
                <div class="heeraba-images">
                    <div class="img-card img-card-1">
                        <img src="{{ asset('img/Heeraba-No-Khamkar-1.jpg') }}" alt="Heeraba Portrait">
                    </div>
                    <div class="img-card img-card-2">
                        <img src="{{ asset('img/Heeraba-No-Khamkar-2.jpg') }}" alt="Heeraba with PM Modi">
                    </div>
                    <div class="decorative-circle"></div>
                </div>
            </div>
        </div>
    </section>

    <section class="section bg-light" id="benefits">
        <div class="container">
            <div class="section-header">
                <h2 class="uppercase text-saffron-header">Why Apply?</h2>
                <h3 class="section-title">Supporting Dreams, One Step at a Time</h3>
                <p class="section-subtitle">Comprehensive financial support for meritorious girl students across
                    Gujarat.</p>
            </div>

            <div class="cards-grid">
                <div class="benefit-card">
                    <div class="card-icon"><i class="fas fa-rupee-sign"></i></div>
                    <h4 class="card-title">₹7,500 Support</h4>
                    <p class="text-muted">Annual financial assistance to support the higher education of meritorious
                        girl students, ensuring no girl is left behind.</p>
                </div>
                <div class="benefit-card">
                    <div class="card-icon"><i class="fas fa-university"></i></div>
                    <h4 class="card-title">Direct Transfer</h4>
                    <p class="text-muted">Funds transferred strictly to the <strong>School's Bank Account</strong> in 3
                        installments for 100% transparency.</p>
                    <span class="verified-badge">Verified Transactions</span>
                </div>
                <div class="benefit-card">
                    <div class="card-icon"><i class="fas fa-graduation-cap"></i></div>
                    <h4 class="card-title">Eligibility</h4>
                    <p class="text-muted">Open to girl students studying in Private Schools (Non-RTE) from
                        <strong>Standard 5 to 12</strong>.
                    </p>
                </div>
            </div>
        </div>
    </section>



    <section class="section bg-light" id="checklist">
        <div class="container">
            <div class="checklist-container">
                <div>
                    <h3 class="section-title" style="font-size: 1.8rem; margin-bottom: 2rem;">Required Documents</h3>
                    <div class="doc-item">
                        <i class="fas fa-id-card text-saffron icon-lg"></i>
                        <div>
                            <h5 class="font-bold text-primary">Aadhar Card</h5>
                            <p class="text-muted">Copy of Student's & Father's card.</p>
                        </div>
                    </div>
                    <div class="doc-item">
                        <i class="fas fa-file-contract text-saffron icon-lg"></i>
                        <div>
                            <h5 class="font-bold text-primary">School Letterhead</h5>
                            <p class="text-muted">Scanned copy of letter confirming enrollment/fees.</p>
                        </div>
                    </div>
                    <div class="doc-item">
                        <i class="fas fa-camera text-saffron icon-lg"></i>
                        <div>
                            <h5 class="font-bold text-primary">Passport Photos</h5>
                            <p class="text-muted">Recent digital photograph.</p>
                        </div>
                    </div>
                    <div class="doc-item">
                        <i class="fas fa-bolt text-saffron icon-lg"></i>
                        <div>
                            <h5 class="font-bold text-primary">Address Proof</h5>
                            <p class="text-muted">Electricity Bill copy.</p>
                        </div>
                    </div>
                </div>

                <div class="warning-box">
                    <div class="warning-header">
                        <i class="fas fa-exclamation-circle text-primary" style="font-size: 1.75rem;"></i>
                        <h4 class="text-primary font-bold" style="margin:0;">Important Notice</h4>
                    </div>
                    <ul class="warning-list">
                        <li>
                            <span>•</span>
                            <span>The scholarship form is absolutely <strong>FREE</strong>. Do not pay anyone.</span>
                        </li>
                        <li>
                            <span>•</span>
                            <span>No political influence accepted. Merit & Need based only.</span>
                        </li>
                        <li>
                            <span>•</span>
                            <span>Incomplete forms will be rejected.</span>
                        </li>
                    </ul>
                    <div class="community-img-box">
                        <img src="{{ asset('img/founder.jpg') }}" alt="Community">
                        <small>Join us in this noble cause</small>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section bg-white" id="gallery">
        <div class="container">
            <div class="section-header">
                <h3 class="section-title">Moments of Joy</h3>
                <p class="section-subtitle">Glimpses from our recent distribution ceremonies and community drives.</p>
            </div>

            <div class="masonry-grid" id="masonry-grid">
                <div class="masonry-item"><img src="{{ asset('img/gallery-1.jpg') }}" alt="Gallery 1"></div>
                <div class="masonry-item"><img src="{{ asset('img/gallery-2.jpg') }}" alt="Gallery 2"></div>
                <div class="masonry-item"><img src="{{ asset('img/gallery-3.jpg') }}" alt="Gallery 3"></div>
                <div class="masonry-item"><img src="{{ asset('img/gallery-4.jpg') }}" alt="Gallery 4"></div>
                <div class="masonry-item"><img src="{{ asset('img/gallery-5.jpg') }}" alt="Gallery 5"></div>
                <div class="masonry-item"><img src="{{ asset('img/gallery-6.jpg') }}" alt="Gallery 6"></div>
                <div class="masonry-item"><img src="{{ asset('img/gallery-7.jpg') }}" alt="Gallery 7"></div>
                <div class="masonry-item"><img src="{{ asset('img/gallery-8.jpg') }}" alt="Gallery 8"></div>
                <div class="masonry-item"><img src="{{ asset('img/gallery-9.jpg') }}" alt="Gallery 9"></div>
                <div class="masonry-item"><img src="{{ asset('img/gallery-10.jpg') }}" alt="Gallery 10"></div>
                <div class="masonry-item"><img src="{{ asset('img/gallery-11.jpg') }}" alt="Gallery 11"></div>
                <div class="masonry-item"><img src="{{ asset('img/gallery-12.jpg') }}" alt="Gallery 12"></div>

                <div class="masonry-item hidden-gallery-item"><img src="{{ asset('img/gallery-13.jpg') }}" alt="Gallery 13"></div>
                <div class="masonry-item hidden-gallery-item"><img src="{{ asset('img/gallery-14.jpg') }}" alt="Gallery 14"></div>
                <div class="masonry-item hidden-gallery-item"><img src="{{ asset('img/gallery-15.jpg') }}" alt="Gallery 15"></div>
                <div class="masonry-item hidden-gallery-item"><img src="{{ asset('img/gallery-16.jpg') }}" alt="Gallery 16"></div>
                <div class="masonry-item hidden-gallery-item"><img src="{{ asset('img/gallery-17.jpg') }}" alt="Gallery 17"></div>
                <div class="masonry-item hidden-gallery-item"><img src="{{ asset('img/gallery-18.jpg') }}" alt="Gallery 18"></div>
                <div class="masonry-item hidden-gallery-item"><img src="{{ asset('img/gallery-19.jpg') }}" alt="Gallery 19"></div>
                <div class="masonry-item hidden-gallery-item"><img src="{{ asset('img/gallery-20.jpg') }}" alt="Gallery 20"></div>
                <div class="masonry-item hidden-gallery-item"><img src="{{ asset('img/gallery-21.jpg') }}" alt="Gallery 21"></div>
                <div class="masonry-item hidden-gallery-item"><img src="{{ asset('img/gallery-22.jpg') }}" alt="Gallery 22"></div>
                <div class="masonry-item hidden-gallery-item"><img src="{{ asset('img/gallery-23.jpg') }}" alt="Gallery 23"></div>
                <div class="masonry-item hidden-gallery-item"><img src="{{ asset('img/gallery-24.jpg') }}" alt="Gallery 24"></div>
                <div class="masonry-item hidden-gallery-item"><img src="{{ asset('img/gallery-25.jpg') }}" alt="Gallery 25"></div>
                <div class="masonry-item hidden-gallery-item"><img src="{{ asset('img/gallery-26.jpg') }}" alt="Gallery 26"></div>
                <div class="masonry-item hidden-gallery-item"><img src="{{ asset('img/gallery-27.jpg') }}" alt="Gallery 27"></div>
                <div class="masonry-item hidden-gallery-item"><img src="{{ asset('img/gallery-28.jpg') }}" alt="Gallery 28"></div>
                <div class="masonry-item hidden-gallery-item"><img src="{{ asset('img/gallery-29.jpg') }}" alt="Gallery 29"></div>
                <div class="masonry-item hidden-gallery-item"><img src="{{ asset('img/gallery-30.jpg') }}" alt="Gallery 30"></div>
                <div class="masonry-item hidden-gallery-item"><img src="{{ asset('img/gallery-31.jpg') }}" alt="Gallery 31"></div>
                <div class="masonry-item hidden-gallery-item"><img src="{{ asset('img/gallery-32.jpg') }}" alt="Gallery 32"></div>
                <div class="masonry-item hidden-gallery-item"><img src="{{ asset('img/gallery-33.jpg') }}" alt="Gallery 33"></div>
                <div class="masonry-item hidden-gallery-item"><img src="{{ asset('img/gallery-34.jpg') }}" alt="Gallery 34"></div>
                <div class="masonry-item hidden-gallery-item"><img src="{{ asset('img/gallery-35.jpg') }}" alt="Gallery 35"></div>
                <div class="masonry-item hidden-gallery-item"><img src="{{ asset('img/gallery-36.jpg') }}" alt="Gallery 36"></div>

            </div>

            <div style="text-align: center; margin-top: 2rem;">
                <button id="load-more-btn" class="btn btn-secondary">Load More Moments <i
                        class="fas fa-chevron-down"></i></button>
            </div>
        </div>
    </section>

    <footer class="main-footer" id="contact">
        <div class="container">
            <div class="footer-grid">
                <div>
                    <div class="footer-brand">
                        <img src="img/logo.png" alt="Heeraba No Khamkar" class="footer-logo-img">
                    </div>
                    <p class="footer-desc">
                        Empowering girls through education since 2008. A philanthropic initiative by the Piyushbhai
                        Desai Foundation.
                    </p>
                    <small class="footer-cin">CIN: U85500GJ2026NPL171502</small>
                </div>

                <div>
                    <h4 class="footer-title">Quick Links</h4>
                    <ul class="footer-links-list">
                        <li><a href="#about">Our Impact</a></li>
                        <li><a href="#benefits">Scholarship Info</a></li>

                        <li><a href="#checklist">Required Docs</a></li>
                        <li><a href="#gallery">Photo Gallery</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="footer-title">Contact Us</h4>
                    <div class="contact-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>502, Empire State Building,<br>Udhna Darwaja, Surat</span>
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-phone-alt"></i>
                        <a href="tel:6359186191">63591 86191</a>
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-envelope"></i>
                        <a href="mailto:hirabanokhamakar@gmail.com">hirabanokhamakar@gmail.com</a>
                    </div>
                </div>

                <div>
                    <div class="map-container">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1860.0967224960234!2d72.83154877195871!3d21.184473011390363!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be04e43933bcb8b%3A0x8033269b5a063654!2sEmpire%20State%20Building!5e0!3m2!1sen!2sin!4v1771154683852!5m2!1sen!2sin"

                            class="map-frame" allowfullscreen="" loading="lazy"

                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>

            <div class="footer-bottom">
                <div class="copyright-text">
                    © 2026 Hiraba No Khamkar Foundation. All Rights Reserved. <span class="separator">|</span>
                    Designed by <a href="https://infinitedevelopers.in/" target="_blank" class="dev-link">Infinite
                        Developers</a>
                </div>
                <div class="social-links">
                    <a href="https://www.facebook.com/desaipiyush91/" target="_blank" class="social-btn"><i
                            class="fab fa-facebook-f"></i></a>
                    <a href="https://www.instagram.com/desai_piyush_official/" target="_blank" class="social-btn"><i
                            class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </footer>

    <div id="lightbox" class="lightbox">
        <span class="close-lb">×</span>
        <span class="prev">&#10094;</span>
        <img id="lightbox-img" src="" alt="Full Screen">
        <span class="next">&#10095;</span>
    </div>

    <!-- <script src="js/script.js"></script> -->
     <script>
        document.addEventListener('DOMContentLoaded', () => {

        // Hero Slideshow
        const slides = document.querySelectorAll('.hero-slide');
        let currentSlide = 0;

        if (slides.length > 0) {
            setInterval(() => {
                slides[currentSlide].classList.remove('active');
                currentSlide = (currentSlide + 1) % slides.length;
                slides[currentSlide].classList.add('active');
            }, 5000); // Change every 5 seconds
        }

        // --- Mobile Menu Toggle ---
        const mobileBtn = document.querySelector('.mobile-menu-btn');
        const mobileDropdown = document.querySelector('.mobile-dropdown');
        const mobileIcon = mobileBtn ? mobileBtn.querySelector('i') : null;

        if (mobileBtn && mobileDropdown) {
            mobileBtn.addEventListener('click', (e) => {
                e.stopPropagation();
                // Toggle logic using CSS classes or inline style
                const isHidden = window.getComputedStyle(mobileDropdown).display === 'none';

                if (isHidden) {
                    mobileDropdown.style.display = 'flex';
                    if (mobileIcon) {
                        mobileIcon.classList.remove('fa-bars');
                        mobileIcon.classList.add('fa-times');
                    }
                } else {
                    mobileDropdown.style.display = 'none';
                    if (mobileIcon) {
                        mobileIcon.classList.remove('fa-times');
                        mobileIcon.classList.add('fa-bars');
                    }
                }
            });

            // Close on link click
            mobileDropdown.querySelectorAll('a').forEach(link => {
                link.addEventListener('click', () => {
                    mobileDropdown.style.display = 'none';
                    if (mobileIcon) {
                        mobileIcon.classList.remove('fa-times');
                        mobileIcon.classList.add('fa-bars');
                    }
                });
            });

            // Close on click outside
            document.addEventListener('click', (e) => {
                if (!mobileBtn.contains(e.target) && !mobileDropdown.contains(e.target)) {
                    mobileDropdown.style.display = 'none';
                    if (mobileIcon) {
                        mobileIcon.classList.remove('fa-times');
                        mobileIcon.classList.add('fa-bars');
                    }
                }
            });
        }

        // --- Smart Navbar (Scroll Effect) ---
        const navContainer = document.querySelector('.nav-container');
        const onScroll = () => {
            if (window.scrollY > 50) {
                navContainer.classList.add('scrolled');
            } else {
                navContainer.classList.remove('scrolled');
            }
        };
        window.addEventListener('scroll', onScroll);

        // --- Animated Counters (Intersection Observer) ---
        const counters = document.querySelectorAll('.counter');
        const counterObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const counter = entry.target;
                    const target = +counter.getAttribute('data-target');
                    const duration = 2000; // ms
                    const increment = target / (duration / 16); // 60fps

                    let current = 0;
                    const updateCounter = () => {
                        current += increment;
                        if (current < target) {
                            // Keep suffix logic (e.g., '5000+' -> '123+')
                            const text = counter.innerText;
                            const suffix = text.replace(/[0-9]/g, '');
                            counter.innerText = Math.ceil(current) + suffix;
                            requestAnimationFrame(updateCounter);
                        } else {
                            const text = counter.innerText;
                            const suffix = text.replace(/[0-9]/g, '');
                            counter.innerText = target + suffix;
                        }
                    };
                    updateCounter();
                    observer.unobserve(counter);
                }
            });
        }, { threshold: 0.5 });

        counters.forEach(counter => counterObserver.observe(counter));

        // --- Smooth Scrolling ---
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const targetId = this.getAttribute('href');
                if (targetId === '#') return;

                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    const headerOffset = 120;
                    const elementPosition = targetElement.getBoundingClientRect().top;
                    const offsetPosition = elementPosition + window.scrollY - headerOffset;

                    window.scrollTo({
                        top: offsetPosition,
                        behavior: 'smooth'
                    });
                }
            });
        });

        // --- Gallery Lightbox ---
        const lightbox = document.getElementById('lightbox');
        const lightboxImg = document.getElementById('lightbox-img');
        const closeBtn = document.querySelector('.close-lb');
        const prevBtn = document.querySelector('.prev');
        const nextBtn = document.querySelector('.next');
        let galleryImages = []; // Array to store all gallery images
        let currentIndex = 0;

        // Delegate click for masonry items
        const grid = document.getElementById('masonry-grid');
        if (grid) {
            // Populate galleryImages array on load
            galleryImages = Array.from(document.querySelectorAll('.masonry-item img'));

            grid.addEventListener('click', (e) => {
                if (e.target.tagName === 'IMG') {
                    // Update collection in case "Load More" added new items
                    galleryImages = Array.from(document.querySelectorAll('.masonry-item img'));
                    currentIndex = galleryImages.indexOf(e.target);

                    showImage(currentIndex);
                    lightbox.style.display = 'flex';
                    // Trigger reflow for fade in
                    lightbox.style.opacity = '0';
                    setTimeout(() => {
                        lightbox.style.transition = 'opacity 0.3s';
                        lightbox.style.opacity = '1';
                    }, 10);
                }
            });
        }

        const showImage = (index) => {
            if (index >= 0 && index < galleryImages.length) {
                lightboxImg.src = galleryImages[index].src;
                currentIndex = index;
            }
        };

        const nextImage = (e) => {
            e.stopPropagation();
            currentIndex = (currentIndex + 1) % galleryImages.length;
            showImage(currentIndex);
        };

        const prevImage = (e) => {
            e.stopPropagation();
            currentIndex = (currentIndex - 1 + galleryImages.length) % galleryImages.length;
            showImage(currentIndex);
        };

        const closeLightbox = () => {
            lightbox.style.opacity = '0';
            setTimeout(() => {
                lightbox.style.display = 'none';
            }, 300);
        };

        if (closeBtn) closeBtn.addEventListener('click', closeLightbox);
        if (prevBtn) prevBtn.addEventListener('click', prevImage);
        if (nextBtn) nextBtn.addEventListener('click', nextImage);

        if (lightbox) {
            lightbox.addEventListener('click', (e) => {
                if (e.target === lightbox) closeLightbox();
            });
        }

        // --- Load More Gallery Logic ---
        const loadMoreBtn = document.getElementById('load-more-btn');

        if (loadMoreBtn) {
            loadMoreBtn.addEventListener('click', () => {
                const hiddenItems = document.querySelectorAll('.hidden-gallery-item');

                if (hiddenItems.length === 0) {
                    loadMoreBtn.style.display = 'none';
                    return;
                }

                const originalText = loadMoreBtn.innerHTML;
                loadMoreBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Loading...';

                // Simulate loading delay for effect
                setTimeout(() => {
                    const batchSize = 12; // Show 12 at a time
                    const itemsToShow = Array.from(hiddenItems).slice(0, batchSize);

                    itemsToShow.forEach(item => {
                        item.classList.remove('hidden-gallery-item');
                        item.style.opacity = '0';
                        item.style.display = 'block'; // Ensure it takes space

                        // Trigger reflow
                        void item.offsetWidth;

                        item.style.transition = 'opacity 0.6s ease';
                        item.style.opacity = '1';
                    });

                    loadMoreBtn.innerHTML = originalText;

                    // Hide button if no more items left
                    if (document.querySelectorAll('.hidden-gallery-item').length === 0) {
                        loadMoreBtn.style.display = 'none';
                    }
                }, 600);
            });
        }

    });
     </script>
</body>

</html>