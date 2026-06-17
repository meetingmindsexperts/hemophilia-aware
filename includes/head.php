<?php
/**
 * head.php — shared <head>, Tailwind (Play CDN) brand config, fonts, base styles.
 * Expects $w (current webinar array) to be set, and optionally $page_title.
 */
declare(strict_types=1);

$pageTitle = $page_title
    ?? trim(($w['title'] ?? 'Hemophilia') . ' ' . ($w['title_accent'] ?? 'Awareness Series'));
$metaDesc = $w['lede'] ?? 'An educational webinar series raising awareness and understanding of hemophilia care.';
?>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle) ?> · Hemophilia Awareness Series</title>
    <meta name="description" content="<?= htmlspecialchars($metaDesc) ?>">

    <!-- Open Graph -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?= htmlspecialchars($pageTitle) ?>">
    <meta property="og:description" content="<?= htmlspecialchars($metaDesc) ?>">
    <?php if (!empty($w['banner'])): ?>
    <meta property="og:image" content="<?= htmlspecialchars($w['banner']) ?>">
    <?php endif; ?>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com?plugins=forms"></script>
    <script>
      // Brand tokens from the official Hemophilia Awareness Series identity guide.
      tailwind.config = {
        theme: {
          extend: {
            colors: {
              // Soft Ivory
              ivory:    { DEFAULT: '#F7F3EA', 50: '#FCFAF4', 100: '#F7F3EA', 200: '#EFE8D7' },
              // Deep Navy
              navy:     { DEFAULT: '#0B1F3A', 700: '#102a4e', 600: '#163661' },
              // Patient Blue
              royal:    { DEFAULT: '#2E6F95', 500: '#2E6F95', 400: '#4A89AE', 300: '#7FAAC6' },
              patient:  { DEFAULT: '#2E6F95' },
              // Teal
              teal:     { DEFAULT: '#1AA3A3', 400: '#3FB8B8' },
              // Warm Gold
              gold:     { DEFAULT: '#C9A96E', 600: '#B8954F', 400: '#D8BE8C' },
              // Charcoal
              charcoal: { DEFAULT: '#1F2933' },
              sky:      { DEFAULT: '#9CC3E8', light: '#D9E7F1' },
            },
            fontFamily: {
              sans: ['Montserrat', 'system-ui', 'sans-serif'],
            },
            maxWidth: { '7xl': '80rem' },
            keyframes: {
              floaty:   { '0%,100%': { transform: 'translateY(0)' }, '50%': { transform: 'translateY(-6px)' } },
              fadeUp:   { '0%': { opacity: 0, transform: 'translateY(14px)' }, '100%': { opacity: 1, transform: 'translateY(0)' } },
            },
            animation: {
              floaty: 'floaty 6s ease-in-out infinite',
              fadeUp: 'fadeUp .6s ease-out both',
            },
          },
        },
      };
    </script>

    <style>
      :root { color-scheme: light; }
      body { background-color: #F7F3EA; }

      /* Layered wave backdrop (CSS-only, echoes the brand ribbon motif). */
      .wave-band { position: absolute; inset-inline: 0; bottom: 0; line-height: 0; pointer-events: none; }
      .wave-band svg { width: 100%; height: auto; display: block; }

      /* The arc / comet motif, top-left of hero. */
      .brand-arc { background: conic-gradient(from 210deg at 30% 70%,
                   #0B1F3A 0deg, #2E6F95 40deg, #4A89AE 70deg, #1AA3A3 95deg, #C9A96E 120deg, transparent 140deg); }

      /* Honour reduced-motion. */
      @media (prefers-reduced-motion: reduce) {
        .animate-floaty, .animate-fadeUp { animation: none !important; }
        html { scroll-behavior: auto; }
      }

      /* Visible, on-brand focus ring everywhere. */
      a:focus-visible, button:focus-visible, input:focus-visible,
      select:focus-visible, textarea:focus-visible, [tabindex]:focus-visible {
        outline: 3px solid #2E6F95; outline-offset: 2px; border-radius: 4px;
      }

      .text-balance { text-wrap: balance; }
    </style>
</head>
