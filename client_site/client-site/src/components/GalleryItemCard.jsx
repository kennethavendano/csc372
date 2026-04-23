// Kenneth Avendano
// 4/22/2026
// One portfolio image tile from props.

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
