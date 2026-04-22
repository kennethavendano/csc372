/**
 * GalleryItemCard — single portfolio tile; data from props.
 * Kenneth Avendano — 2026-04-22
 */

export default function GalleryItemCard({ item }) {
  const { image, title, caption, category } = item
  return (
    <div className="gallery-item" data-category={category}>
      <img src={image} alt={title} loading="lazy" />
      <div className="overlay">
        <h3>{title}</h3>
        <p>{caption}</p>
      </div>
    </div>
  )
}
