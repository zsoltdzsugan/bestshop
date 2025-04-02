document.addEventListener('DOMContentLoaded', function() {
    const categorySelect = document.querySelector('#category_id');

    categorySelect.addEventListener('change', function() {
        let id = this.value;

        fetch(`/admin/get-subcategory/${id}`, {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
            },
        })
            .then(response => response.json())
            .then(data => {
                console.log("DATA", data);
                const subCategorySelect = document.querySelector('#sub_category_id');
                const defaultOption = document.createElement('option');

                subCategorySelect.innerHTML = '';
                defaultOption.disabled = true;
                defaultOption.selected = true;
                defaultOption.textContent = data.length > 0 ? "Please Select" : "No Subcategory";
                defaultOption.value = "";
                subCategorySelect.appendChild(defaultOption);
                subCategorySelect.disabled = data.length === 0;


                data.forEach(function(item) {

                    const option = document.createElement('option');
                    option.value = item.id;
                    option.textContent = item.name;

                    subCategorySelect.appendChild(option);
                });
            })
            .catch(error => {
                console.error('Error:', error);
            });
    });
});
