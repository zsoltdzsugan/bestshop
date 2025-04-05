<div class="flex space-x-2" x-data="{
    productId: {{ $product->id }},

    handleApproval(approvalStatus) {
        approvalStatus = approvalStatus.charAt(0).toUpperCase() + approvalStatus.slice(1).toLowerCase();
        if (!['Approved', 'Pending', 'Rejected'].includes(approvalStatus)) return;

        // Map status to numeric values
        const statusMap = {
            'Pending': 0,
            'Approved': 1,
            'Rejected': 2
        };

        const approvalStatusNumber = statusMap[approvalStatus];

        // Make the AJAX request to update the approval status
        fetch(`/admin/product/${this.productId}/pending`, {
            method: 'PATCH',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ is_approved: approvalStatusNumber })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                $dispatch('toast', data.message);
                location.reload();
            } else {
                $dispatch('toast', data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            $dispatch('toast', 'An error occurred.');
        });
    },
}">
    <!-- Approve Button -->
    <x-button variant="info" size="sm" @click.prevent="handleApproval('Approved')">
        <i class="fa-solid fa-check"></i>
        Approve
    </x-button>

    <!-- Reject Button -->
    <x-button variant="danger" @click="handleApproval('Rejected')" size="sm">
        <i class="fa-solid fa-xmark"></i>
        Reject
    </x-button>
</div>
