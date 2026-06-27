import { test, expect } from '@playwright/test';

test.beforeEach(async ({ page }) => {
  await page.goto('/kitchen.html');
});

test('dropdown opens and closes', async ({ page }) => {
  const item = page.getByTestId('dropdown-item');
  await expect(item).toBeHidden();
  await page.getByTestId('dropdown-trigger').click();
  await expect(item).toBeVisible();
  // click outside closes
  await page.mouse.click(5, 5);
  await expect(item).toBeHidden();
});

test('tabs switch panels', async ({ page }) => {
  await expect(page.getByTestId('panel-0')).toBeVisible();
  await expect(page.getByTestId('panel-1')).toBeHidden();
  await page.getByRole('tab', { name: 'Due' }).click();
  await expect(page.getByTestId('panel-1')).toBeVisible();
  await expect(page.getByTestId('panel-0')).toBeHidden();
});

test('accordion toggles open', async ({ page }) => {
  const item = page.getByTestId('accordion-item');
  await expect(item).not.toHaveJSProperty('open', true);
  await item.getByText('Sezione A').click();
  await expect(item).toHaveJSProperty('open', true);
  await expect(page.getByText('Contenuto A')).toBeVisible();
});

test('modal opens and closes', async ({ page }) => {
  await expect(page.getByTestId('modal-body')).toBeHidden();
  await page.getByTestId('modal-trigger').click();
  await expect(page.getByTestId('modal-body')).toBeVisible();
  await page.keyboard.press('Escape');
  await expect(page.getByTestId('modal-body')).toBeHidden();
});

test('toast appears when triggered', async ({ page }) => {
  await page.getByTestId('toast-trigger').click();
  await expect(page.getByText('Salvato')).toBeVisible();
  await expect(page.getByText('Tutto a posto.')).toBeVisible();
});

test('command palette opens via button and via ⌘K', async ({ page }) => {
  await page.getByTestId('command-trigger').click();
  await expect(page.getByPlaceholder('Cerca comandi…')).toBeVisible();
  await page.keyboard.press('Escape');
  await expect(page.getByPlaceholder('Cerca comandi…')).toBeHidden();

  // keyboard shortcut
  await page.keyboard.press('Control+k');
  await expect(page.getByPlaceholder('Cerca comandi…')).toBeVisible();

  // filtering narrows the list
  await page.getByPlaceholder('Cerca comandi…').fill('CRM');
  await expect(page.getByText('Apri il CRM')).toBeVisible();
  await expect(page.getByText('Vai alla Dashboard')).toBeHidden();
});

test('theme toggle switches appearance', async ({ page }) => {
  const state = page.getByTestId('theme-state');
  await page.getByTestId('theme-toggle').click();
  await expect.poll(async () => page.evaluate(() => document.documentElement.classList.contains('light'))).toBe(true);
});

test('autocomplete filters options', async ({ page }) => {
  const input = page.getByTestId('autocomplete').getByRole('textbox');
  await input.click();
  await input.fill('Mil');
  await expect(page.getByText('Milano')).toBeVisible();
  await expect(page.getByText('Napoli')).toBeHidden();
});
