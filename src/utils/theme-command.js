window.toggleTheme = (event) => {
  const isDark = document.documentElement.classList.contains('dark')
  const nextDark = !isDark

  if (!document.startViewTransition) {
    document.documentElement.classList.toggle('dark', nextDark)
    localStorage.setItem('themeMode', nextDark ? 'dark' : 'light')
    return
  }

  const x = event.clientX ?? window.innerWidth / 2
  const y = event.clientY ?? window.innerHeight / 2
  const endRadius = Math.hypot(
    Math.max(x, window.innerWidth - x),
    Math.max(y, window.innerHeight - y)
  )

  const transition = document.startViewTransition(() => {
    document.documentElement.classList.toggle('dark', nextDark)
    localStorage.setItem('themeMode', nextDark ? 'dark' : 'light')
  })

  transition.ready.then(() => {
    const clipPath = [
      `circle(0px at ${x}px ${y}px)`,
      `circle(${endRadius}px at ${x}px ${y}px)`
    ]
    document.documentElement.animate(
      {
        clipPath: clipPath,
      },
      {
        duration: 450,
        easing: 'ease-in-out',
        pseudoElement: '::view-transition-new(root)',
      }
    )
  })
}

document.addEventListener('keydown', e => {
  const cmd = document.getElementById('command-palette')
  if ((e.metaKey || e.ctrlKey) && e.key === 's') {
    e.preventDefault()
    cmd?.showModal()
    return
  }
  if (cmd?.open && (e.key === 'ArrowDown' || e.key === 'ArrowUp' || e.key === 'Enter')) {
    e.preventDefault()
    const items = [...cmd.querySelectorAll('[role="menuitem"]:not([aria-disabled])')].filter(el => {
      const styles = getComputedStyle(el)
      return styles.display !== 'none' && styles.visibility !== 'hidden' && el.offsetWidth > 0 && el.offsetHeight > 0
    })
    if (!items.length) return
    const idx = items.indexOf(document.activeElement)
    if (e.key === 'ArrowDown') (items[idx + 1] || items[0]).focus()
    else if (e.key === 'ArrowUp') (items[idx - 1] || items[items.length - 1]).focus()
    else if (e.key === 'Enter' && idx !== -1) items[idx].click()
  }
})

// Wait for DOMContentLoaded to attach listeners
document.addEventListener('DOMContentLoaded', () => {
  // Theme toggle button
  const themeBtn = document.getElementById('theme-toggle')
  if (themeBtn) {
    themeBtn.addEventListener('click', (e) => toggleTheme(e))
  }

  // Command palette button
  const cmdBtn = document.getElementById('cmd-palette-btn')
  if (cmdBtn) {
    cmdBtn.addEventListener('click', () => {
      document.getElementById('command-palette')?.showModal()
    })
  }

  // Mobile menu
  const menu = document.getElementById('mobile-menu')
  const toggle = document.getElementById('menu-toggle')
  const hamburgerIcon = toggle?.querySelector('.menu-icon-hamburger')
  const closeIcon = toggle?.querySelector('.menu-icon-close')

  if (menu && toggle && hamburgerIcon && closeIcon) {
    let isOpen = false

    const updateMenuState = (open) => {
      isOpen = open
      menu.style.gridTemplateRows = open ? '1fr' : '0fr'
      menu.setAttribute('aria-hidden', String(!open))
      toggle.setAttribute('aria-expanded', String(open))
      hamburgerIcon.classList.toggle('hidden', open)
      closeIcon.classList.toggle('hidden', !open)
    }

    toggle.addEventListener('click', () => {
      updateMenuState(!isOpen)
    })

    menu.addEventListener('click', (e) => {
      if (e.target.tagName === 'A') {
        updateMenuState(false)
      }
    })
  }
})
