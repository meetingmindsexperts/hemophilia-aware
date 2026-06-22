<?php
/**
 * data.php — single source of truth for the Hemophilia Awareness Webinar Series.
 *
 * Three audience-specific webinars share one template; everything that differs
 * between them lives here. Add/adjust content in this file only.
 *
 * Hosting note (from brief):
 *   - Patient  + Nurses   → hosted under the EOHNS website
 *   - Physician          → hosted under the ESH website
 */

declare(strict_types=1);

require_once __DIR__ . '/widgets.php';

/** Per-organisation theming (logos are placeholders until official assets arrive). */
const ORGS = [
    'EOHNS' => [
        'short'    => 'EOHNS',
        'name'     => 'Emirates Oncology & Hematology Nursing Society',
        'role'     => 'Endorsed by',
    ],
    'ESH' => [
        'short'    => 'ESH',
        'name'     => 'Emirates Society of Haematology',
        'role'     => 'Endorsed by',
    ],
];

/**
 * Contact / "Need assistance" details.
 * Placeholders — confirm the real support inbox & number before launch.
 */
const CONTACT = [
    'email'       => 'virtual@meetingmindsexperts.com',
    'phone'       => '+971 4 276 1444',
    'phone_human' => '+971 4 276 1444',
    'phone_hours' => 'Available Mon – Fri, 9:00 AM – 6:00 PM',
    'subscribe'   => 'https://meetingmindsgroup.us10.list-manage.com/subscribe?u=47d2f8c99b0099ed1b863db29&id=20983732e8',
    'website'     => 'https://www.meetingmindsexperts.com',
];

/**
 * Render a partner logo: the real image if the file exists under the project root,
 * otherwise a styled text fallback. Drop esh-logo.png / mme-logo.png / sanofi-logo.png
 * into assets/img/ and they replace the placeholders automatically.
 */
function logo_tag(string $file, string $alt, string $fallback, string $imgClass = 'max-h-12 w-auto', string $fallbackClass = 'font-extrabold text-navy'): string
{
    $abs = dirname(__DIR__) . '/' . ltrim($file, '/');
    if (is_file($abs)) {
        return '<img src="/' . htmlspecialchars(ltrim($file, '/')) . '" alt="' . htmlspecialchars($alt) . '" class="' . $imgClass . '" loading="lazy">';
    }
    return '<span class="' . $fallbackClass . '">' . htmlspecialchars($fallback) . '</span>';
}

/** Four quick value propositions shown under the hero (reference-site pattern). */
function value_props(bool $cme = true, array $endorsers = ['ESH', 'EOHNS']): array
{
    return [
        ['Expert UAE Faculty',  'Led by regional hematology specialists.', 'users'],
        $cme
            ? ['CME Accredited',          'Earn credits toward your professional development.', 'badge']
            : ['Endorsed by ' . implode(' &amp; ', $endorsers), 'Backed by the region&rsquo;s haematology societies.', 'badge'],
        ['Audience-Specific',   'Tailored content for your role and needs.', 'target'],
        ['Free &amp; Fully Virtual', 'Join live from anywhere, no cost to attend.', 'globe'],
    ];
}

/**
 * BigMarker registration (redirect model — no embedded form).
 * Set `conference_url` to the public BigMarker registration page for each webinar.
 * Every "Register" CTA links out to it (new tab). Leave null to show the styled
 * "registration opening soon" fallback.
 */
function webinars(): array
{
    return [
        // ───────────────────────────── PATIENT ─────────────────────────────
        'patient' => [
            'slug'        => 'patient',
            'host_org'    => 'EOHNS',
            'audience'    => 'Patients & Caregivers',
            'cme'         => false,
            'endorsers'   => ['ESH', 'EOHNS'],
            'series_tag'  => 'Patient Awareness Webinar',
            'logo'        => 'assets/img/logo-patient.png', // "A New Era of Care" logo (patient only)
            'title'       => 'Hemophilia:',
            'title_accent'=> 'A New Era of Care',
            'lede'        => 'A patient-focused session on what modern hemophilia care means for everyday life, from preventing bleeds to living fully, wherever you are on your journey.',
            'date_iso'    => '2026-07-03',
            'start_iso'   => '2026-07-03T19:30:00+04:00',
            'date_human'  => '3 July 2026',
            'day_name'    => 'Friday',
            'time_human'  => '07:30 PM',
            'tz'          => 'GMT +4 (UAE Time)',
            'time_range'  => '07:30 – 09:30 PM',
            'duration'    => '2 hours',
            'format'      => 'Virtual Webinar',
            'banner'      => 'assets/img/banner-patient.jpg',
            'keyvisual'   => 'assets/img/keyvisual-patient.jpg',
            'bigmarker'   => [
                'conference_url' => 'https://www.bigmarker.com/medulive/hemophilia-a-new-era-of-care?show_live_page=true',
            ],
            'highlights'  => [
                ['Understand where care stands today', 'See the current gaps in hemophilia care and what genuine, lasting protection really means.'],
                ['From treating bleeds to preventing them', 'How the goals of hemophilia care have shifted toward prevention and protection.'],
                ['Beyond factor therapy', 'A plain-language overview of emerging treatments for all types of hemophilia, with and without inhibitors.'],
                ['Care that fits your life', 'Adherence, travel, lifestyle, and shared decisions you make together with your care team.'],
            ],
            'agenda'      => [
                ['07:30', '07:35', 'Opening Remarks', '', ['Khaled Habaybah']],
                ['07:35', '07:55', 'Living with Hemophilia, Where Are We Today', 'Understanding the current gaps in care and what true protection means.', ['Khaled Habaybah']],
                ['07:55', '08:20', 'Redefining Protection', 'From treating bleeds to preventing them, how the goals of hemophilia care have evolved.', ['Khaled Habaybah', 'Khaled Qawasmeh']],
                ['08:20', '08:45', 'Beyond Factor Therapy', 'Emerging treatment approaches and what they mean for patients with all types of hemophilia.', ['Khaled Qawasmeh']],
                ['08:45', '09:10', 'What Modern Treatment Means for My Life', 'Adherence, lifestyle, travel, and shared decision-making with your care team.', ['All Faculty']],
                ['09:10', '09:30', 'Panel Discussion & Q&A', '', ['All Faculty']],
            ],
            'faculty'     => ['khaled-habaybah', 'khaled-qawasmeh'],
        ],

        // ───────────────────────────── NURSES ──────────────────────────────
        'nurses' => [
            'slug'        => 'nurses',
            'host_org'    => 'EOHNS',
            'audience'    => 'Nurses',
            'cme'         => true,
            'endorsers'   => ['ESH', 'EOHNS'],
            'series_tag'  => 'Hemophilia Awareness Series',
            'logo'        => 'assets/img/logo-series.png', // shared "Awareness Series" logo (nurses + physician)
            'title'       => 'Hemophilia',
            'title_accent'=> 'Awareness Series',
            'lede'        => 'A practical session for nurses on the shifting balance of hemostasis, emerging non-factor therapies, and confident, scenario-based patient counseling.',
            'date_iso'    => '2026-07-04',
            'start_iso'   => '2026-07-04T10:00:00+04:00',
            'date_human'  => '4 July 2026',
            'day_name'    => 'Saturday',
            'time_human'  => '10:00 AM',
            'tz'          => 'GMT +4 (UAE Time)',
            'time_range'  => '10:00 AM – 12:00 PM',
            'duration'    => '2 hours',
            'format'      => 'Virtual Webinar',
            'banner'      => 'assets/img/banner-patient.jpg',
            'keyvisual'   => 'assets/img/keyvisual-patient.jpg',
            'bigmarker'   => [
                'conference_url' => null,
            ],
            'highlights'  => [
                ['Hemophilia today', 'Setting the balance in hemostasis, the foundation every nurse needs.'],
                ['Emerging treatments', 'Mechanisms of action and the clinical data behind non-factor therapies.'],
                ['Managing patients on non-factors', 'Practical considerations for day-to-day patient management.'],
                ['Counseling scenarios', 'An interactive activity working through real patient counseling situations.'],
            ],
            'agenda'      => [
                ['10:00', '10:05', 'Opening Remarks', '', ['Khaled Habaybah']],
                ['10:05', '10:20', 'Hemophilia Today: Setting the Balance in Hemostasis', '', ['Khaled Habaybah']],
                ['10:20', '10:45', 'Emerging Treatments', 'Mechanisms of action and clinical data.', ['Khaled Qawasmeh']],
                ['10:45', '11:10', 'Managing Patients on Non-Factors', '', ['Khaled Habaybah', 'Khaled Qawasmeh']],
                ['11:10', '11:50', 'Interactive Activity: Patient Counseling Scenarios', '', ['All Faculty']],
                ['11:50', '12:00', 'Key Takeaways & Closing Remarks', '', ['All Faculty']],
            ],
            'faculty'     => ['khaled-habaybah', 'khaled-qawasmeh'],
        ],

        // ──────────────────────────── PHYSICIAN ────────────────────────────
        'physician' => [
            'slug'        => 'physician',
            'host_org'    => 'ESH',
            'audience'    => 'Physician & HCPs',
            'cme'         => true,
            'endorsers'   => ['ESH', 'EOHNS'],
            'series_tag'  => 'Hemophilia Awareness Series',
            'logo'        => 'assets/img/logo-series.png', // shared "Awareness Series" logo (nurses + physician)
            'title'       => 'Hemophilia',
            'title_accent'=> 'Awareness Series',
            'lede'        => 'A clinical deep-dive for physicians: the evolving hemophilia landscape, the era of non-factor therapies, emergencies, and perioperative management.',
            'date_iso'    => '2026-07-02',
            'start_iso'   => '2026-07-02T19:30:00+04:00',
            'date_human'  => '2 July 2026',
            'day_name'    => 'Thursday',
            'time_human'  => '07:30 PM',
            'tz'          => 'GMT +4 (UAE Time)',
            'time_range'  => '07:30 – 09:30 PM',
            'duration'    => '2 hours',
            'format'      => 'Virtual Webinar',
            'banner'      => 'assets/img/banner-patient.jpg',
            'keyvisual'   => 'assets/img/keyvisual-patient.jpg',
            'agenda_pending' => true, // programme being finalised — show "being updated" notice
            'bigmarker'   => [
                'conference_url' => null,
            ],
            'highlights'  => [
                ['The clinical landscape', 'About hemophilia and where the field stands clinically today.'],
                ['The era of non-factors', 'What every physician needs to know about non-factor therapies.'],
                ['Emergencies in hemophilia', 'Recognising and managing acute, high-stakes situations.'],
                ['Perioperative management', 'Planning and managing patients through the surgical pathway.'],
            ],
            'agenda'      => [
                ['07:30', '07:35', 'Opening Remarks', '', ['Dr. Asma Al Olama']],
                ['07:35', '07:55', 'About Hemophilia and the Clinical Landscape', '', ['Dr. Mozah Al Marshoudi']],
                ['07:55', '08:15', 'The Era of Non-Factors: What Every Physician Needs to Know', '', ['Dr. Sally Al Naeem']],
                ['08:15', '08:35', 'Emergencies in Hemophilia', '', ['Dr. Mozah Al Marshoudi']],
                ['08:35', '09:00', 'Perioperative Management', '', ['Dr. Sally Al Naeem']],
                ['09:00', '09:20', 'Case-Based Discussion', '', ['All Faculty']],
                ['09:20', '09:30', 'Q&A', '', ['All Faculty']],
            ],
            'faculty'     => ['asma-al-olama', 'mozah-al-marshoudi', 'sally-al-naeem'],
        ],
    ];
}

/** Faculty directory. Bios/photos are placeholders pending speaker submission (per brief). */
function faculty_directory(): array
{
    return [
        'khaled-habaybah'   => ['name' => 'Khaled Habaybah',     'role' => 'Faculty',  'bio' => 'Hemophilia care specialist contributing across the patient and nurse sessions.', 'photo' => 'assets/img/speakers/Habaybah.jpg'],
        'khaled-qawasmeh'   => ['name' => 'Khaled Qawasmeh',     'role' => 'Faculty',  'bio' => 'Focused on emerging treatments and non-factor therapy management.', 'photo' => 'assets/img/speakers/khalid.jpg'],
        'asma-al-olama'     => ['name' => 'Dr. Asma Al Olama',   'role' => 'Chair',    'bio' => 'Chairing the physician session and opening remarks.', 'photo' => 'assets/img/speakers/asma.jpg'],
        'mozah-al-marshoudi'=> ['name' => 'Dr. Mozah Al Marshoudi','role' => 'Faculty','bio' => 'Clinical landscape of hemophilia and emergency management.', 'photo' => 'assets/img/speakers/mozah.jpg'],
        'sally-al-naeem'    => ['name' => 'Dr. Sally Al Naeem',  'role' => 'Faculty',  'bio' => 'Non-factor therapies and perioperative management.', 'photo' => 'assets/img/speakers/sally.jpg'],
    ];
}

/** Fetch one webinar by slug or null. */
function get_webinar(string $slug): ?array
{
    return webinars()[$slug] ?? null;
}

/** The BigMarker registration URL to redirect to, or null if not yet configured. */
function register_url(array $w): ?string
{
    $u = $w['bigmarker']['conference_url'] ?? null;
    return $u ?: null;
}

/** Per-webinar event logo path if the file exists on disk, else null. */
function webinar_logo(array $w): ?string
{
    $f = $w['logo'] ?? null;
    return ($f && is_file(dirname(__DIR__) . '/' . ltrim($f, '/'))) ? $f : null;
}

/** Logo to display: the event logo if present, else the generic arc mark. */
function webinar_logo_src(array $w): string
{
    return '/' . ltrim(webinar_logo($w) ?? 'assets/img/logo-icon.png', '/');
}

/** Absolute base URL of the current request (scheme + host), no trailing slash. */
function base_url(): string
{
    $https  = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
            || (($_SERVER['SERVER_PORT'] ?? '') === '443')
            || (($_SERVER['HTTP_X_FORWARDED_PROTO'] ?? '') === 'https');
    $host = $_SERVER['HTTP_HOST'] ?? 'localhost';
    return ($https ? 'https' : 'http') . '://' . $host;
}

/** schema.org Event JSON-LD for a webinar (Google Event rich results). */
function event_schema(array $w, string $base): array
{
    try {
        $end = (new DateTimeImmutable($w['start_iso']))->modify('+2 hours')->format('c');
    } catch (Throwable $e) {
        $end = $w['start_iso'];
    }
    $url = $base . '/' . $w['slug'] . '.php';
    $img = $base . '/' . ($w['keyvisual'] ?? $w['banner'] ?? 'assets/img/keyvisual-patient.jpg');

    $dir = faculty_directory();
    $performers = [];
    foreach ($w['faculty'] as $id) {
        if (isset($dir[$id])) {
            $performers[] = ['@type' => 'Person', 'name' => $dir[$id]['name']];
        }
    }

    return array_filter([
        '@context'            => 'https://schema.org',
        '@type'               => 'Event',
        'name'                => trim($w['title'] . ' ' . $w['title_accent']) . ', ' . $w['audience'],
        'description'         => $w['lede'],
        'startDate'           => $w['start_iso'],
        'endDate'             => $end,
        'eventAttendanceMode' => 'https://schema.org/OnlineEventAttendanceMode',
        'eventStatus'         => 'https://schema.org/EventScheduled',
        'inLanguage'          => 'en',
        'image'               => [$img],
        'url'                 => $url,
        'location'            => ['@type' => 'VirtualLocation', 'url' => $url],
        'organizer'           => ['@type' => 'Organization', 'name' => 'Meeting Minds Experts'],
        'sponsor'             => ['@type' => 'Organization', 'name' => 'Sanofi'],
        'performer'           => $performers,
        'offers'              => [
            '@type'         => 'Offer',
            'price'         => '0',
            'priceCurrency' => 'AED',
            'availability'  => 'https://schema.org/InStock',
            'url'           => $url,
        ],
    ]);
}

/** Initials for a name, used in placeholder avatar circles. */
function initials(string $name): string
{
    $clean = preg_replace('/^(Dr\.?|Prof\.?)\s+/i', '', $name);
    $parts = preg_split('/\s+/', trim($clean));
    $first = mb_substr($parts[0] ?? '', 0, 1);
    $last  = count($parts) > 1 ? mb_substr(end($parts), 0, 1) : '';
    return mb_strtoupper($first . $last);
}
