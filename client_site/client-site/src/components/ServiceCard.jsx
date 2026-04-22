/**
 * ServiceCard — one service; title and body from props (reusable with .map()).
 * Kenneth Avendano — 2026-04-22
 */

export default function ServiceCard({ title, description }) {
  return (
    <article className="service-card">
      <h2>{title}</h2>
      <p>{description}</p>
    </article>
  )
}
