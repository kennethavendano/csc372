/**
 * SiteNav — primary navigation using NavLink; receives link config via props.
 * Kenneth Avendano — 2026-04-22
 */

import { NavLink } from 'react-router-dom'

export default function SiteNav({ links, isOpen, onNavigate }) {
  const listClass = isOpen ? 'nav-links open' : 'nav-links'

  return (
    <ul className={listClass} id="primary-navigation">
      {links.map(({ to, label }) => (
        <li key={to}>
          <NavLink
            to={to}
            end={to === '/'}
            className={({ isActive }) => (isActive ? 'active' : undefined)}
            onClick={onNavigate}
          >
            {label}
          </NavLink>
        </li>
      ))}
    </ul>
  )
}
