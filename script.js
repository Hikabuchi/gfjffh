document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.status-select').forEach(select => {
        select.addEventListener('change', function() {
            const applicationId = this.id.split('-')[1]; // Получаем ID заявки
            const photoUploadDiv = document.getElementById('photo-upload-' + applicationId);
            if (this.value === '3') { // Если статус "Выполнен"
                photoUploadDiv.style.display = 'block';
            } else {
                photoUploadDiv.style.display = 'none';
            }
        });
    });
});
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.status-select').forEach(select => {
        select.addEventListener('change', function() {
            const applicationId = this.id.split('-')[1]; // Получаем ID заявки
            const commentUploadDiv = document.getElementById('comment-' + applicationId);
            if (this.value === '4') { // Если статус "Выполнен"
                commentUploadDiv.style.display = 'block';
            } else {
                commentUploadDiv.style.display = 'none';
            }
        });
    });
});
