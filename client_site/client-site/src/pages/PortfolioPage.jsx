import { useState, useMemo } from 'react'
import PageHeading from '../components/PageHeading.jsx'
import GalleryItemCard from '../components/GalleryItemCard.jsx'
import { galleryItems, filterOptions } from '../data/galleryItems.js'

export default function PortfolioPage() {
  const [activeFilter, setActiveFilter] = useState('all')

  const visibleItems = useMemo(
    () =>
      galleryItems.filter(
        (item) => activeFilter === 'all' || item.category === activeFilter,
      ),
    [activeFilter],
  )

  return (
    <main>
      <PageHeading title="Portfolio" />

      <div className="filter-nav" role="tablist" aria-label="Gallery categories">
        {filterOptions.map((opt) => (
          <button
            key={opt.id}
            type="button"
            role="tab"
            aria-selected={activeFilter === opt.id}
            className={`filter-btn${activeFilter === opt.id ? ' active' : ''}`}
            onClick={() => setActiveFilter(opt.id)}
          >
            {opt.label}
          </button>
        ))}
      </div>

      <div className="gallery">
        {visibleItems.map((item) => (
          <GalleryItemCard key={item.id} item={item} />
        ))}
      </div>
    </main>
  )
}
