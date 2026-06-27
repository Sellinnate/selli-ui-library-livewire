import { test, expect } from '@playwright/test';

test.beforeEach(async ({ page }) => {
  await page.goto('/kitchen.html');
});

test('dropdown is fully keyboard operable', async ({ page }) => {
  const trigger = page.getByTestId('dropdown-trigger');
  await trigger.focus();
  await page.keyboard.press('Enter'); // opens
  await expect(page.getByTestId('dropdown-item')).toBeVisible();

  // ArrowDown moves focus into the menu items
  await page.keyboard.press('ArrowDown');
  const focusedRole = await page.evaluate(() => document.activeElement?.getAttribute('role'));
  expect(focusedRole).toBe('menuitem');

  // Escape closes and returns focus to the trigger
  await page.keyboard.press('Escape');
  await expect(page.getByTestId('dropdown-item')).toBeHidden();
});

test('modal traps focus and restores it on close', async ({ page }) => {
  const trigger = page.getByTestId('modal-trigger');
  await trigger.click();
  await expect(page.getByTestId('modal-body')).toBeVisible();

  // focus is inside the dialog
  const insideAfterOpen = await page.evaluate(() => !!document.activeElement?.closest('.selli-modal__panel'));
  expect(insideAfterOpen).toBe(true);

  // tabbing repeatedly keeps focus within the dialog (focus trap)
  for (let i = 0; i < 6; i++) await page.keyboard.press('Tab');
  const stillInside = await page.evaluate(() => !!document.activeElement?.closest('.selli-modal__panel'));
  expect(stillInside).toBe(true);

  // Escape closes and returns focus to the opener
  await page.keyboard.press('Escape');
  await expect(page.getByTestId('modal-body')).toBeHidden();
  await expect(trigger).toBeFocused();
});

test('tabs move with arrow keys', async ({ page }) => {
  const first = page.getByRole('tab', { name: 'Uno' });
  await first.focus();
  await page.keyboard.press('ArrowRight');
  await expect(page.getByTestId('panel-1')).toBeVisible();
  await expect(page.getByRole('tab', { name: 'Due' })).toBeFocused();

  await page.keyboard.press('Home');
  await expect(page.getByTestId('panel-0')).toBeVisible();
});
