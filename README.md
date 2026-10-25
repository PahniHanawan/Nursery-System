# 🌱 Little Sprouts Nursery — Website & Visit Booking Management System

[![Live Demo](https://img.shields.io/badge/Demo-appnursery.freedev.app-success?style=flat-square&logo=google-chrome)](https://appnursery.freedev.app/?i=1)
[![Laravel](https://img.shields.io/badge/Laravel-12.x%20%7C%2013.x-red?style=flat-square&logo=laravel)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-%5E8.2%20%7C%208.5%2B-blue?style=flat-square&logo=php)](https://php.net)
[![TailwindCSS](https://img.shields.io/badge/TailwindCSS-v4.0-06B6D4?style=flat-square&logo=tailwindcss)](https://tailwindcss.com)
[![Alpine.js](https://img.shields.io/badge/Alpine.js-3.x-8BC0D0?style=flat-square&logo=alpinedotjs)](https://alpinejs.dev)
[![Compliance](https://img.shields.io/badge/EU%20GDPR-Compliant-emerald?style=flat-square&logo=shield)](https://gdpr.eu)
[![Tests](https://img.shields.io/badge/PHPUnit-48%20Passed-brightgreen?style=flat-square)](tests/)

> A responsive, friction-free digital touchpoint for prospective parents to estimate early years tuition and request personalized facility tour show-arounds, backed by an intuitive admissions management dashboard.

---

## 🌟 Live Demonstration
- **Live URL**: [https://appnursery.freedev.app/?i=1](https://appnursery.freedev.app/?i=1)
- **Admin Portal**: [https://appnursery.freedev.app/login](https://appnursery.freedev.app/login)

---

## 📌 Project Overview

This system was designed and implemented based on **[PRD Issue #1](https://github.com/PahniHanawan/Nursery-System/issues/1)** to solve two core pain points:
1. **Prospective Parents**: Often face friction finding transparent pricing and booking a visit outside working hours.
2. **Nursery Staff**: Overwhelmed by repetitive tuition queries and unstructured phone/chat coordination.

---

## ✨ Key Features

### 1. Public Website Architecture (7 Pages, Full English)
- **Home (`/`)**: Hero banner with immediate tour booking CTA, nursery value propositions (1:3 baby ratio, organic chef meals, forest school), age group previews, and reviews.
- **About Us (`/about`)**: Reggio Emilia & EYFS educational philosophy, staff bios (Sarah Jenkins & educators), Ofsted standards, and pediatric safety accreditations.
- **Rooms & Facilities (`/rooms-and-facilities`)**: Dedicated sections for:
  - *Baby Discovery Suite (0–12 mos)* — 1:3 ratio, quiet sleep pods, milk prep kitchen.
  - *Toddler Explorers (1–2 yrs)* — 1:4 ratio, sensory play tables, gross motor bridges.
  - *Pre-School Readiness (3–5 yrs)* — 1:8 ratio, early phonics, STEM lab, bilingual French club.
  - *Nature Garden & Forest School* — All-weather soft turf, mud kitchen, organic garden.
- **Fees & Tuition Calculator (`/fees`)**:
  - **Dynamic Interactive Fee Estimator**: Real-time client-side Alpine.js calculator computing weekly total and monthly total `((Weekly * 52) / 12)`.
  - Transparent standard fee schedule table.
  - Government 15 & 30 hours funded childcare guidance.
- **Photo Gallery (`/gallery`)**: Grid layout with an Alpine.js **Lightbox modal preview** for high-resolution facility pictures and captions.
- **Book a Visit (`/book-a-visit`)**: High-conversion visit tour request form with date/time pickers, term preferences, and anti-spam protection.
- **Contact Us (`/contact`)**: Interactive Google Maps embed (Kensington, London), direct admissions contact details, and visitor parking guidance.
- **Privacy Policy (`/privacy-policy`)**: Complete GDPR & ePrivacy statement outlining data controller credentials, legal grounds, and right to erasure.

### 2. Admissions Booking Engine (FR-03 & FR-04)
- **Anti-Spam Honeypot Protection**: Silent trap field (`website_url`) dropping bot submissions cleanly.
- **Dual Transactional Emails**:
  - `BookingConfirmationParentMail`: Sent to parents with tour details and 24–48hr response notification.
  - `BookingNotificationAdminMail`: Sent to the admissions manager with applicant summary and a direct link to the dashboard.
- **Strict Validation**: RFC-compliant email checks, past date prevention, and required GDPR consent.

### 3. Admin Admissions Dashboard (FR-05)
- **Overview Metrics**: Real-time counters for Total Inquiries, Pending, Confirmed, Completed, and Cancelled bookings.
- **Upcoming Tours Table**: Displays confirmed visits for the next 7 days.
- **Booking Management**:
  - Tab status filtering (All, Pending, Confirmed, Completed, Cancelled) & keyword search.
  - Detail view of parent & child info.
  - One-click status updates (`pending` &rarr; `confirmed` &rarr; `completed` / `cancelled`).
  - **Staff Internal Notes**: Private admissions log for recording phone calls and schedule adjustments.
  - **Soft Deletes**: Safe archiving without losing database history.

### 4. European GDPR & Compliance Suite (FR-07)
- **Cookie Consent Banner**: Lightweight bottom banner storing consent preferences in `localStorage`.
- **Right to be Forgotten (Article 17 GDPR)**: One-click "Anonymize/Erase" button in admin dashboard permanently scrubbing parent PII (`[GDPR_ERASED]`, anonymized email, cleared phone/IP) while preserving statistical metrics.

### 5. Media & Content Management (FR-06)
- **Tuition Fee Schedule Manager (`/admin/fees`)**: Modify daily rates per age bracket; instantly updates the parent interactive fee calculator.
- **Photo Gallery CMS (`/admin/gallery`)**: Upload new facility photos (JPG, PNG, WebP &le; 2MB) with alt text and sort ordering.
- **Lightweight CMS (`/admin/cms`)**: Edit top announcement banners, phone numbers, admissions emails, and ethos text without touching code.

---

## 🛠️ Technology Stack

| Layer | Technology |
|---|---|
| **Framework** | [Laravel 12/13](https://laravel.com) running on PHP 8.2+ / PHP 8.5 |
| **Frontend** | Blade Templates, [Tailwind CSS v4](https://tailwindcss.com), [Alpine.js](https://alpinejs.dev) |
| **Asset Bundler** | [Vite 8](https://vitejs.dev) |
| **Database** | MySQL (with migrations, factories, seeders, and soft deletes) |
| **Authentication** | Laravel Breeze (Rate-limited, CSRF-protected session auth) |
| **Testing** | PHPUnit (48 feature & unit tests) |
| **Code Style** | Laravel Pint |

---

## 🚀 Local Installation & Setup

### Prerequisites
- PHP &ge; 8.2 (tested on PHP 8.5.12)
- Composer &ge; 2.x
- Node.js &ge; 20.x & npm
- MySQL Server (e.g. Laragon / XAMPP)

### Installation Steps

1. **Clone the repository:**
   ```bash
   git clone https://github.com/PahniHanawan/Nursery-System.git
   cd Nursery-System
   ```

2. **Install PHP dependencies:**
   ```bash
   composer install
   ```

3. **Install and build frontend assets:**
   ```bash
   npm install
   npm run build
   ```

4. **Configure environment:**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
   *Edit `.env` to configure your MySQL database credentials:*
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=nursery_system
   DB_USERNAME=root
   DB_PASSWORD=
   ```

5. **Run migrations and seed default data:**
   ```bash
   php artisan migrate --seed
   php artisan storage:link
   ```

6. **Start local server:**
   ```bash
   php artisan serve
   ```
   *Visit `http://localhost:8000` in your browser.*

---

## 🔐 Default Admin Account

The database seeder automatically initializes the Admissions Head admin account:

| Field | Value |
|---|---|
| **Login URL** | `/login` (or `/admin/dashboard`) |
| **Email** | `admin@littlesprouts.test` |
| **Password** | `password` |
| **Role / Name** | Sarah Jenkins *(Nursery Manager & Admissions Head)* |

---

## 🧪 Running Tests

The test suite covers public pages, booking submission validation, honeypot traps, mailable dispatch, admin CRUD, status transitions, and GDPR anonymization:

```bash
php artisan test --compact
```

Result:
```
Tests:    48 passed (127 assertions)
Duration: 10.61s
```

---

## ☁️ Deployment Guides

### A. Shared Hosting / InfinityFree (Current Live Demo)
- The repository includes a root [`.htaccess`](.htaccess) that automatically routes traffic into `public/index.php`.
- Import [`database/nursery_system.sql`](database/nursery_system.sql) into phpMyAdmin.
- Set PHP version to **PHP 8.2** in VistaPanel.
- Upload project files to `htdocs/` and configure `.env`.

### B. Containerized Cloud (Render.com / Koyeb / Fly.io)
A production multi-stage [`Dockerfile`](Dockerfile) is included:
- **Base image:** `php:8.5-fpm` + Nginx
- **Listening port:** `8000`
- **Region:** Frankfurt (Germany - EU) for EU GDPR compliance.

---

## 📄 License

This open-source project is licensed under the [MIT License](LICENSE).
