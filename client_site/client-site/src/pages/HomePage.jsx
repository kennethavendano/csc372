import { Link } from 'react-router-dom'
import LocationStrip from '../components/LocationStrip.jsx'

const regions = ['RI', 'MA', 'CT']

export default function HomePage() {
  return (
    <>
      <main className="hero-container">
        <div className="hero-text">
          <h1>Capturing Life&apos;s Beautiful Moments</h1>
          <p>
            Professional photography for sports, portraits, and special events
          </p>
        </div>
        <Link to="/book" className="book-btn">
          Book Now
        </Link>
      </main>
      <LocationStrip regions={regions} />
    </>
  )
}
