// Fungsi untuk memunculkan modal pengisian preferensi
function showPreferenceModal() {
    const categories = JSON.parse(localStorage.getItem('categories'));
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    const modal = `
    <div class="modal" tabindex="-1" id="preferenceModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Isi Preferensi Anda</h5>
                </div>
                <div class="modal-body">
                    <form action="/save-preference" method="POST" id="preferenceForm">
                        <input type="hidden" name="_token" value="${csrfToken}">
                        <div class="mb-3">
                            <label for="budget" class="form-label">Budget Minimal (Rp)</label>
                            <input type="number" class="form-control id="budget" name="budget_min" required>
                        </div>
                        <div class="mb-3">
                            <label for="budget" class="form-label">Budget Maksimal (Rp)</label>
                            <input type="number" class="form-control id="budget" name="budget_max" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Kategori</label>
                            ${categories.map(category => `
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="categories[]" id="category${category.id}" value="${category.id}">
                                <label class="form-check-label" for="category${category.id}">
                                    ${category.name}
                                </label>
                            </div>
                            `).join('')}
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>`;

    document.body.insertAdjacentHTML('beforeend', modal);

    const modalElement = new bootstrap.Modal(document.getElementById('preferenceModal'));
    modalElement.show();

    //isi latitude longitude secara otomatis
    navigator.geolocation.getCurrentPosition(function (position) {
        document.getElementById('latitude').value = position.coords.latitude;
        document.getElementById('longitude').value = position.coords.longitude;
    });
}


