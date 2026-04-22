import { Outlet } from 'react-router-dom'
import { navLinks } from '../data/navLinks.js'
import SiteHeader from './SiteHeader.jsx'
import SiteFooter from './SiteFooter.jsx'

export default function SiteLayout() {
  return (
    <>
      <SiteHeader links={navLinks} />
      <div className="site-main">
        <Outlet />
      </div>
      <SiteFooter />
    </>
  )
}
