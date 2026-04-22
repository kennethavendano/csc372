/**
 * SiteFooter — shared footer across routes.
 * Kenneth Avendano — 2026-04-22
 */

export default function SiteFooter() {
  return (
    <footer className="site-footer">
      <p>© {new Date().getFullYear()} Ichacaps Photography. Rhode Island &amp; surrounding areas.</p>
    </footer>
  )
}
