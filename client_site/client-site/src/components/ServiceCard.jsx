// Kenneth Avendano
// 4/22/2026
// One service block; title and text from props.

export default function ServiceCard({ title, description }) {
  return (
    <article className="service-card">
      <h2>{title}</h2>
      <p>{description}</p>
    </article>
  )
}
