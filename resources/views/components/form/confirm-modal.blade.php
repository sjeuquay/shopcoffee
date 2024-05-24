@php
    /**
     * @author schmev91
     * TAG x-form.confirm-modal
     * BUTTON Include { data-bs-toggle="modal" data-bs-target="#id" } with id as modal id
     * GENERATE A CUSTOM CONFIRM MODAL
     * @param string $id The ID of the modal
     * @param string $action The submit URL
     * @param string $slot The Title or Question of the modal
     * @param string|null $method Default: POST | Specify the submit method such as PUT, PATCH, or DELETE.
     * @param string|null $type Default: danger | The type of the confirm button
     * @param string|null $confirmText Default: Xác nhận | The placeholder for the cofirm button
     * @param string|null $varying (Optional) Enable dynamic target when provided | Specifies the name of the data-bs-* attribute
     */
@endphp
@props([
    'id' => '',
    'action' => [],
    'method' => '',
    'type' => 'danger',
    'confirmText' => 'Xác nhận',
    'varying' => null,
])


<!-- Very little is needed to make a happy life. - Marcus Aurelius -->
<form id="{{ $id }}" action="{{ $action }}" class="modal fade" method="POST" tabindex="-1">
    @csrf
    @if (in_array(strtoupper($method), ['PUT', 'PATCH', 'DELETE']))
        @method(strtoupper($method))
    @endif
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">{{ $slot }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                <button type="submit" class="btn btn-{{ $type }}">{{ $confirmText }}</button>
            </div>
        </div>
    </div>
</form>
{{-- ENABLE IF $varying is PROVIDED --}}
@if ($varying)
    @php
        // FOR NAMING JAVASCRIPT VARIABLE
        $cleanedId = preg_replace('/[^a-zA-Z0-9_$]/', '', $id);
        if (preg_match('/^\d/', $cleanedId)) {
            $cleanedId = '_' . $cleanedId;
        }
    @endphp
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var {{ $cleanedId }}Modal = document.getElementById('{{ $id }}');
            if ({{ $cleanedId }}Modal) {
                {{ $cleanedId }}Modal.addEventListener('show.bs.modal', function(event) {
                    // Button that triggered the modal
                    const button = event.relatedTarget;
                    // Extract info from data-bs-* attributes
                    const value = button.getAttribute('{{ $varying }}');

                    {{ $cleanedId }}Modal.action = "{{ $action }}/" + value;
                });
            }
        });
    </script>
@endif
