$('#modalDelete').on('shown.bs.modal', function (event) {
    let eliminarEmpleado = document.getElementById('eliminarEmpleado');
    let element = event.relatedTarget;
    let action = element.getAttribute('data-url');
    let name = element.dataset.name;
    eliminarEmpleado.innerHTML = name;
    let form = document.getElementById('modalDeleteResourceForm');
    form.action = action;
    
})