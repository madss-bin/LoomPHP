import fs from 'fs'
const key = process.argv[2] || 'PORT'
const fallback = process.argv[3] || '8000'

if (process.env[key]) {
  console.log(process.env[key])
  process.exit(0)
}

try {
  const env = fs.readFileSync('.env', 'utf8')
  const m = env.match(new RegExp(`^${key}=(.+)`, 'm'))
  if (m) {
    console.log(m[1].trim().replace(/^['"]|['"]$/g, ''))
    process.exit(0)
  }
} catch {}

console.log(fallback)
