// Kenneth Avendano
// 4/22/2026
// Home page region labels from props.

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
