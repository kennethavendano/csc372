// Kenneth Avendano
// 4/22/2026
// Booking form with controlled inputs and validation.

import { useState } from 'react'

const initialForm = {
  fullName: '',
  email: '',
  phone: '',
  service: '',
  date: '',
  notes: '',
}

const emailOk = (value) => /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value.trim())

export default function BookingForm() {
  const [form, setForm] = useState(initialForm)
  const [errors, setErrors] = useState({})
  const [submitted, setSubmitted] = useState(false)

  const setField = (field, value) => {
    setForm((prev) => ({ ...prev, [field]: value }))
    setErrors((prev) => ({ ...prev, [field]: undefined }))
    setSubmitted(false)
  }

  const validate = () => {
    const next = {} // field errors collected here, then saved to state
    if (!form.fullName.trim()) next.fullName = 'Name is required.'
    if (!form.email.trim()) next.email = 'Email is required.'
    else if (!emailOk(form.email)) next.email = 'Enter a valid email address.'
    if (!form.service) next.service = 'Please choose a service.'
    if (!form.date) next.date = 'Please choose a date.'
    if (form.notes.trim().length > 0 && form.notes.trim().length < 10) {
      next.notes = 'Notes should be at least 10 characters or left blank.'
    }
    setErrors(next)
    return Object.keys(next).length === 0
  }

  const handleSubmit = (e) => {
    e.preventDefault()
    if (!validate()) return
    setSubmitted(true)
    setForm({ ...initialForm })
  }

  return (
    <section className="booking-container">
      <h1>Book Your Session</h1>
      <p>Fill out the form below and we&apos;ll get back to you</p>

      <form className="booking-form" onSubmit={handleSubmit} noValidate>
        <div>
          <input
            type="text"
            placeholder="Full Name"
            value={form.fullName}
            onChange={(e) => setField('fullName', e.target.value)}
            aria-invalid={Boolean(errors.fullName)}
          />
          {errors.fullName ? (
            <p className="form-error">{errors.fullName}</p>
          ) : null}
        </div>

        <div>
          <input
            type="email"
            placeholder="Email"
            value={form.email}
            onChange={(e) => setField('email', e.target.value)}
            aria-invalid={Boolean(errors.email)}
          />
          {errors.email ? <p className="form-error">{errors.email}</p> : null}
        </div>

        <div>
          <input
            type="tel"
            placeholder="Phone Number"
            value={form.phone}
            onChange={(e) => setField('phone', e.target.value)}
          />
        </div>

        <div>
          <select
            value={form.service}
            onChange={(e) => setField('service', e.target.value)}
            aria-invalid={Boolean(errors.service)}
          >
            <option value="">Select Service</option>
            <option>Sports Photography</option>
            <option>Portrait Session</option>
            <option>Event Photography</option>
          </select>
          {errors.service ? (
            <p className="form-error">{errors.service}</p>
          ) : null}
        </div>

        <div>
          <input
            type="date"
            value={form.date}
            onChange={(e) => setField('date', e.target.value)}
            aria-invalid={Boolean(errors.date)}
          />
          {errors.date ? <p className="form-error">{errors.date}</p> : null}
        </div>

        <div>
          <textarea
            placeholder="Tell us about your shoot..."
            rows={4}
            value={form.notes}
            onChange={(e) => setField('notes', e.target.value)}
            aria-invalid={Boolean(errors.notes)}
          />
          {errors.notes ? <p className="form-error">{errors.notes}</p> : null}
        </div>

        <button type="submit">Submit Booking</button>
        {submitted ? (
          <p className="form-success" role="status">
            Thanks! Your request was recorded (demo only—no server).
          </p>
        ) : null}
      </form>
    </section>
  )
}
