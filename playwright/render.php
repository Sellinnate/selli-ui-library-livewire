<?php

/**
 * Build the static Selli UI demo site that the Playwright suite runs against.
 *
 * Boots a throwaway Testbench application (so the package's `selli` view
 * namespace + components resolve), bundles the design-system CSS, copies the
 * Alpine helper bundle, and renders each example page into playwright/dist/.
 *
 * Run with:  php playwright/render.php
 */

require __DIR__.'/../vendor/autoload.php';

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;

$app = \Orchestra\Testbench\Foundation\Application::create(
    basePath: \Orchestra\Testbench\package_path('vendor/orchestra/testbench-core/laravel'),
    options: ['extra' => ['providers' => [\Selli\Ui\SelliUiServiceProvider::class]]],
);

$root = dirname(__DIR__);
$dist = __DIR__.'/dist';
if (! is_dir($dist)) {
    mkdir($dist, 0777, true);
}

// ── 1. CSS bundle (token layers in cascade order, then components) ──
$cssOrder = [
    'tokens/fonts.css', 'tokens/colors.css', 'tokens/typography.css',
    'tokens/spacing.css', 'tokens/effects.css', 'tokens/density.css',
    'tokens/base.css', 'components.css',
];
$css = '';
foreach ($cssOrder as $file) {
    $css .= "\n/* === {$file} === */\n".file_get_contents("{$root}/resources/css/{$file}");
}
file_put_contents("{$dist}/selli-ui.css", $css);

// ── 2. JS: Selli helpers + Alpine ──
copy("{$root}/resources/js/selli-ui.js", "{$dist}/selli-ui.js");
$alpine = "{$root}/node_modules/alpinejs/dist/cdn.min.js";
if (file_exists($alpine)) {
    copy($alpine, "{$dist}/alpine.js");
} else {
    fwrite(STDERR, "WARNING: alpinejs not found in node_modules; run `npm install` first.\n");
}

// ── 3. Render each page wrapped in a self-contained HTML document ──
$wrap = function (string $title, string $body): string {
    return <<<HTML
<!doctype html>
<html lang="it" class="dark">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{$title} · Selli UI</title>
  <link rel="stylesheet" href="selli-ui.css">
  <script defer src="selli-ui.js"></script>
  <script defer src="alpine.js"></script>
</head>
<body>
{$body}
</body>
</html>
HTML;
};

$pages = [
    'dashboard' => 'Dashboard',
    'crm' => 'CRM',
    'settings' => 'Impostazioni',
    'kitchen' => 'Kitchen sink',
];

foreach ($pages as $view => $title) {
    $body = View::make("selli::examples.{$view}")->render();
    file_put_contents("{$dist}/{$view}.html", $wrap($title, $body));
    echo "rendered {$view}.html\n";
}

// Simple index for convenience.
$index = '<!doctype html><html class="dark"><head><meta charset="utf-8"><link rel="stylesheet" href="selli-ui.css"><title>Selli UI demos</title></head><body style="padding:40px;font-family:var(--font-sans);"><h1>Selli UI · demo pages</h1><ul>';
foreach ($pages as $view => $title) {
    $index .= "<li><a href=\"{$view}.html\">{$title}</a></li>";
}
$index .= '</ul></body></html>';
file_put_contents("{$dist}/index.html", $index);

echo "Done → {$dist}\n";
