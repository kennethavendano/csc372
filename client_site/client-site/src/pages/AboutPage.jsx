/**
 * AboutPage — about copy (static HTML files were empty on v2; content matches site tone).
 * Kenneth Avendano — 2026-04-22
 */

import PageHeading from '../components/PageHeading.jsx'

export default function AboutPage() {
  return (
    <main className="about-page">
      <PageHeading title="About" />
      <p>
        Ichacaps focuses on authentic moments—whether it is a championship game, a
        graduation portrait, or a packed dance floor. The goal is simple: images
        that feel like you were there again.
      </p>
      <p style={{ marginTop: '16px' }}>
        Based in Rhode Island, sessions and events are scheduled across RI, MA, and
        CT. Reach out through Book Now to share your date, location, and what you
        want remembered.
      </p>
    </main>
  )
}
