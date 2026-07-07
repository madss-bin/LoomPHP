#!/usr/bin/env node
import { spawn } from 'child_process';
import { fileURLToPath } from 'url';
import path from 'path';
import { readFileSync } from 'fs';

function getEnvValue(key, fallback) {
  if (process.env[key]) {
    return process.env[key];
  }
  try {
    const env = readFileSync(path.resolve('.env'), 'utf8');
    const match = env.match(new RegExp(`^${key}=(.+)`, 'm'));
    if (match) {
      return match[1].trim().replace(/^['"]|['"]$/g, '');
    }
  } catch {}
  return fallback;
}

const __dirname = path.dirname(fileURLToPath(import.meta.url));

const port = getEnvValue('PORT', '8000');
const isProduction = process.env.APP_ENV === 'production';
const host = isProduction ? '0.0.0.0' : 'localhost';

// Add .local/bin to PATH for Windows, macOS, and Linux
const originalPath = process.env.PATH || '';
const homeDir = process.env.HOME || process.env.USERPROFILE;
const localBin = path.resolve(homeDir, '.local/bin');
const pathSeparator = process.platform === 'win32' ? ';' : ':';
process.env.PATH = `${localBin}${pathSeparator}${originalPath}`;

const phpCmd = process.platform === 'win32' ? 'php.exe' : 'php';
const args = [
  '-S',
  `${host}:${port}`,
  '-t',
  'public',
  'public/router.php'
];

if (!isProduction) {
  console.log(`⚡ PHP on http://localhost:${port}`);
}

const phpProcess = spawn(phpCmd, args, {
  stdio: 'inherit'
});

phpProcess.on('error', (err) => {
  console.error('Failed to start PHP server:', err);
  process.exit(1);
});
