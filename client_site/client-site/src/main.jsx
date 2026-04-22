/**
 * main.jsx — React entry; loads global styles for the client site.
 * Kenneth Avendano — 2026-04-22
 */

import { StrictMode } from 'react'
import { createRoot } from 'react-dom/client'
import './index.css'
import './styles/client-site.css'
import App from './App.jsx'

createRoot(document.getElementById('root')).render(
  <StrictMode>
    <App />
  </StrictMode>,
)
