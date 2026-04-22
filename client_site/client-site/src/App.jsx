/**
 * App — React Router routes for the Ichacaps client site (Assignment 8).
 * Kenneth Avendano — 2026-04-22
 *
 * AI-assisted suggestion: Cursor was used to scaffold components, routes, and
 * form validation from the static HTML/CSS in client_site; follow your course
 * AI policy and attach your own AI documentation link if required.
 */

import { BrowserRouter, Routes, Route } from 'react-router-dom'
import SiteLayout from './components/SiteLayout.jsx'
import HomePage from './pages/HomePage.jsx'
import PortfolioPage from './pages/PortfolioPage.jsx'
import ServicesPage from './pages/ServicesPage.jsx'
import AboutPage from './pages/AboutPage.jsx'
import BookPage from './pages/BookPage.jsx'

export default function App() {
  return (
    <BrowserRouter>
      <Routes>
        <Route element={<SiteLayout />}>
          <Route path="/" element={<HomePage />} />
          <Route path="/portfolio" element={<PortfolioPage />} />
          <Route path="/services" element={<ServicesPage />} />
          <Route path="/about" element={<AboutPage />} />
          <Route path="/book" element={<BookPage />} />
        </Route>
      </Routes>
    </BrowserRouter>
  )
}
