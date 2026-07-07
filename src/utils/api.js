const token = () => document.querySelector('[name="_csrf_token"]')?.value

export async function api(url, options = {}) {
  const res = await fetch(url, {
    headers: {
      Accept: 'application/json',
      'X-CSRF-Token': token() ?? '',
      ...options.headers,
    },
    ...options,
  })
  if (!res.ok) {
    const body = await res.json().catch(() => ({}))
    throw new Error(body.error || `HTTP ${res.status}`)
  }
  return res.json()
}
