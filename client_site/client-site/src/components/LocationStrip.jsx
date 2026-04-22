/**
 * LocationStrip — home region badges; labels passed via props.
 * Kenneth Avendano — 2026-04-22
 */

export default function LocationStrip({ regions }) {
  return (
    <section className="locations" aria-label="Service regions">
      <div className="location-grid">
        {regions.map((code) => (
          <span key={code}>{code}</span>
        ))}
      </div>
    </section>
  )
}
