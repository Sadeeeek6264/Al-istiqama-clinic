// js/scripts.js
document.addEventListener('DOMContentLoaded', () => {
    const form = document.querySelector('form');
    form.addEventListener('submit', (event) => {
        const patientId = document.getElementById('patient_id').value;
        const appointmentDate = document.getElementById('appointment_date').value;
        const description = document.getElementById('description').value;

        if (!patientId || !appointmentDate || !description) {
            event.preventDefault();
            alert('Please fill out all fields.');
        }
    });
});
