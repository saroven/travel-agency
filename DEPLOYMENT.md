# 🚀 Deployment Guide — Airbridge Tours & Travel
**Host**: Namecheap Shared Hosting (cPanel)  
**Domain**: airbridgebd.com  
**Server**: server320.web-hosting.com (68.65.123.95)  
**cPanel User**: airbridg  
**Tech Stack**: Laravel 12, PHP 8.2, SQLite, Vite

---

## 📁 Server Directory Structure

```
/home/airbridg/
├── public_html/                  ← Public web root (browser accessible)
│   ├── index.php                 ← Laravel entry point (paths edited manually)
│   ├── .htaccess                 ← Gzip + Cache + Laravel routing rules
│   ├── build/                    ← Compiled Vite assets (CSS + JS)
│   ├── storage/                  ← Symlink → travel-agency/storage/app/public
│   └── *.webp                    ← Optimized package images
│
└── travel-agency/                ← Laravel core (NOT publicly accessible)
    ├── app/
    ├── bootstrap/
    ├── config/
    ├── database/
    │   └── database.sqlite       ← SQLite database file
    ├── public/
    │   └── build/                ← MUST also exist here (Vite manifest lookup)
    ├── resources/
    ├── routes/
    ├── storage/
    ├── vendor/
    ├── .env                      ← Production environment config
    └── artisan
```

---

## 🔑 Admin Credentials

| Email | Password | Notes |
|---|---|---|
| `admin@airbridge.com` | `password` | Default admin |
| `shahalam.roven28@gmail.com` | `825028` | Secondary admin |

**Admin Panel URL**: https://airbridgebd.com/admin

---

## 🛠️ First-Time Deployment Steps

### Step 1: Zip the Project
Select these files and folders from the local project root and create a zip:
- Folders: `app`, `bootstrap`, `config`, `database`, `public`, `resources`, `routes`, `storage`, `vendor`
- Files: `artisan`, `composer.json`, `composer.lock`, `package.json`, `vite.config.js`

> ⚠️ Make sure `vendor/` is included. Do NOT include `node_modules/` or `.git/`.

---

### Step 2: Upload & Extract in cPanel File Manager
1. Log in to **cPanel** → open **File Manager**.
2. Navigate to `/home/airbridg/` (home root, NOT inside `public_html`).
3. Upload the zip file here.
4. Right-click the zip → **Extract** → destination: `/home/airbridg/travel-agency`.

---

### Step 3: Move Public Files to `public_html`
1. Navigate inside `/home/airbridg/travel-agency/public/`.
2. **Select all** files and folders inside.
3. Click **Move** and set destination to `/home/airbridg/public_html/`.

---

### Step 4: Edit `index.php`
1. Open `/home/airbridg/public_html/index.php`.
2. Update the two path lines:

```php
// Line ~14
require '/home/airbridg/travel-agency/vendor/autoload.php';

// Line ~17
$app = require_once '/home/airbridg/travel-agency/bootstrap/app.php';
```

---

### Step 5: Copy `build` Folder (Important!)
Laravel looks for the Vite manifest in **two** places. Copy the build folder:

**Via cPanel File Manager:**
1. Go to `/home/airbridg/public_html/`.
2. Right-click `build/` folder → **Copy**.
3. Set destination to `/home/airbridg/travel-agency/public/`.

**Via Terminal:**
```bash
cp -r /home/airbridg/public_html/build /home/airbridg/travel-agency/public/build
```

---

### Step 6: Create `.env` File
Create `/home/airbridg/travel-agency/.env` with:

```env
APP_NAME="Airbridge Tours"
APP_ENV=production
APP_KEY=base64:xUAOODJVDlZZOw69OP/6zPeC9IklUEjM7abJkcXALPA=
APP_DEBUG=false
APP_URL=https://airbridgebd.com

LOG_CHANNEL=daily
LOG_LEVEL=info

DB_CONNECTION=sqlite
DB_DATABASE=/home/airbridg/travel-agency/database/database.sqlite

SESSION_DRIVER=database
SESSION_LIFETIME=120
SESSION_ENCRYPT=false
SESSION_PATH=/
SESSION_DOMAIN=null

BROADCAST_CONNECTION=log
FILESYSTEM_DISK=local
QUEUE_CONNECTION=sync
CACHE_STORE=database

MAIL_MAILER=smtp
MAIL_HOST=mail.airbridgebd.com
MAIL_PORT=465
MAIL_USERNAME=noreply@airbridgebd.com
MAIL_PASSWORD=your_email_password_here
MAIL_ENCRYPTION=ssl
MAIL_FROM_ADDRESS="noreply@airbridgebd.com"
MAIL_FROM_NAME="Airbridge Tours"
```

---

### Step 7: Run Terminal Commands
Go to **cPanel → Terminal** and run:

```bash
cd /home/airbridg/travel-agency

# Fix permissions
chmod -R 775 storage
chmod -R 775 bootstrap/cache
chmod 775 database
touch database/database.sqlite
chmod 666 database/database.sqlite

# Run migrations and seed admin users + packages
php artisan migrate:fresh --seed --force

# Create the public storage symlink
cd /home/airbridg/public_html
rm -rf storage
ln -s /home/airbridg/travel-agency/storage/app/public storage

# Cache Laravel configuration for production speed
cd /home/airbridg/travel-agency
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

---

### Step 8: Set PHP Version in cPanel
1. Go to **cPanel → Select PHP Version**.
2. Set PHP version to **8.2**.
3. Enable these extensions: `sqlite3`, `pdo_sqlite`, `zip`, `mbstring`, `openssl`, `fileinfo`, `gd`, `exif`.

---

## 🔄 Re-Deployment (Updates Only)

When pushing code updates to the server:

```bash
cd /home/airbridg/travel-agency

# Clear all caches first
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear

# Run any new migrations
php artisan migrate --force

# Re-cache for production speed
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

If you changed any frontend assets (CSS/JS), re-run **locally**:
```bash
npm run build
```
Then re-upload the `public/build/` folder to both:
- `/home/airbridg/public_html/build/`
- `/home/airbridg/travel-agency/public/build/`

---

## ⚡ Performance Optimizations Applied

| Optimization | Status | Details |
|---|---|---|
| **Gzip Compression** | ✅ Active | Enabled via `.htaccess` `mod_deflate` |
| **Browser Caching** | ✅ Active | 1 year cache for images/CSS/JS via `mod_expires` |
| **WebP Images** | ✅ Active | All 7 package images converted (77–88% smaller) |
| **Vite Asset Hashing** | ✅ Active | Filenames include content hash for cache busting |
| **Laravel Config Cache** | ✅ Active | Run `php artisan config:cache` after each deploy |
| **Laravel Route Cache** | ✅ Active | Run `php artisan route:cache` after each deploy |
| **Laravel View Cache** | ✅ Active | Run `php artisan view:cache` after each deploy |

---

## 🔒 Security Notes
- `APP_DEBUG=false` must remain `false` in production.
- The `travel-agency/` core folder is outside `public_html` — it is **not publicly accessible**.
- The `.env` file is in `travel-agency/` — never move it inside `public_html`.
- Remove any leftover `deploy.php`, `chmod.php`, or `fix.php` helper files from `public_html` after setup.

---

## 📧 Email Configuration

SMTP is configured through Namecheap cPanel email.

**Steps to set up email:**
1. Go to **cPanel → Email Accounts** → Create `noreply@airbridgebd.com`.
2. Update `.env` with the correct `MAIL_PASSWORD`.
3. Run `php artisan config:cache` to apply.

**Alternative (Better deliverability):** Use [Brevo (Sendinblue)](https://www.brevo.com) free SMTP — 300 emails/day free.

```env
MAIL_MAILER=smtp
MAIL_HOST=smtp-relay.brevo.com
MAIL_PORT=587
MAIL_USERNAME=your_brevo_login
MAIL_PASSWORD=your_brevo_smtp_key
MAIL_ENCRYPTION=tls
```

---

## 🐛 Troubleshooting

| Error | Cause | Fix |
|---|---|---|
| `vendor/autoload.php not found` | `vendor/` not uploaded or wrong path in `index.php` | Check `index.php` paths + ensure `vendor/` exists in `travel-agency/` |
| `Vite manifest not found` | `build/` folder missing from `travel-agency/public/` | Copy `public_html/build/` → `travel-agency/public/build/` |
| `Index of /` shown | Files extracted into wrong folder | Move `travel-agency/` to `/home/airbridg/`, not inside `public_html/` |
| `500 Internal Server Error` | Check error log | View `/home/airbridg/public_html/error_log` or `travel-agency/storage/logs/laravel.log` |
| `Storage permission denied` | Wrong folder permissions | Run `chmod -R 775 storage bootstrap/cache` |
| `No application encryption key` | Missing or wrong `APP_KEY` in `.env` | Add `APP_KEY=base64:xUAOODJVDlZZOw69OP/6zPeC9IklUEjM7abJkcXALPA=` |
| Sessions not working | SQLite sessions table missing | Run `php artisan migrate --force` |
