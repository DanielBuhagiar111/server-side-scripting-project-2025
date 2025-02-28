document.addEventListener('DOMContentLoaded', function () {
    document.body.addEventListener('click', function (event) {
        if (event.target.closest('.btn-delete')) {
            event.preventDefault();
            if (confirm("Are you sure?")) {
                const btnDelete = event.target.closest('.btn-delete');
                const action = btnDelete.getAttribute('href');
                const form = document.getElementById('form-delete');
                if (form) {
                    form.setAttribute('action', action);
                    form.submit();
                } else {
                    console.error('Form with ID "form-delete" not found');
                }
            }
        }
        
    });
});
