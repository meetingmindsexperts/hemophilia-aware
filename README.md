# Hemophilia Awareness Webinar Series — Landing Pages

Standalone PHP + Tailwind (CDN) landing pages for the three-part Hemophilia
Awareness Webinar Series. Sponsored by Sanofi, endorsed by ESH & EOHNS, CME accredited.

## Pages

| Route | Session | Date | Host site |
|-------|---------|------|-----------|
| `index.php` | Series overview (links to all three) | — | — |
| `patient.php` | Patient — *Hemophilia: A New Era of Care* | 19 Jun 2026 | EOHNS |
| `nurses.php` | Nurses — *Awareness Series, Wave 1* | 20 Jun 2026 | EOHNS |
| `physician.php` | Physician — *Awareness Series, Wave 2* | 2 Jul 2026 | ESH |

## Run locally

```bash
php -S 127.0.0.1:8099
# open http://127.0.0.1:8099/
```

## Structure

```
├── index.php / patient.php / nurses.php / physician.php   # entry points (thin)
├── includes/
│   ├── data.php          # ← EDIT HERE: all content (agendas, faculty, dates, BigMarker URLs)
│   ├── render.php        # page assembler
│   ├── head.php          # <head> + Tailwind brand tokens (official palette + Montserrat)
│   ├── header.php / footer.php
│   └── components/        # hero, highlights, agenda, faculty, cta
└── assets/img/           # brand imagery from the BigMarker asset pack
```

## To finish before launch

1. **Wire BigMarker registration.** In `includes/data.php`, set each webinar's
   `bigmarker.conference_url` to its real BigMarker conference URL, e.g.
   `https://www.bigmarker.com/eohns/hemophilia-patient`. The hero embeds
   `…/registrations/new?embed=true`. Until set, a styled "opening soon" fallback shows.
2. **Drop in official logos.** ESH / EOHNS / Sanofi / Meeting Minds currently render as
   text placeholders in `includes/footer.php`. Replace with supplied logo files.
3. **Faculty bios + photos.** Placeholders live in `faculty_directory()` in `data.php`.
4. **(Optional) Production Tailwind.** The CDN prints a console warning and ships the full
   engine. For production, compile via the Tailwind CLI and swap the `<script>` in `head.php`
   for the built stylesheet — the `tailwind.config` tokens carry over unchanged.

## Deployment

Pushing to `main` triggers `.github/workflows/deploy.yml`, which lints + smoke-tests
all pages then uploads over **FTP (port 21)** via SamKirkland/FTP-Deploy-Action.

Required GitHub repo secrets (same names as the other MME sites):

- `FTP_SERVER` · `FTP_USERNAME` · `FTP_PASSWORD`

**Before the first real deploy:** confirm `server-dir` in the workflow points to the
correct web path. It defaults to `hemophilia-aware/` (a dedicated folder) so it cannot
overwrite another site that shares the same FTP account.

## Brand tokens (official identity guide)

Deep Navy `#0B1F3A` · Patient Blue `#2E6F95` · Teal `#1AA3A3` · Warm Gold `#C9A96E` ·
Soft Ivory `#F7F3EA` · Charcoal `#1F2933`. Type: **Montserrat**.
