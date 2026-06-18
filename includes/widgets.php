<?php
/**
 * widgets.php — BigMarker "register widget" embed snippets per webinar.
 *
 * Each session has a dedicated register page at /{slug}/register that embeds the
 * BigMarker form widget below. Paste the BigMarker-provided embed code (the
 * <div>…</div><script…></script> pair) for each session here. Leave a slug out
 * (or null) and its register CTA falls back to "Registration opening soon".
 *
 * Stored as nowdoc strings so the embed's & and $ characters are preserved verbatim.
 */
declare(strict_types=1);

function register_widgets(): array
{
    return [
        'patient' => <<<'HTML'
<div id="bigmarker-conference-widget-container8c7c6552ebc5"></div><script src="https://www.bigmarker.com/widget/register_widget.js?club=medulive&conference=8c7c6552ebc5&widget_type=form_register&series_register=&upcoming_sub_title=&live_sub_title=&rec_sub_title=&upcoming_button_text=&live_button_text=&rec_button_text=&link_to_channel=true&form_type=all_fields&widget_width=600&widget_height=0&enable_iframe=false&background_color=ffffff&btext_color=2d374d&link_color=1089f5&ltext_color=ffffff&redirect_to_confirmation_page=0&widget_button_registered_content=&widget_webinar_descriptions=&widget_redirect_type=no_redirect&cid=100c694fa34c" type="text/javascript"></script>
HTML,
        'nurses' => <<<'HTML'
<div id="bigmarker-conference-widget-containerd5c510256cf2"></div><script src="https://www.bigmarker.com/widget/register_widget.js?club=medulive&conference=d5c510256cf2&widget_type=form_register&series_register=&upcoming_sub_title=&live_sub_title=&rec_sub_title=&upcoming_button_text=&live_button_text=&rec_button_text=&link_to_channel=true&form_type=all_fields&widget_width=600&widget_height=0&enable_iframe=false&background_color=ffffff&btext_color=2d374d&link_color=1089f5&ltext_color=ffffff&redirect_to_confirmation_page=0&widget_button_registered_content=&widget_webinar_descriptions=&widget_redirect_type=no_redirect&cid=100c694fa34c" type="text/javascript"></script>
HTML,
        'physician' => <<<'HTML'
<div id="bigmarker-conference-widget-container0edd4739eb30"></div><script src="https://www.bigmarker.com/widget/register_widget.js?club=medulive&conference=0edd4739eb30&widget_type=form_register&series_register=&upcoming_sub_title=&live_sub_title=&rec_sub_title=&upcoming_button_text=&live_button_text=&rec_button_text=&link_to_channel=true&form_type=all_fields&widget_width=600&widget_height=0&enable_iframe=false&background_color=ffffff&btext_color=2d374d&link_color=1089f5&ltext_color=ffffff&redirect_to_confirmation_page=0&widget_button_registered_content=&widget_webinar_descriptions=&widget_redirect_type=no_redirect&cid=100c694fa34c" type="text/javascript"></script>
HTML,
    ];
}

/** The BigMarker widget embed HTML for a webinar, or null if not configured. */
function register_widget(array $w): ?string
{
    return register_widgets()[$w['slug']] ?? null;
}

/** Internal register-page link (/{slug}/register) if a widget exists, else null. */
function register_link(array $w): ?string
{
    return register_widget($w) ? '/' . $w['slug'] . '/register' : null;
}
