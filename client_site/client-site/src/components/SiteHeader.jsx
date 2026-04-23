// Kenneth Avendano
// 4/22/2026
// Top bar with logo, nav, and mobile menu toggle.

import { useState } from 'react'
import { Link } from 'react-router-dom'
import SiteNav from './SiteNav.jsx'

export default function SiteHeader({ links }) {
  const [menuOpen, setMenuOpen] = useState(false) // small screens: show/hide nav links

  const closeMenu = () => setMenuOpen(false)

  return (
    <header>
      <nav aria-label="Main">
        <div>
          <Link to="/" onClick={closeMenu}>
            <img
              src="/IchacapsLogo.png"
              alt="Ichacaps"
              className="logo-img"
            />
          </Link>
        </div>
        <SiteNav
          links={links}
          isOpen={menuOpen}
          onNavigate={closeMenu}
        />
        <div className="nav-actions">
          <button
            type="button"
            className="nav-toggle"
            aria-expanded={menuOpen}
            aria-controls="primary-navigation"
            onClick={() => setMenuOpen((open) => !open)}
          >
            Menu
          </button>
          <div className="btn">
            <Link to="/book" className="book-btn" onClick={closeMenu}>
              Book Now
            </Link>
          </div>
        </div>
      </nav>
    </header>
  )
}
