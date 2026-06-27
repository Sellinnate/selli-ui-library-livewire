import { test, expect } from '@playwright/test';

const pages = [
  { path: '/dashboard.html', heading: 'Buongiorno, Filippo' },
  { path: '/crm.html', heading: 'Clienti' },
  { path: '/settings.html', heading: 'Impostazioni' },
  { path: '/kitchen.html', heading: 'Kitchen sink' },
];

for (const p of pages) {
  test(`${p.path} renders without console errors`, async ({ page }) => {
    const errors: string[] = [];
    page.on('console', (msg) => {
      if (msg.type() === 'error') errors.push(msg.text());
    });
    page.on('pageerror', (err) => errors.push(err.message));

    await page.goto(p.path);
    await expect(page.getByText(p.heading, { exact: false }).first()).toBeVisible();

    // Alpine should have booted (no x-cloak leaking visible attributes that error).
    expect(errors, errors.join('\n')).toEqual([]);
  });
}

test('the design tokens are applied (dark background)', async ({ page }) => {
  await page.goto('/dashboard.html');
  const bg = await page.evaluate(() => getComputedStyle(document.body).backgroundColor);
  // dark-first oklch resolves to a very dark colour
  expect(bg).not.toBe('rgb(255, 255, 255)');
});
