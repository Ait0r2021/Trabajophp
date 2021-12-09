$('#modalDelete').on('shown.bs.modal', function (event) {
    let eliminarPuesto = document.getElementById('eliminarPuesto');
    let element = event.relatedTarget;
    let action = element.getAttribute('data-url');
    let name = element.dataset.name;
    eliminarPuesto.innerHTML = name;
    let form = document.getElementById('modalDeleteResourceForm');
    form.action = action;
})