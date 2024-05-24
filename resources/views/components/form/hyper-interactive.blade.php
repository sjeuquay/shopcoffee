<!-- Simplicity is the consequence of refined emotions. - Jean D'Alembert -->
@php
    /**
     * @author schmev91
     * TAG x-form.hyper-interactive
     * ! ONLY WORK WITH TABLE
     * This component uses javascript to morph between a Create Form and a Edit Form
     * get the edit data by targeting the table row that has the clicked button
     * on closing the modal, automatically morph back to Create Form state and clear the form
     *
     * REQUIRE:
     *  ADD-BUTTON must has { data-bs-toggle="modal" data-bs-target="#id" } with id as modal id
     *  EDIT-BUTTON must has the class btn-open_edit and corresponding id as targetId attribute
     *  Each row must have the class table_row
     *  Each td must have hi-column_name as attribute
     *
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
    'id' => 'form_name',
    'nameArray' => [],
    'fullscreen' => false,
])
<form id="{{ $id }}" action="{{ $actionStore }}" method="POST" class="modal fade" tabindex="-1">
    @method('POST')
    @csrf
    <div class="modal-dialog {{ $fullscreen ? 'modal-fullscreen' : '' }}">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">
                    {{ $titleStore ?? 'Hyper Interactive Form Title' }}
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                {{ $slot ?? 'Hyper Interactive Form Body' }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    Đóng
                </button>
                <button type="submit" class="btn btn-success">Thêm</button>
            </div>
        </div>
    </div>
</form>

<script type="module">
    document.addEventListener('DOMContentLoaded', function() {

        const nameArr = @json($nameArray);
        const fieldMap = new Map()
        nameArr.forEach(name => fieldMap.set(name, document.getElementById(name)))

        const hyperForm = document.getElementById('{{ $id }}')
        const hyperModal = new bootstrap.Modal(hyperForm);
        const methodHolder = hyperForm.querySelector(
            'input[name="_method"]'
        );

        const storeURL = "{{ $actionStore }}"
        const updateURL = "{{ $actionUpdate }}/"

        const addColor = 'btn-success'
        const editColor = 'btn-info'

        const morphToCreate = morph('post', storeURL, 'Thêm', addColor, '{{ $titleStore }}')
        const morphToEdit = morph('put', updateURL, 'Lưu', editColor, '{{ $titleUpdate }}')
        const submitBtn = hyperForm.querySelector('button[type="submit"]')

        function morph(method, action, buttonText, buttonColor, title) {
            return function(actionSuffix = '') {
                hyperForm.action = action + actionSuffix
                methodHolder.value = method.toUpperCase()
                hyperForm.querySelector('.modal-title').innerHTML = title

                submitBtn.innerHTML = buttonText
                if (buttonColor == addColor) submitBtn.classList.replace(editColor, addColor)
                else submitBtn.classList.replace(addColor, editColor)
            }
        }

        // SHOW THE MODAL IF THERE IS ERROR
        if ('{{ $errors->any() }}') {
            if ('{{ old('_method') }}' == 'PUT') {
                morphToEdit()
            }
            hyperModal.show()
        }

        hyperForm.addEventListener('hide.bs.modal', clear)

        const editBtn_collections =
            document.getElementsByClassName("btn-open_edit");
        for (const btn of editBtn_collections) {
            btn.addEventListener("click", prepareEdit);
        }

        const wipeError = once(function() {
            const errors_collection = document.getElementsByClassName('error_holder')
            for (let err of errors_collection) err.remove()
        })
        // closure function to make sure the wipeError only run once
        function once(fn) {
            let called = false; // This closure scope retains the 'called' state.
            return function() {
                if (!called) {
                    called = true; // Update the state to prevent future invocations.
                    fn.apply(this, arguments); // Call the original function.
                }
            };
        }

        function prepareEdit({
            target
        }) {
            const targetRow = target.closest('.table_row')
            morphToEdit(target.getAttribute('targetId'))
            hyperModal.show();
            nameArr.forEach((name) => {
                const dumping_field = fieldMap.get(name)
                const tag_name = dumping_field.tagName
                if (tag_name == 'SELECT') dumping_field
                    .value = targetRow.querySelector(`[hi-${name}]`)
                    .getAttribute(`hi-${name}`)
                else
                    // DEFAULT BEHAVIOUR FOR INPUT
                    dumping_field.value = targetRow.querySelector(`[hi-${name}]`).innerHTML
            })
        }


        function clear() {
            fieldMap.forEach((input) => (input.value = ""));
            morphToCreate()
            wipeError() //only run once
        }
    });
</script>
