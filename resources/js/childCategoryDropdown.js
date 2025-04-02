document.addEventListener('DOMContentLoaded', function() {
    const subcategorySelect = document.querySelector('#sub_category_id');

    subcategorySelect.addEventListener('change', function() {
        let id = this.value;

        fetch(`/admin/get-childcategory/${id}`, {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
            },
        })
            .then(response => response.json())
            .then(data => {
                console.log("DATA", data);
                const childcategorySelect = document.querySelector('#child_category_id');
                const defaultOption = document.createElement('option');

                childcategorySelect.disabled = subcategorySelect.disabled || data.length === 0;
                childcategorySelect.innerHTML = '';
                defaultOption.disabled = true;
                defaultOption.selected = true;
                defaultOption.textContent = data.length > 0 ? "Please Select" : "No Childcategory";
                defaultOption.value = "";
                childcategorySelect.appendChild(defaultOption);


                data.forEach(function(item) {

                    const option = document.createElement('option');
                    option.value = item.id;
                    option.textContent = item.name;

                    childcategorySelect.appendChild(option);
                });
            })
            .catch(error => {
                console.error('Error:', error);
            });
    });
});
