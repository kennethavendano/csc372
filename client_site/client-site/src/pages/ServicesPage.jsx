import PageHeading from '../components/PageHeading.jsx'
import ServiceCard from '../components/ServiceCard.jsx'
import { services } from '../data/services.js'

export default function ServicesPage() {
  return (
    <main>
      <PageHeading title="Services" />
      <p className="services-intro">
        Ichacaps offers photography tailored to athletes, families, and event hosts
        across Rhode Island and nearby states.
      </p>
      <div className="services-grid">
        {services.map((service) => (
          <ServiceCard
            key={service.id}
            title={service.title}
            description={service.description}
          />
        ))}
      </div>
    </main>
  )
}
