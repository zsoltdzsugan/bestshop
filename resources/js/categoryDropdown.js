document.addEventListener('DOMContentLoaded', function () {
    const categorySelect = document.querySelector('#category_id');
    const subCategorySelect = document.querySelector('#sub_category_id');
    const childCategorySelect = document.querySelector('#child_category_id');

    /**
     * Function to update a select dropdown dynamically
     * @param {HTMLElement} selectElement - The dropdown to update
     * @param {Array} data - The fetched data array
     * @param {string} defaultText - Default placeholder text
     */
    function updateDropdown(selectElement, data, defaultText) {
        if (!selectElement) return;

        selectElement.innerHTML = ''; // Clear existing options
        const defaultOption = document.createElement('option');
        defaultOption.disabled = true;
        defaultOption.selected = true;
        defaultOption.textContent = data.length > 0 ? "Please Select" : defaultText;
        defaultOption.value = "";
        selectElement.appendChild(defaultOption);

        selectElement.disabled = data.length === 0;

        data.forEach(function (item) {
            const option = document.createElement('option');
            option.value = item.id;
            option.textContent = item.name;
            selectElement.appendChild(option);
        });
    }

    // Handle Category Change -> Fetch Subcategories
    categorySelect.addEventListener('change', function () {
        let id = this.value;

        fetch(`/api/get-subcategories/${id}`)
            .then(response => response.json())
            .then(data => {
                console.log("Subcategory DATA:", data);
                updateDropdown(subCategorySelect, data, "No Subcategory");

                // If there's a child category dropdown, reset it
                if (childCategorySelect) {
                    updateDropdown(childCategorySelect, [], "No Childcategory");
                }
            })
            .catch(error => console.error('Error:', error));
    });

    // Handle Subcategory Change -> Fetch Childcategories
    if (subCategorySelect) {
        subCategorySelect.addEventListener('change', function () {
            let id = this.value;

            if (!childCategorySelect) return; // Skip if no child category dropdown

            fetch(`/api/get-childcategories/${id}`)
                .then(response => response.json())
                .then(data => {
                    console.log("Childcategory DATA:", data);
                    updateDropdown(childCategorySelect, data, "No Childcategory");
                })
                .catch(error => console.error('Error:', error));
        });
    }
});

