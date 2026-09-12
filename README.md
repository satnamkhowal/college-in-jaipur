# College in Jaipur

Bootstrap-based PHP college discovery website for `https://collegeinjaipur.com/`, powered by Groot Software.

## Requirements

- PHP 8.0+
- MySQL 5.7+ or MariaDB 10.4+
- PDO MySQL extension
- Apache or compatible PHP hosting

## One-click database setup

1. Upload all project files to the domain's public folder.
2. Open `https://collegeinjaipur.com/install/`.
3. Enter database host/IP, port, database name, username and password.
4. Enable **Create database** only when the hosting user has database-creation permission. On shared hosting, create an empty database/user in the hosting panel first and leave this unchecked.
5. Click **Install database**.

The installer creates `colleges`, `courses`, `college_courses`, `enquiries` and `site_settings`; inserts starter Jaipur college/course records; writes `config/local.php`; and creates `install/install.lock` to prevent accidental reruns.

Never commit `config/local.php` or `install/install.lock`. They are ignored by Git.

## Local run

```bash
php -S localhost:8000
```

Then open `http://localhost:8000`. Until installation, public pages use built-in starter listings; enquiry submission requires the database.

## SEO blog system

The project exposes 1,000 Hinglish guides across college, course, Jaipur-area and comparison clusters. URLs use `/blog/{slug}/`, one shared PHP template and a centralized deterministic dataset, avoiding 1,000 duplicate physical templates. `sitemap.php` includes all blog URLs and `robots.txt` points crawlers to it.

## Updating college records

The initial catalog is intentionally a verified-later starter set. Institution names, approvals, courses, fees and admissions can change; verify each record using the institution and relevant regulator before publication. More colleges can be added directly to the `colleges` table or through a future admin panel.
