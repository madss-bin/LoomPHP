export function writable(initial) {
  let value = initial
  const subs = new Set()

  return {
    subscribe(fn) {
      fn(value)
      subs.add(fn)
      return () => subs.delete(fn)
    },
    set(v) {
      value = v
      subs.forEach(fn => fn(value))
    },
    update(fn) {
      this.set(fn(value))
    },
    get value() {
      return value
    },
  }
}

export function derived(stores, fn) {
  const single = !Array.isArray(stores)
  const sources = single ? [stores] : stores

  let value = fn(...sources.map(s => s.value))
  const subs = new Set()

  const recompute = () => {
    const next = fn(...sources.map(s => s.value))
    if (next !== value) {
      value = next
      subs.forEach(fn => fn(value))
    }
  }

  sources.forEach(s => s.subscribe(recompute))

  return {
    subscribe(fn) {
      fn(value)
      subs.add(fn)
      return () => subs.delete(fn)
    },
    get value() {
      return value
    },
  }
}
