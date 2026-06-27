/**
 * Capture a PNG of every [data-shot] tile on the gallery demo page into
 * docs/assets/components/, for embedding in the documentation.
 *
 * Prereqs: `npm run build:demos` (renders playwright/dist) and a static server
 * for that directory. Run via `npm run shots` which orchestrates both.
 *
 *   BASE_URL=http://127.0.0.1:4178 node playwright/screenshots.mjs
 */
import { chromium } from '@playwright/test';
import { fileURLToPath } from 'node:url';
import { dirname, join } from 'node:path';
import { mkdirSync } from 'node:fs';

const __dirname = dirname(fileURLToPath(import.meta.url));
const base = process.env.BASE_URL || 'http://127.0.0.1:4178';
const outDir = join(__dirname, '..', 'docs', 'assets', 'components');
mkdirSync(outDir, { recursive: true });

const browser = await chromium.launch();
const ctx = await browser.newContext({ deviceScaleFactor: 2 });
const page = await ctx.newPage();

await page.goto(`${base}/gallery.html`, { waitUntil: 'networkidle' });
// Freeze animations so captures are crisp and deterministic.
await page.addStyleTag({ content: '*,*::before,*::after{animation:none !important;transition:none !important}' });
await page.evaluate(() => document.fonts && document.fonts.ready);
await page.waitForTimeout(400);

const tiles = await page.$$('[data-shot]');
let n = 0;
for (const tile of tiles) {
  const name = await tile.getAttribute('data-shot');
  await tile.screenshot({ path: join(outDir, `${name}.png`) });
  console.log('captured', `${name}.png`);
  n++;
}
console.log(`\n${n} screenshots written to docs/assets/components/`);

await browser.close();
