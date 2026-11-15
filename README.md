# Apex LearnSphere — WordPress Theme

A custom WordPress theme for **Apex LearnSphere**, a multidisciplinary
education, career and leadership consultancy.

> *Think ahead. Learn smart. Lead the future.*

A premium, professional, people-centred design — deliberately **not** a
tuition-centre or generic coaching site. Built as a lean, dependency-free
classic theme (no page builder, no required plugins).

---

## Quick install

**Option A — upload a ZIP**
1. In `wp-admin`, go to **Appearance → Themes → Add New → Upload Theme**.
2. Upload a ZIP of this repository (or the `apex-learnsphere` folder).
3. **Activate** it.

**Option B — clone**
```bash
git clone https://github.com/<you>/apex-learnsphere-theme.git \
  wp-content/themes/apex-learnsphere
```

Then go to **Appearance → Menus** and assign your menu to the **Primary**
location, and set a **front page** (Settings → Reading) if you use a static
front page.

---

## Design system

| Token | Value |
|---|---|
| Navy / charcoal | `#1A2D44` / `#2B323C` |
| Blue | `#2A6AA8` (logo blue `#4F83B2`) |
| Green | `#4D966F` |
| Light neutral | `#F4F7F9` |
| Display font | **Fraunces** (self-hosted, OFL) |
| Body font | **Inter** (self-hosted, OFL) |

- 60-30-10 colour rule; navy structure, blue CTAs, green as a restrained accent.
- 8pt spacing grid, fluid type scale, AA-contrast palette.
- Inline **Lucide** SVG icons (1.6px stroke) — no icon fonts.
- Photography from **Pexels**, optimised to WebP (`assets/img/CREDITS.md`).

## Pages & templates

| Page | Slug | Template |
|---|---|---|
| Home | `/` | `front-page.php` |
| About Us | `/about/` | `template-about.php` |
| Our Services | `/services/` | `template-services.php` |
| For Schools & Institutions | `/schools/` | `template-schools.php` |
| For Students & Parents | `/students-parents/` | `template-students-parents.php` |
| For Businesses & Organisations | `/businesses/` | `template-business.php` |
| For Sports Organisations | `/sports/` | `template-sports.php` |
| Contact Us | `/contact/` | `template-contact.php` |
| Training & Programmes | `/training/` | `template-training.php` |
| Resources (blog) | `/resources/` | `index.php` / `single.php` |
| Individual events | `/events/{slug}/` | `single-event.php` |

Page templates are selectable in the editor under **Template** (right-hand
"Page" panel).

## Events (Training & Programmes)

The theme registers an **"Event" custom post type** so the client can create
in-person and online events themselves — **Events → Add New** — with:

- **Type** — In-person / Online (location and video-link fields swap automatically)
- **Date**, **start/end time**
- **Recurrence** — One-off / Weekly / Monthly (+ optional "repeats until")
- **Location** (in-person) or **Video call link** (online)

Events appear automatically on the Training & Programmes page, sorted by
date, split into **Upcoming** and **Past**, with an In-person/Online badge.
Each event has an "Enquire" button that pre-fills the contact form.

## Contact form

Self-contained (no plugin) with honeypot + nonce + sanitisation
(`inc/contact-form.php`). It sends via `wp_mail()` — configure an **SMTP
plugin or transactional email provider** in production.

## Global brand values

Edit once in `functions.php` → `apex_brand()`: site name, tagline, email,
phone, and WhatsApp number. Footer social links live in `footer.php`.

## Demo content

`setup/seed.php` creates the sample pages, the primary menu, and example
events. It is idempotent and can be run in WordPress Playground or via
WP-CLI (`wp eval-file setup/seed.php`).

## Credits

- **Photography** — Pexels (Pexels License). Full list: `assets/img/CREDITS.md`
- **Icons** — Lucide (ISC License)
- **Fonts** — Fraunces & Inter (SIL Open Font License 1.1), self-hosted
- **Logo** — supplied by Apex LearnSphere

## License

GPL-2.0-or-later (see `style.css`).
