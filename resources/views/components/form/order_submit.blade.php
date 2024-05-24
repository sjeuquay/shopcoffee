@php
    /**
     * @author sundev
     * TAG x-form.order_submit
     * ! ONLY see input don't touch edit
     * @param array $nameArray The names of inputs in the form
     * @param string $id The ID of the modal
     * @param attribute fullscreen Fullscreen the modal if provided
     * @param slot $slot The modal body content
     * @param slot $actionStore submit URL for Storing data
     * @param slot $actionUpdate submit URL for Updating data
     * @param slot $titleStore The title for create-Form
     * @param slot $titleUpdate The title for update-Form
     */
@endphp

@props([
    'statusId' => '',
    'btnName' => '',
    'action' => '',
    'modalId' => ''
])

<div class="modal fade" id="{{$modalId}}" tabindex="-1" aria-labelledby="DetailLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-4" id="exampleModalLabel">Thông tin order</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{$action}}">
                <div class="modal-body">
                    {{ $slot }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" id="btnSubmit" class="btn btn-primary ">{{$btnName}}</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('click', function(event) {
        var modalId = document.getElementById('{{$modalId}}')
        buttonDetail = event.delegateTarget
        let statusId = 0;
        if(buttonDetail.getAttribute('{{$statusId}}')) {
            console.log(buttonDetail);
            btnSubmit = document.getElementById('btnSubmit')
            statusId = buttonDetail.getAttribute('{{$statusId}}')
            statusId >= 4 ? btnSubmit.classList.add('d-none') : btnSubmit
            // console.log(statusId);
        }
    })
</script>